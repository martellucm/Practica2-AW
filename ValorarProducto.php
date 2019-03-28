
<?= 
	require_once __DIR__.'/includes/GestionProducto.php';
	require_once __DIR__.'/includes/config.php';
?>
<div>
	<?php 
	     $id = $_GET['id']; 
	     $val = $_POST['val'];
	     GestionProducto::actualizaPuntuacion($val, $id);
	     Header("Location: productos.php?id=$id");
	?>
</div>



