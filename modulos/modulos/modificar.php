<?php

require_once '../../clases/Modulo.php';

$id = $_GET['id'];

$modificarModulo = Modulo::obtenerPorId($id);

//highlight_string(var_export($modulo, true));
//exit;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Modulo</title>
</head>
<body>
<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idModulo" value="<?php echo $modificarModulo->getIdModulo(); ?>">

		    <input type="text" name="txtModulo" value="<?php echo $modificarModulo->getNombre(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>

</body>
</html>