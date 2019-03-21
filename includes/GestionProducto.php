<?php 
    require_once __DIR__.'/Producto.php';
class GestionProducto{
        public static function mostrarProducto($id){
            if (Product::buscaProduco($id) !== NULL){

                $producto = array(
                    "img" => Product::fprincipal(),
                    "nombre"=> Product::nombreProd(),
                    "puntos" => Product::puntos());

            }
            else{
                $producto = "Este producto no existe";
            }

            return $producto;
        }
    }
 ?>