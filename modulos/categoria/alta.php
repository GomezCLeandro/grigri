<!DOCTYPE html>
<html>
<head>
	<title>Alta Categoria</title>

	<script type="text/javascript" src="../../js/validaciones/validacionCategoria.js"></script>

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

		    <label>Nombre de la Categoria</label>
		    <input type="text" name="txtCategoria" id="txtCategoria">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">
		</form>

	</div>
</body>
</html>