
 <?php

          require_once __DIR__.'/GestionProducto.php';
         $producto = GestionProducto::getProducts();
            if(is_array($producto)){


              foreach ($producto as &$row) {
              $img = $row['img'];
              echo '<div id="products"><img src="data:image/jpg; base64,'.base64_encode($img).'" />';
              echo "<p>".$row['nombre']."</p>";
              echo "<p>".$row['puntos']."</p> </div>";
            }
             /*
              foreach ($producto as $img => $id) {
                ?>  <TABLE>
                <TD ROWSPAN =1 COLSPAN=1>
              <?php if(is_array($producto)){
               $img = $producto['img'];
                echo '<div id="prodM"><img src="data:image/jpg; base64,'.base64_encode($img).'" />';

                echo "<p>".$producto['nombre']."</p>";
                echo "<p>".$producto['puntos']."</p";  } ?>
                </TD> </TABLE> <?php
              }*/
            }
              ?>