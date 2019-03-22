<?php
    require_once __DIR__.'/Producto.php';
class GestionProducto{
        public static function mostrarProducto($nombreProd){
            $producto = Product::buscaProduco($nombreProd);
           
            if(!$producto){
                $arr = "Este producto no existe";
            }
             else{              
              $img = $producto->fprincipal();
              $nombre = $producto->nombreProd();
              $puntos = $producto->puntos();

                      $arr = array(
                        "img" => $img,
                        "nombre" => $nombre,
                        "puntos" => $puntos,
                      );
            }

            return $arr;
        }
    }
 ?>
