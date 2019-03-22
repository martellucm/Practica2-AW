<?php
require_once __DIR__.'/includes/config.php';
?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registro</title>
</head>

<body>

<div id="contenedor">

<?php
	require("includes/comun/cabecera.php");
?>

	<div id="contenido">
		<h1>Registro de usuario</h1>

		<form action="procesarRegistro.php" method="POST">
		<fieldset>
			<div class="grupo-control">
				<label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" />
			</div>
			<div class="grupo-control">
				<label>Nombre completo:</label> <input class="control" type="text" name="nombre" />
			</div>
			<div class="grupo-control">
				<label>Password:</label> <input class="control" type="password" name="password" />
			</div>
			
			<div class="grupo-control">
				<label>Correo electrónico:</label> <input class="control" type="text" name="email" />
			</div>
			<div class="grupo-control">
				<label>Háblanos sobre ti:</label> <input class="control" type="text" name="descrip" />
			</div>
			<div class="grupo-control">
				<label>Fecha de nacimiento:</label> <input class="control" type="date" name="cumple" />
			</div>
			<div class="grupo-control"><label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2" /><br /></div>
			<div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>
		</fieldset>
		</form>


	</div>



</div>

</body>
</html>