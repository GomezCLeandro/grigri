<?php

require_once '../../clases/Recurso.php';

$id = $_GET['id'];

$recurso = Recurso::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Recurso</title>
</head>
<body>
<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idRecurso" value="<?php echo $recurso->getIdRecurso(); ?>">

		    <label>Recurso</label>
		    <input type="text" name="txtRecurso" value="<?php echo $recurso; ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>

</body>
</html>