<?php

require_once '../../clases/Disenio.php';

$id = $_GET['id'];

$disenio = Disenio::obtenerPorId($id);
//highlight_string(var_export($disenio,true));
//exit;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Diseño</title>
</head>
<body>
<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idDisenio" value="<?php echo $disenio->getIdDisenio(); ?>">

		    <label>Diseño</label>
		    <input type="text" name="txtDescripcion" value="<?php echo $disenio->getIdDisenio(); ?>">
		    <br><br>

		    <label>precio</label>
		    <input type="number" name="txtPrecio" value="<?php echo $disenio->getPrecio(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>

</body>
</html>