<!DOCTYPE html>
<html>
<head>
	<title>Alta Usuario y Persona</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/guardar.php">

		    <label>Username</label>
		    <input type="text" name="txtUsername">
		    <br><br>

		    <label>Password</label>
		    <input type="password" name="txtPassword">
		    <br><br>

		    <label>Nombre</label>
		    <input type="text" name="txtNombre">
		    <br><br>

		    <label>Apellido</label>
		    <input type="text" name="txtApellido">
		    <br><br>

		    <label>Sexo</label>
		    <input type="text" name="txtSexo">
		    <br><br>

		    <label>Numero de documento</label>
		    <input type="text" name="txtNumeroDocumento">
		    <br><br>

		    <label>Fecha de nacimiento</label>
		    <input type="date" name="txtFechaNacimiento">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</div>
</body>
</html>