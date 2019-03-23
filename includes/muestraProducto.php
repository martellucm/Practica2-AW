
 <?php

          require_once __DIR__.'/GestionProducto.php';
         $producto = GestionProducto::guardarProducto('id');
            if(is_array($producto)){
               $img = $producto['img'];
                echo '<div id="prodM"><img src="data:image/jpg; base64,'.base64_encode($img).'" />';

                echo "<p>".$producto['id']."</p>";
                echo "<p>".$producto['nombre']."</p>";
                echo "<p>".$producto['puntos']."</p";
                echo "<p>".$producto['descript']."</p>";
                echo "<p>".$producto['edad']."</p>";
                echo "<p>".$producto['jugadores']."</p>";
                echo "<p>".$producto['link']."</p>";
                echo "<p>".$producto['empresa']."</p>";
               /* echo "<p>".$producto['fprincipal']."</p>";*/
            }
            else{
              echo "<p>No ha encontrado el producto</p>";
            }
        ?>
