<?php

require_once '../../clases/Modulo.php';

$listadoModulos = Modulo::obtenerTodos();

//highlight_string(var_export($listadoModulos, true));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Modulo</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Modulo</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listadoModulos as $modulos): ?>

		<tr>
			<td> <?php echo utf8_encode($modulos); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $modulos->getIdModulo(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $modulos->getIdModulo(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nuevo Modulo</a>

</body>
</html>