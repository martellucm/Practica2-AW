<?php
    require_once __DIR__.'/Producto.php';
class GestionProducto{
        public static function mostrarProducto($nombreProd){
            $producto = Product::buscaProduco($nombreProd);
            if ( is_array($producto){

              /*  $producto = array(
              "img" => Product::fprincipal(),
              "nombre"=> Product::nombreProd(),
              "puntos" => Product::puntos());
            */
              
              $img = $producto->fprincipal();
              $nombre = $producto->nombreProd();
              $puntos = $producto->puntos();

                      $arr = array(
                        "img" => $img,
                        "nombre" => $nombre,
                        "puntos" => $puntos,
                      );
            }
            else{
                $arr = "Este producto no existe";
            }

            return $arr;
        }
    }
 ?>
