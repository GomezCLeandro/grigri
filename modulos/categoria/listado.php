<?php

require_once '../../clases/Categoria.php';

$listado = Categoria::obtenerTodos();
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
			<th>Categoria</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $categoria): ?>

		<tr>
			<td> <?php echo $categoria; ?> </td>
			<td>
				<a href="detalle.php?id=<?php echo $usuario->getIdUsuario(); ?>">SubCategorias</a>
				-
				<a href="modificar.php?id=<?php echo $usuario->getIdUsuario(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nueva Categoria</a>

</body>
</html>