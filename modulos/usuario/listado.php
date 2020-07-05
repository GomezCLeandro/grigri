<?php

require_once '../../clases/Usuario.php';

$listado = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $usuario): ?>

		<tr>
			<td> <?php echo $usuario->getUsername(); ?> </td>
			<td> <?php echo $usuario->getPassword(); ?> </td>
			<td>
				<a href="detalle.php?id=<?php echo $usuario->getIdPersona(); ?>">Detalle</a>
				-
				<a href="modificar.php?id=<?php echo $usuario->getIdPersona(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php?id=<?php echo $usuario->getIdUsuario(); ?>">Agregar Nuevo Usuario</a>

</body>
</html>