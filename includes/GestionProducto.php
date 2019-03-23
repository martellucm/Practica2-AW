<?php
    require_once __DIR__.'/Producto.php';
class GestionProducto{
        public static function guardarProducto($id){
            $producto = Product::buscaProduco($id);

            if(!$producto){
                $arr = "Este producto no existe";
            }
             else{
              $img = $producto->fprincipal();
              $nombre = $producto->nombreProd();
              $puntos = $producto->puntos();
              $descript = $producto->descript();
              $edad = $producto->edad();
              $jugadores = $producto->jugadores();
              $link = $producto->link();
              $empresa = $producto->empresa();
              $id = $producto->id();

              $arr = array(
                "img" => $img,
                "nombre" => $nombre,
                "puntos" => $puntos,
                "descript" => $descript,
                "edad" => $edad,
                "jugadores" => $jugadores,
                "link" => $link,
                "empresa" => $empresa,
                "id" => $id,

              );
            }

            return $arr;
        }

        public static function getMaxProd(){
           $app = Aplicacion::getSingleton();
           $conn = $app->conexionBd();
           $query = sprintf("SELECT `id` FROM `producto` WHERE `puntos` >= 6 ORDER BY `puntos` DESC");
           $rs = $conn->query($query);
           $result = false;
           if ($rs) {
            if ($rs->num_rows > 0) {
              while( $row = mysqli_fetch_assoc($rs)) {
               $producto[] = GestionProducto::guardarProducto($row['id']);
              }
              $result = $producto;
              $rs->free();
            }
           } else {
               echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
               exit();
           }
           return $result;
        }

         public static function mostrarProd(){
          $producto = GestionProducto::getMaxProd();
            foreach ($producto as &$row) {
              if(is_array($row)){
                $img = $row['img'];
                echo '<div id="products"><img src="data:image/jpg; base64,'.base64_encode($img).'" />';
                echo "<p>".$row['nombre']."</p>";
                echo "<p>".$row['puntos']."</p> </div>";
              }
              else{
                echo 'No ha encontrado el producto';
              }
            }
           unset($row);
        }
    }
 ?>
