<?php

require_once '../../clases/Barrio.php';

$listadoBarrio = Barrio::obtenerTodos();

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de Domicilio</title>

	<script type="text/javascript" src="../../js/validaciones/validacionDomicilio.js"></script>

</head>
<body>

	<?php require_once "../../menu.php"; ?>

        <?php if (isset($_SESSION['mensaje_error'])) : ?>

            <font color="red"> 
              	<?php echo $_SESSION['mensaje_error']; ?>
            </font>
            <br><br>

        <?php
                unset($_SESSION['mensaje_error']);
            endif;
        ?>
        <div id="mensajeError"></div>

		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">

		    <input type="hidden" name="idPersona" value='<?php echo $idPersona ?>'>
		    <input type="hidden" name="idLlamada" value='<?php echo $idLlamada ?>'>

			<label>Barrio:</label>
			<select name="cboBarrio" id="cboBarrio">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoBarrio as $barrio): ?>

					<option value="<?php echo $barrio->getIdBarrio(); ?>">
					    <?php echo $barrio; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

	        <label>Calle:</label>
		    <input type="text" id="txtCalle" name="txtCalle">
		    <br><br>

		    <label>Altura:</label>
		    <input type="number" id="txtAltura" name="txtAltura">
		    <br><br>

		    <label>Casa:</label>
		    <input type="number" id="txtCasa" name="txtCasa">
			<br><br>

		    <label>Manzana:</label>
		    <input type="number" id="txtManzana" name="txtManzana">
			<br><br>

		    <label>Descripcion:</label>
		    <input type="text" id="txtDescripcion" name="txtDescripcion">
			<br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">		

		</form>  

</body>
</html>