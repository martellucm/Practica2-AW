
 <?php
  require_once __DIR__ . '/includes/config.php';
 class Valoracion{
	 public static function setPuntuacion($id){
	 	if (!isset($_SESSION['login'])) {
          echo "<p>Usuario no registrado!</p>";
          echo "<p>No puedes votar</p>";
        } else {
		echo '<div>';
		echo	 '<p>VALORA ESTE JUEGO <br> (0 - 10) </p>';

		echo	 '<form action = "includes/ValorarProducto.php?id='.$id.'" method="POST">
			 <input type="number" name="val" value="0" min="0" max="10"><br>
			 <input type="submit" value="Valorar">
			 </form>';

		echo	'<p>Comentarios</p>';
		echo' </div>';
		}
	}
	
}
 ?>
