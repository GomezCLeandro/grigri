<?php

require_once "../../clases/Usuario.php";

$id = $_GET['id'];
$usuario = Usuario::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtId" value="<?php echo $usuario->getIdUsuario(); ?>">

		    <label>Username</label>
		    <input type="text" name="txtUsername" value="<?php echo $usuario->getUsername(); ?>">
		    <br><br>

		    <label>Nombre</label>
		    <input type="text" name="txtNombre" value="<?php echo $usuario->getNombre(); ?>">
		    <br><br>

		    <label>Apellido</label>
		    <input type="text" name="txtApellido" value="<?php echo $usuario->getApellido(); ?>">
		    <br><br>

		    <label>Sexo</label>
		    <input type="text" name="txtSexo" value="<?php echo $usuario->getSexo(); ?>">
		    <br><br>

		    <label>Numero de documento</label>
		    <input type="text" name="txtNumeroDocumento" value="<?php echo $usuario->getNumeroDocumento(); ?>">
		    <br><br>

		    <label>Fecha de nacimiento</label>
		    <input type="date" name="txtFechaNacimiento" value="<?php echo $usuario->getFechaNacimiento(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>