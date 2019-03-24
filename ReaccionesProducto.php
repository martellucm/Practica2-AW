
 <?php
 
 class Valoracion{
	 public static function setPuntuacion($id){

	echo '<div>';
	echo	'<h3>Este producto</h3>';
	echo	 '<p>Pon tu nota(0-10): </p>';

	echo	 '<form action = "includes/ValorarProducto.php?id='.$id.'" method="POST">
		 <input type="number" name="val" value="0" min="0" max="10"><br>
		 <input type="submit" value="Valorar">
		 </form>';

	echo	'<p>Comentarios</p>';
	echo' </div>';
	}
	
}
 ?>
