<?php

require_once '../../clases/Servicio.php';

$listado = Servicio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Servicio</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Servicios</th>
			<th>Precio</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $servicio): ?>

		<tr>
			<td> <?php echo $servicio; ?> </td>
			<td> <?php echo $servicio->getPrecio(); ?></td>
			<td>
				<a href="modificar.php?id=<?php echo $servicio->getIdServicio(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nuevo Servicio</a>

</body>
</html>