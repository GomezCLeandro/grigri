<?php

require_once '../../clases/Disenio.php';
require_once '../../clases/Imagen.php';

$listado = Disenio::obtenerTodos();

//$imagenes = Imagen::obtenerTodos();

//highlight_string(var_export($listado,true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Dise&ntilde;o</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $disenio): ?>

		<tr>
			<td> <?php echo $disenio->getDescripcion(); ?> </td>
			<td> <?php echo $disenio->getPrecio(); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nuevo Diseño</a>

</body>
</html>