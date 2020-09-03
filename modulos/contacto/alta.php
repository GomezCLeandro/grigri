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

	<script type="text/javascript" src="../../js/validaciones/validacionContacto.js"></script>

</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">

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

		    <label>Contacto</label>
		    <input type="text" id="txtContacto" name="txtContacto">
		    <br><br>

			<label>Tipo Contacto:</label>
			<select name="cboTipoContacto" id="cboTipoContacto">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoTipoContacto as $tipoContacto): ?>

					<option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
					    <?php echo $tipoContacto->getDescripcion(); ?>
					</option>

				<?php endforeach ?>

			</select>
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">

		</form>

</div>
</body>
</html>