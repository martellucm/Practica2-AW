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
	    	  require_once __DIR__.'/includes/GestionProducto.php';
	      	  $producto = GestionProducto::mostrarProducto('Galleta');
            if(is_array($producto)){
               $img = $producto['img'];	
	        	echo '<div id="prodM"><img src="data:image/jpg; base64,'.base64_encode($img).'" />';
			    echo "<p>".$producto['nombre']."</p>";
		        echo "<p>".$producto['puntos']."</p> </div>";
            }
            else{
              echo 'No ha encontrado el producto';
            }
	      ?>
	    <div id = "week">
	     <?php
	    	  require_once __DIR__.'/includes/GestionProducto.php';
	      	  $producto = GestionProducto::mostrarProducto('Galleta');
            if(is_array($producto)){
               $img = $producto['img'];	
	        	echo '<div id="prodM"><img src="data:image/jpg; base64,'.base64_encode($img).'" />';
			    echo "<p>".$producto['nombre']."</p>";
		        echo "<p>".$producto['puntos']."</p> </div>";

    	       
            }
            else{
              echo 'No ha encontrado el producto';
            }
	      ?> </div>
	     <div id = "products"></div>
	</div>
</body>
</html>
