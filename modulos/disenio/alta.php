<!DOCTYPE html>
<html>
<head>
	<title>Alta Diseño</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/guardar.php">

		    <label>Diseño</label>
		    <input type="number" name="txtDiseño">
		    <br><br>

		    <label>precio</label>
		    <input type="number" name="txtPrecio">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</div>
</body>
</html>