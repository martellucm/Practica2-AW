<?php
    require_once __DIR__.'/Producto.php';
class GestionProducto{
        public static function mostrarProducto($id){
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
              $ids = $rs->fetch_assoc();
              
              $producto = GestionProducto::mostrarProducto($ids);
              $result = $producto;
              $rs->free();
           } else {
               echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
               exit();
           }
           return $result;
        }
    }
 ?>
