<?php

require_once "../../clases/TipoContacto.php";

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$listadoTipoContacto = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Contacto</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/guardar.php">
			<input type="hidden" name="idPersona" value='<?php echo $idPersona ?>'>
			<input type="hidden" name="idLlamada" value='<?php echo $idLlamada ?>'>

		    <label>Contacto</label>
		    <input type="text" name="txtContacto">
		    <br><br>

			<label>Tipo Contacto:</label>
			<select name="cboTipoContacto">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoTipoContacto as $tipoContacto): ?>

					<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
					    <?php echo $tipoContacto->getDescripcion(); ?>
					</option>

				<?php endforeach ?>

			</select>
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</div>
</body>
</html>