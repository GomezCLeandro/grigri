<?php

require_once '../../clases/Recurso.php';

$listado = Recurso::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Recursos</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Recursos</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $recursos): ?>

		<tr>
			<td> <?php echo $recursos; ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $recursos->getIdRecurso(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nuevo Recurso</a>

</body>
</html>