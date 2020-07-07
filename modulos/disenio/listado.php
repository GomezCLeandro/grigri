<?php

require_once '../../clases/Disenio.php';

$listado = Disenio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Diseño</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Diseños</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $disenio): ?>

		<tr>
			<td> <?php echo $disenio->getIdDisenio(); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nuevo Diseño</a>

</body>
</html>