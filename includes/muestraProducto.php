 <?php
 $id = $_GET['id'];
    require_once __DIR__.'/GestionProducto.php';
     	$producto = GestionProducto::guardarProducto($id);
        if(is_array($producto)){
            echo '<div id = "img_total"><img src="productos/'.$id.'.jpg">';
            echo '<div id = "nombre_total"><p>'.$producto['nombre'].'</p></div>';
            echo '<div id = "puntos_total"><p> Puntuación: '.$producto['puntos'].'</p></div>';
            echo '<div id = "desc_total"><p>'.$producto['descript'].'</p></div>';
            echo '<div id = "edad_total"><p> Edad: '.$producto['edad'].'</p></div>';
            echo '<div id = "jugadores_total"><p>Número de jugadores: '.$producto['jugadores'].'</p></div>';
          	echo '<div id = "link_total"><p>'.$producto['link'].'</p></div>';
         	echo '<div id = "empresa_total"><p>'.$producto['empresa'].'</p></div></div>';
        }
        else{
          echo "<p>No ha encontrado el producto</p>";
        }
?>
