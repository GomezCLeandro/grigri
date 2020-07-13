<?php

require_once '../../clases/Servicio.php';

$id = $_GET['id'];

$servicio = Servicio::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Servicio</title>
</head>
<body>
<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idServicio" value="<?php echo $servicio->getIdServicio(); ?>">

		    <label>Servicio</label>
		    <input type="text" name="txtDescripcion" value="<?php echo $servicio; ?>">
		    <br><br>

		    <label>precio</label>
		    <input type="number" name="txtPrecio" value="<?php echo $servicio->getPrecio(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>

</body>
</html>