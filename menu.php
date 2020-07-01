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

	<?php foreach ($usuario->perfil->getModulos() as $modulo): ?>

		<a href="/grigri/modulos/<?php echo $modulo->getDirectorio()?>/listado.php">
			<?php echo $modulo; ?>
		</a>

	<?php endforeach ?>

	<? echo $usuario ?>

	<a href="logout.php">Cerra Sesion</a>

</body>
</html>