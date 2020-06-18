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

	<table border="1" align="center">
		<tr>
			<th>Id Usuario</th>
			<th>Id Persona</th>
			<th>Username</th>
			<th>Password</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $usuario): ?>

		<tr>
			<td> <?php echo $usuario->getIdUsuario(); ?> </td>
			<td> <?php echo $usuario->getIdPersona(); ?> </td>
			<td> <?php echo $usuario->getUsername(); ?> </td>
			<td> <?php echo $usuario->getPassword(); ?> </td>
			<td>
				<a href="procesar/buscarId.php?id=<?php echo $usuario->getIdPersona(); ?>">Detalle</a>
				-
				<a href="">Modificar</a>
				-
				<a href="">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

</body>
</html>
				<!-- - 
				<a href="modificar.php?id=<?php echo $cliente->getIdCliente(); ?>"></a>
				-
				<a href="eliminar.php?id=<?php echo $cliente->getIdPersona(); ?>"onclick="return confirm('Seguro quiere eliminar este Cliente?');"></a> -->