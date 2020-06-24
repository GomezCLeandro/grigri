<?php

require_once "clases/Usuario.php";

if (!isset($_SESSION['usuario'])) {
	header('location: formulario_login.php');
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a href="/grigri/modulos/usuario/listado_Usuarios.php">Usuarios</a>

</body>
</html>