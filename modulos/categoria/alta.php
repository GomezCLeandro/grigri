<!DOCTYPE html>
<html>
<head>
	<title>Alta Categoria</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/guardar.php">

		    <label>Nombre de la Categoria</label>
		    <input type="text" name="txtCategoria">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</div>
</body>
</html>