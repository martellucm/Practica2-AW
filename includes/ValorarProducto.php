 <?php
 $id =  $_GET['id'];
 $val = $_GET['val'];
    require_once __DIR__.'/GestionProducto.php';
    GestionProducto::actualizaPuntuacion($val, $id);
?>
