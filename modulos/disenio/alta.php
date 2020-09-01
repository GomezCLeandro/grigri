<!DOCTYPE html>
<html>
<head>
	<title>Alta Diseño</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/guardar.php" enctype="multipart/form-data">

		    <label>Descripcion</label>
		    <input type="text" name="txtDescripcion">
		    <br><br>

		    <label>precio</label>
		    <input type="number" name="txtPrecio">
		    <br><br>

		    Imagen: <input type="file" name="fileImagen">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</div>
</body>
</html>