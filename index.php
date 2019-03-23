<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>My Chuster Games</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <meta charset="utf-8">
  </head>
<body>
  <div id ="contenedor">
  	<div id = "contenido">
	    <?php require'includes/comun/cabecera.php'?>
	    <div id = "news">
	       <?php require'leftnews.php'?>
	    </div>
	    <div id = "publi"></div>
	   	<div id = "month">
	     <?php
       require_once __DIR__.'/includes/Usuario.php';
          /*
	      	  $producto = GestionProducto::mostrarProducto('Galleta');
            if(is_array($producto)){
               $img = $producto['img'];
    	        	echo '<div id="prodM"><img src="data:image/jpg; base64,'.base64_encode($img).'" />';
    		        echo "<p>".$producto['nombre']."</p>";
    		        echo "<p>".$producto['puntos']."</p> </div>";
            }
            else{
              echo "<p>No ha encontrado el producto</p>";
            }*/

            $user = Usuario::getWW();
            if($user != false){
			  echo '<div><img src="data:image/jpg; base64,'.base64_encode($user->fprincipal()).'" />';
              echo "<div><p>".$user->nombreUsuario()."</p>";
              echo "<p>".$user->ptosTourn()."</p> </div>";
            }
            else{
              echo "<p>No hay un ganador claro</p>";
            }
	      ?>
        </div>
	    <div id = "week">
         <?php
            require_once __DIR__.'/includes/Usuario.php';
            $user = Usuario::getWW();
            if($user != false){
              echo "<div><p>".$user->nombreUsuario()."</p>";
              echo "<p>".$user->ptosTourn()."</p> </div>";
            }
            else{
              echo "<p>No hay un ganador claro</p>";
            }
        ?>
      </div>

	     <div id = "products">
        <?php
          require_once __DIR__.'/includes/GestionProducto.php';
            $producto = GestionProducto::mostrarProd();
            
        ?> </div>
	</div>
</body>
</html>
