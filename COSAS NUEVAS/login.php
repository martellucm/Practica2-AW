<?php

require_once __DIR__.'/includes/comun/config.php';

?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>

<body>

	<div id="contenedor">

		<?php
		$app->doInclude('cabecera.php');
		require('includes/usuarios/FormularioLogin.php');
		$formLogin = new \es\ucm\fdi\aw\FormularioLogin();
		echo $formLogin->gestiona()
		?>
	</div>

</body>
</html>