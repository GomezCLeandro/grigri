<!DOCTYPE html>
<html>
<head>
	<title>Alta de Imagenes</title>
</head>
<body>

	<br><br>

	<div align="center">

		<form method="POST" action="guardar.php" enctype="multipart/form-data">
			Descripcion: <input type="text" name="txtDescripcion">
			<br><br>

			Imagen: <input type="file" name="fileImagen">
			
			<br><br>
			<input type="submit" value="Guardar">
		</form>

	</div>

</body>
</html>