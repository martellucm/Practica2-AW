<?<?php
require_once __DIR__ . '/Aplicacion.php';

class Product {

	private $id;
	private $nombreProd;
	private $puntos;
	private $descript;
	private $edad;
	private $jugadores;
	private $link;
	private $empresa;
  private $fprincipal;

	private function __construct($nombreProd, $puntos, $descript, $edad, $jugadores, $link, $empresa, $fprincipal)
    {
        $this->nombreProd= $nombreProd;
        $this->puntos = $puntos;
        $this->descript = $descript;
        $this->edad = $edad;
        $this->jugadores = $jugadores;
        $this->link = $link;
        $this->empresa = $empresa;
        $this->fprincipal = $fprincipal;
    }

	public static function buscaProduco($id)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM producto P WHERE P.id = '%s'", $conn->real_escape_string($id));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $product = new Product($fila['nombreProd'], $fila['puntos'], $fila['descript'], $fila['edad'], $fila['jugadores'], $fila['link'], $fila['empresa'], $fila['fprincipal']);
                $product->id = $fila['id'];
                $result = $product;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

	public static function buscaProducoNom($nombreProd)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM producto P WHERE P.nombreProd = '%s'", $conn->real_escape_string($nombreProd));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $product = new Product($fila['nombreProd'], $fila['puntos'], $fila['descript'], $fila['edad'], $fila['jugadores'], $fila['link'], $fila['empresa'], $fila['fprincipal']);
                $product->id = $fila['id'];
                $result = $product;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

     public static function guarda($producto)
    {
        if ($producto->id !== null) {
            return self::actualiza($producto);
        }
        return self::inserta($producto);
    }
	public static function crea($nombreProd,$puntos, $descript, $edad, $jugadores, $link, $empresa, $fprincipal)
    {
        $product = self::buscaProducoNom($nombreProd);
        if ($product instanceof Product) {
            return false;
        }
        $product = new Product($nombreProd,$puntos, $descript, $edad, $jugadores, $link, $empresa, $fprincipal);
        return self::guarda($product);
    }

    private static function inserta($producto)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO producto(nombreProd, puntos, descript, edad, jugadores, link, empresa,fprincipal) VALUES('%s','%s', '%s', '%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($producto->nombreProd)
            , $conn->real_escape_string($producto->puntos)
            , $conn->real_escape_string($producto->descript)
            , $conn->real_escape_string($producto->edad)
        	  , $conn->real_escape_string($producto->jugadores)
            , $conn->real_escape_string($producto->link)
            , $conn->real_escape_string($producto->empresa)
            , $conn ->real_escape_string($producto->fprincipal));
        if ( $conn->query($query) ) {
            $producto->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno() . ") " . utf8_encode($conn->error);
            exit();
        }
        return $producto;
    }

     private static function actualiza($producto)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE producto P SET nombreProd = '%s', puntos='%s', descript='%s', edad='%s', jugadores= '%s', link= '%s', empresa='%s' WHERE P.id=%i"
            , $conn->real_escape_string($producto->nombreProd)
            , $conn->$producto->puntos
            , $conn->real_escape_string($producto->descript)
            , $conn->$producto->edad
            , $conn->$producto->jugadores
            , $conn->$producto->jugadores
            , $conn->real_escape_string($producto->link)
            , $conn->real_escape_string($producto->empresa)
            ,$conn ->$producto->fprincipal
            , $producto->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el producto: " . $producto->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        return $producto;
    }

    public function id()
    {
        return $this->id;
    }

    public function nombreProd()
    {
    	return $this->nombreProd;
    }

    public function puntos()
    {
    	return $this->puntos;
    }
    public function descript(){
    	return $this->descript;
    }
    public function edad(){
    	return $this->edad;
    }

    public function jugadores(){
    	return $this->jugadores;
    }
    public function link(){
    	return $this->link;
    }
    public function empresa(){
    	return $this->empresa;
    }
    public function fprincipal(){
        return $this->fprincipal;
    }

}


 ?>
