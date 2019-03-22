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

	    <div id = "publi">

	    </div>

	    <div id = "week">
	    	 <h1>AQUI SE MUESTRA EL WOTW</h1>
	     <?php
	    	  require_once __DIR__.'/includes/GestionProducto.php';
	      	  $producto = GestionProducto::mostrarProducto('carnival zombie');
            if(is_array($producto)){
    		      echo $producto["img"];
    		      echo $producto["nombre"];
    	        echo $producto["puntos"];
            }
            else{
              echo 'No ha encontrado el producto';
            }
	      ?>
	    </div>

	    <div id = "month">
	      <h1>AQUI SE MUESTRA EL WOTM</h1>
	    </div>
	    <div id = "products">
	      <h1>Productos</h1>
	    </div>
	 </div>
  </div>
</body>
</html>
