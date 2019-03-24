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
        <h2>Ganador del MES</h2>
	    <?php
        require_once __DIR__.'/includes/GestionaUsuario.php';
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
	     <div class = "products">
        <?php
          require_once __DIR__.'/includes/GestionProducto.php';
           GestionProducto::mejoresProductos('3');
        ?> </div>
    </div>
	</div>
</body>
</html>