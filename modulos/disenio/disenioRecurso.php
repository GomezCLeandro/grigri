<?php

require_once '../../clases/Disenio.php';
require_once '../../clases/Imagen.php';

$id = $_GET['id'];

$disenio = Disenio::obtenerPorId($id);

$arrRecurso = $disenio->arrRecurso;

//highlight_string(var_export($r,true));
//exit;
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
		</tr>
		<tr>
			<td> <?php echo $disenio->getDescripcion(); ?> </td>
			<td> <?php echo $disenio->getPrecio(); ?> </td>
		</tr>
	</table>

	<br><br>
	
	<table border="1" align="center">
		<tr>
			<th>Recurso</th>
		</tr>
		<?php foreach ($arrRecurso as $recurso): ?>
		<tr>
			<td>
				<?php echo $recurso; ?>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	<a href="modificar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Modificar</a>
	-
	<a href="eliminar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Borrar</a>
</body>
</html>