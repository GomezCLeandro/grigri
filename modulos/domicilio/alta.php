<?php

require_once '../../clases/Barrio.php';

$listadoBarrio = Barrio::obtenerTodos();

$idPersona = $_GET['idPersona'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de Domicilio</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

		<form name="frmDatos" method="POST" action="procesar/guardar.php">

		    <input type="hidden" name="idPersona" value='<?php echo $idPersona ?>'>
		    <!--<input type="hidden" name="IdLlamada" value='<?php echo $idLlamada ?>'>-->

			<label>Barrio:</label>
			<select name="cboBarrio">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoBarrio as $barrio): ?>

					<option value="<?php echo $barrio->getIdBarrio(); ?>">
					    <?php echo $barrio; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

	        <label>Calle:</label>
		    <input type="text" name="txtCalle">
		    <br><br>

		    <label>Altura:</label>
		    <input type="number" name="txtAltura">
		    <br><br>

		    <label>Casa:</label>
		    <input type="number" name="txtCasa">
			<br><br>

		    <label>Manzana:</label>
		    <input type="number" name="txtManzana">
			<br><br>

		    <label>Descripcion:</label>
		    <input type="text" name="txtDescripcion">
			<br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>  

</body>
</html>