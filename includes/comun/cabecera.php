<div id = "cabecera">
	<a href='index.php'><img src="img/Logo.svg" width="200" height="300"></a>
	<div class="saludo">
		<?php
		if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
			echo "Bienvenido, " . $_SESSION['nombre'] . ".<a href='miBoqueron.php'>Mi boquerón</a><a href='logout.php'>(salir)</a>";

		} else {
			echo "<a href='registro.php'>Registro</a>";
			echo "<a href='login.php'>Login</a>";
			
		}
		?>
	</div>
	<div class="navMenu">
		<ul>
			<li><a href='index.php'>Home</a></li>
			<li><a href='none_page.php'>Productos</a></li>
			<li><a href='none_page.php'>Torneos</a></li>
			<li><a href='none_page.php'>About us</a></li>
			<li><a href='none_page.php'>Foro</a></li>
		</ul>
	</div>
</div>
