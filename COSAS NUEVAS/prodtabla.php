<?php
namespace es\ucm\fdi\aw;

use es\ucm\fdi\aw\Aplicacion as App;
require_once __DIR__.'/includes/comun/config.php';
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

	       <?php require'includes/estructura/leftnews.php'?>
	    </div>
     <div class="menuadmin">
      <div class="addprod">
      <?php
        if(isset($_SESSION['esAdmin']) && $_SESSION['esAdmin'] == true){
          ?>
          <a href="crearProducto.php">Añadir juego </a>
          <?php
        }
        ?>
      </div>
      <div class="addnoticia">
      <?php
        if(isset($_SESSION['esAdmin']) && $_SESSION['esAdmin'] == true){
          ?>
          <a href="">Añadir noticia</a>
          <?php
        }
        ?>
      </div>
    </div>
      <div class="productos">
          <?php
            require_once __DIR__.'/includes/productos/GestionProducto.php';
             GestionProducto::listadoProductos();
          ?>
      </div>
   </div>
  </div>
</body>
</html>

