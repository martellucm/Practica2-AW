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
	    <div id = "publi">
        <img class="foto_publi" src="img/publi.jpg" width="784" height="200">
      </div>
	   	<div id = "month">
        <h2>Ganador del MES</h2>
	    <?php
        require_once __DIR__.'/includes/usuarios/GestionaUsuario.php';
           GestionUsuario::mostrarWW();
	      ?>
        </div>
	    <div id = "week">
        <h2>Ganador de la SEMANA</h2>
			<?php
				GestionUsuario::mostrarWW();
			?>
		</div>
    <div class = "productos">
        <?php
          require_once __DIR__.'/includes/productos/GestionProducto.php';GestionProducto::mejoresProductos('3');
        ?>
    </div>
	</div>
</body>
</html>

