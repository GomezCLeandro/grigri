<!DOCTYPE html>
<html>
<head>
	<title>Alta Servicio</title>

	<script type="text/javascript" src="../../js/validaciones/validacionItem.js"></script>

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

		    <label>Servicio</label>
		    <input type="text" id="txtDescripcion" name="txtDescripcion">
		    <br><br>

		    <label>precio</label>
		    <input type="number" id="txtPrecio" name="txtPrecio">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">

		</form>

</div>
</body>
</html>