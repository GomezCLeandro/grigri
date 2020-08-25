<?php

require_once '../../clases/Perfil.php';

$listado = Perfil::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Perfil</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Perfiles</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $perfil): ?>

		<tr>
			<td> <?php echo $perfil->getDescripcion(); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $perfil->getIdPerfil(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nuevo Perfil</a>

</body>
</html>