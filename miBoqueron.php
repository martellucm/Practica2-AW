<?php
require_once __DIR__.'/includes/comun/config.php';
require_once __DIR__.'/includes/usuarios/Usuario.php';
?>
<!DOCTYPE HTML>
<html lang="es">
  <head>
    <title>Mi boquerón - My Chuster Games</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <meta charset="utf-8">
  </head>
<body>
	<?php require'includes/comun/cabecera.php'?>
	<div id ="contenedor">
		<?php
			$user = Usuario::buscaUsuario($_SESSION['nombre']);
			$id = $user->id();
			$directorio = "img/users/$id.jpg";
			$directorioPNG = "img/users/$id.png";
			$directorioJPEG = "img/users/$id.jpeg";
			if($user instanceof Usuario){
				if(@file_get_contents($directorio) == null){
					if(@file_get_contents($directorioPNG) == null){
						if(@file_get_contents($directorioJPEG) == null){
							echo '<div id = "img_user"><img src="img/users/default_user.png"/></div> ';
						}
						else{
							echo '<div id = "img_user"><img src='.$directorioJPEG.'></div>';
						}
					}
					else{
						echo '<div id = "img_user"><img src='.$directorioPNG.'></div>';
					}
				}
				else{
					echo '<div id = "img_user"><img src='.$directorio.'></div>';
				}
				echo '<div class = "muestraUser">';
				echo '<span class="user"><h1>Nickname: '.$user->nombreUsuario().'</h1></span>';
				echo '<span class="user"><h1>Nombre completo: '.$user->nombre().'</h1></span>';
				echo '<span class="user"><h1>Rol: '.$user->rol().'</h1></span>';
				echo '<span class="user"><h1>Email: '.$user->email().'</h1></span>';
				echo '<span class="user"><h1>Fecha de nacimiento: '.$user->cumple().'</h1></span>';

				echo '<span class="user"><h1>Puntos obtenidos en el foro:'.$user->ptosForum().'</h1></span>';
				echo '<span class="user"><h1>Puntos obtenidos valorando productos:'.$user->ptosProd().'</h1></span>';
				echo '<span class="user"><h1>Puntos obtenidos en torneos: '.$user->ptosTourn().'</h1></span>';
				//echo '<div id="user_avat"><p>Avatar: '.$user->avatar().'</p></div>';
				echo '<span class="user"><h1>Descripción: '.$user->descrip().'</h1></span>';
				echo '</span>';
				echo '<div class = "admin">';
				echo '<a href="ModUsuario.php?id='.$id.'"> Modificar </a>';

				echo '<form action="includes/comun/comotuquieras.php?id='.$id.'&where=users" method="POST" enctype="multipart/form-data">';
				echo '<input type="file" name="file">';
				echo '<button type="submit" name="submit"> Actualizar foto</button>';
				echo '</div>';
			} ?>

	</div>
</body>
</html>
