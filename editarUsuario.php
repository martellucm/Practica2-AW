<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Form.php';
	require_once __DIR__.'/includes/Usuario.php';
	
class ModifUsuario extends Form{
	
	
	protected function procesaFormulario($datos){
			$id3 = $datos['id'];
			if (! isset($_POST['modificarusuario']) ) {
				header('Location: miBoqueron.php');
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
				Usuario::actualiza($usuario);
				return 'miBoqueron.php';	
			}
			
			return $erroresFormulario;	
		}

	protected function generaCamposFormulario($datosIniciales){
		if(! isset($_POST['modificarusuario']) ){
		 	$id = $_GET['id'];
			echo $id;
			var_dump($id);
     		$usuario = Usuario::buscaUsuarioID($id);
		}
		else{
				$id = $datosIniciales['id'];
			$usuario = Usuario::buscaUsuarioID($id);
		}
			/*
			* En caso de que hubiera un error se mantienen
			* los datos para que puedas modificarlos
			*/

				$datosIniciales['id'] = $usuario->id();
				$datosIniciales['nombreUsuario'] = $usuario->nombreUsuario();
				$datosIniciales['nombre'] = $usuario->nombre();
				$datosIniciales['email'] = $usuario->email();
				$datosIniciales['descrip'] = $usuario->descrip();
				$datosIniciales['cumple']= $usuario->cumple();
				$datosIniciales['fprincipal'] = $usuario->fprincipal();

			$html = '';
			$html .='	<fieldset>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" value="'.$usuario->nombreUsuario().'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Nombre completo:</label> <input class="control" type="text" name="nombre" value="'.$usuario->nombre().'" required />';
			$html .='	</div>';
			//$html .='	<div class="grupo-control">';
			//$html .='		<label>Password:</label> <input class="control" type="password" name="password" required />';
			//$html .='	</div>';
			//$html .='	<div class="grupo-control"><label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2"/><br /></div>';
			
			$html .='	<div class="grupo-control">';
			$html .='		<label>Correo electrónico:</label> <input class="control" type="text" name="email" value="'.$usuario->email().'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Háblanos sobre ti:</label> <input class="control" type="text" name="descrip" value="'.$usuario->descrip().'" required />';
			$html .='	</div>';
			$html .='	<div class="grupo-control">';
			$html .='		<label>Fecha de nacimiento:</label> <input class="control" type="date" name="cumple" value="'.$usuario->cumple().'" required />';
			$html .='	</div>';
			
			//$html .='	<div class="grupo-control">';
			//$html .='		<label>Foto principal:</label> <input class="control" type="file" name="fprincipal" value="'.$usuario->fprincipal().'" required />';
			//$html .='	</div>';
			
			$html .='<input class="grupo-control" type="hidden" name="id" value="'.$usuario->id().'"/>';
			$html .='	<div class="grupo-control"><button type="submit"  name="modificarusuario">Modificar</button></div>';
			$html .='</fieldset>';
			return $html;
	}
}

?>

<div id="contenido">
	<h1>Modificar usuario</h1>
<?php
		$formu = new ModifUsuario('modificarusuario', array('action' => NULL));
		$formu->gestiona();
?>
</div>