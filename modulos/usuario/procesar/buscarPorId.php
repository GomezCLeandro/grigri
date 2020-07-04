<?php

require_once "../../../clases/Usuario.php";

$id = $_GET['id'];

$usuario = Usuario::obtenerPorId($id);

//highlight_string(var_export($usuario,true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php 

//require_once '../../../dashboard.php';

 ?>

	<table border="1" align="center">
		<tr>
			<th>Id Usuario</th>
			<th>Id Persona</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Numero Documento</th>
			<th>Fecha de Nacimiento</th>
			<th>Sexo</th>
			<th>Accion</th>
		</tr>
		<tr>
			<td> <?php echo $usuario->getIdUsuario(); ?> </td>
			<td> <?php echo $usuario->getIdPersona(); ?> </td>
			<td> <?php echo $usuario->getNombre(); ?> </td>
			<td> <?php echo $usuario->getApellido(); ?> </td>
			<td> <?php echo $usuario->getNumeroDocumento(); ?> </td>
			<td> <?php echo $usuario->getFechaNacimiento(); ?> </td>
			<td> <?php echo $usuario->getSexo(); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $usuario->getIdPersona(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

	<table border="1" align="center">
		<tr>
			<th>Id Domicilio</th>
			<th>Casa</th>
			<th>Calle</th>
			<th>Altura</th>
			<th>Descripcion</th>
			<th>Barrio</th>
			<th>Localidad</th>
			<th>Accion</th>
		</tr>
		<tr>
			<td> <?php echo $usuario->domicilio->getIdDomicilio(); ?> </td>
			<td> <?php echo $usuario->domicilio->getCasa(); ?> </td>
			<td> <?php echo $usuario->domicilio->getCalle(); ?> </td>
			<td> <?php echo $usuario->domicilio->getAltura(); ?> </td>
			<td> <?php echo $usuario->domicilio->getDescripcion(); ?> </td>
			<td> <?php echo $usuario->domicilio->barrio->getNombre(); ?> </td>
			<td> <?php echo $usuario->domicilio->barrio->localidad->getNombre(); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $usuario->getIdPersona(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
			</td>

		</tr>
	</table>



</body>
</html>
