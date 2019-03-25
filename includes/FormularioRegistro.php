<?php 
	require_once __DIR__.'/config.php';
	require_once __DIR__.'/Usuario.php';
	require_once __DIR__.'/Form.php';
	
	class FormularioRegistro extends Form{
		protected function procesaFormulario($datos){	
			if (! isset($_POST['registro']) ) {
				header('Location: registro.php');
				exit();
			}

			$erroresFormulario = array();

			$nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;

			if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
				$erroresFormulario[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
			}

			$nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
			if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
				$erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
			}

			$password = isset($datos['password']) ? $datos['password'] : null;
			if ( empty($password) || mb_strlen($password) < 5 ) {
				$erroresFormulario[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
			}
			$password2 = isset($datos['password2']) ? $datos['password2'] : null;
			if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
				$erroresFormulario[] = "Los passwords deben coincidir";
			}
			
			$email = isset($datos['email']) ? $datos['email'] : null;
			if ( empty($email)) {
				$erroresFormulario[] = "Debe introducir un correo electrónico.";
			}
			
			$cumple = isset($datos['cumple']) ? $datos['cumple'] : null;
			if ( empty($cumple)) {
				$erroresFormulario[] = "Debe introducir su fecha de nacimiento.";
			}
			
			$descrip = isset($datos['descrip']) ? $datos['descrip'] : null;
			if ( empty($descrip) || mb_strlen($descrip) < 5 ) {
				$erroresFormulario[] = "¡No seas tímido! Cuéntanos algo sobre ti.";
			}
			
			$fprincipal = isset($datos['fprincipal']) ? $datos['fprincipal'] : null;
			
			if (count($erroresFormulario) === 0) {
				$usuario = Usuario::crea($nombreUsuario, $nombre, $password, $email, '0', '0', '0', 'noob', 'user', $descrip, $cumple, $fprincipal);
				if (! $usuario ) {
					$erroresFormulario[] = "El usuario ya existe";
				} else {
					$_SESSION['login'] = true;
					$_SESSION['nombre'] = $nombreUsuario;
					return 'index.php';
				}
			}
			
			return $erroresFormulario;	
		}
		protected function generaCamposFormulario($datosIniciales){
			$nombrUsu = '';
			$nombr = '';
			$email = '';
			$passw = '';
			$rol = '';
			$descr = '';
			$cumple = '';
			$fprincipal = null;
			
			/*
			* En caso de que hubiera un error se mantienen 
			* los datos para que puedas modificarlos
			*/
			
			if(isset($datosIniciales['registro'])){
				$nombrUsu = $datosIniciales['nombreUsuario'];
				$nombr = $datosIniciales['nombre'];
				$email = $datosIniciales['email'];
				$passw = $datosIniciales['password'];
				$rol = 'user';
				$descr = $datosIniciales['descrip'];
				$cumple = $datosIniciales['cumple'];
				$fprincipal = $datosIniciales['fprincipal'];
			}
			
			$html = '';
			$html .='	<fieldset>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" value="'.$nombrUsu.'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Nombre completo:</label> <input class="control" type="text" name="nombre" value="'.$nombr.'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Password:</label> <input class="control" type="password" name="password" value="'.$passw.'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control"><label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2" /><br /></div>';
			
			$html .='	<div class="grupo-control">';
			$html .='		<label>Correo electrónico:</label> <input class="control" type="text" name="email" value="'.$email.'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Háblanos sobre ti:</label> <input class="control" type="text" name="descrip" value="'.$descr.'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Fecha de nacimiento:</label> <input class="control" type="date" name="cumple" value="'.$cumple.'" required />';
			$html .='	</div>';
			
			//$html .='	<div class="grupo-control">';
			//$html .='		<label>Foto principal:</label> <input class="control" type="file" name="fprincipal" value="'.$fprincipal.'" required />';
			//$html .='	</div>';

			
			$html .='	<div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>';
			$html .='</fieldset>';
			return $html;
		}
	}

?>


<div id="contenido">
	<h1>Registro de usuario</h1>
<?php
		$formu = new FormularioRegistro('registro', array('action' => NULL));
		$formu->gestiona();
?>
</div>