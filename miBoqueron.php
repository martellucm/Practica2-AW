<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';
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
			if($user instanceof Usuario){
				echo '<div id = "muestraUser">';
				if(@file_get_contents($directorio) == null){
					echo '<div id = "img_user"><img src="img/users/default_user.png"/></div> ';
				}
				else{
					echo '<div id = "img_user"><img src='.$directorio.'>';
				}
				echo '<div id="user_nick"><h1>Nickname: '.$user->nombreUsuario().'</h1></div>';
				echo '<div id"user_name"><h2>Nombre completo: '.$user->nombre().'</h2></div>';
				echo '<div id="user_rol"><h2>Rol: '.$user->rol().'</h2></div>';
				echo '<div id="user_emai"><h3>Email: '.$user->email().'</h3></div>';
				echo '<div id="user_birt"><h3>Fecha de nacimiento: '.$user->cumple().'</h3></div>';
			  
				echo '<div id="user_poin"><p>Puntos obtenidos en el foro:'.$user->ptosForum().'</p></div>';
				echo '<div id="user_poin"><p>Puntos obtenidos valorando productos:'.$user->ptosProd().'</p></div>';
				echo '<div id="user_poin"><p>Puntos obtenidos en torneos: '.$user->ptosTourn().'</p></div>';
				//echo '<div id="user_avat"><p>Avatar: '.$user->avatar().'</p></div>';
				echo '<div id="user_desc"><p>Descripción: '.$user->descrip().'</p></div>';
				echo '<a href="editarUsuario.php?id='.$user->id().'"> Modificar </a>';
				echo '</div>';
				
				
				echo '<form action="comotuquieras.php?id='.$id.'&where=users" method="POST" enctype="multipart/form-data">';
				echo '<input type="file" name="file">';
				echo '<button type="submit" name="submit"> Actualizar foto</button>';
			} ?>

	</div>
</body>
</html>
