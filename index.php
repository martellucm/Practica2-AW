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
        require_once __DIR__.'/includes/GestionaUsuario.php';
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

            GestionUsuario::mostrarWW();
           
	      ?>
        </div>
	    <div id = "week">
			<?php
				GestionUsuario::mostrarWW();
			?>
		</div>

	     <div id = "products">
        <?php
          require_once __DIR__.'/includes/GestionProducto.php';
           GestionProducto::mostrarProd();
        ?> </div>
	</div>
</body>
</html>