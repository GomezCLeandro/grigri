<?php

require_once 'clases/Usuario.php';

session_start();

if (!isset($_SESSION['usuario'])) {
	header("location: formulario_login.php");
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php require_once 'menu.php'; ?>

</body>
</html>