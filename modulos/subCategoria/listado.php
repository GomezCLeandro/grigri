<?php

require_once '../../clases/SubCategoria.php';
require_once '../../clases/Categoria.php';

$listado = SubCategoria::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Sub Categorias</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Sub Categorias</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $subCategoria): ?>

		<tr>
			<td> <?php echo utf8_encode($subCategoria); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $subCategoria->getIdSubCategoria(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $subCategoria->getIdSubCategoria(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nueva Sub Categoria</a>

</body>
</html>