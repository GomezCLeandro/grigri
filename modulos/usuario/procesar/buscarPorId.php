<?php

require_once "../../../clases/Usuario.php";

$id = $_GET['id'];

$usuario = Usuario::obtenerPorId($id);

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
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Numero Documento</th>
			<th>Fecha de Nacimiento</th>
			<th>Sexo</th>
		</tr>
		<tr>
			<td> <?php echo $usuario->getIdUsuario(); ?> </td>
			<td> <?php echo $usuario->getIdPersona(); ?> </td>
			<td> <?php echo $usuario->getNombre(); ?> </td>
			<td> <?php echo $usuario->getApellido(); ?> </td>
			<td> <?php echo $usuario->getNumeroDocumento(); ?> </td>
			<td> <?php echo $usuario->getFechaNacimiento(); ?> </td>
			<td> <?php echo $usuario->getSexo(); ?> </td>
		</tr>

	<table border="1" align="center">
		<tr>
			<th>Calle</th>
			<th>altura</th>
			<th>Casa</th>
			<th>Manzana</th>
			<th>Descripcion</th>
		</tr>
		<tr>
			<td> <?php echo $usuario->getCalle(); ?> </td>
			<td> <?php echo $usuario->getAltura(); ?> </td>
			<td> <?php echo $usuario->getCasa(); ?> </td>
			<td> <?php echo $usuario->getManzana(); ?> </td>
			<td> <?php echo $usuario->getDescripcion(); ?> </td>
		</tr>

</body>
</html>
