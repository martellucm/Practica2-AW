<div id = "cabecera">
	<a href='index.php'><img src="img/Logo.svg" width="200" height="300"></a>
	<div class="saludo">
	<?php
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
		echo "Bienvenido, " . $_SESSION['nombre'] . ".<a href='logout.php'>(salir)</a>";
		
	} else {
		echo "<a href='login.php'>Login</a> <a href='registro.php'>Registro</a>";
	}
	?>
	</div>

	<div class="navMenu">
		<ul>
			<li><a href='index.php'>Home</a></li>
			<li><a href=''>Productos</a></li>
			<li><a href=''>Torneos</a></li>
			<li><a href=''>Sobrenosotros</a></li>
			<li><a href=''>Foro</a></li>
		</ul>
	</div>
</div>
