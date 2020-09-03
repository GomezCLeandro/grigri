<!DOCTYPE html>
<html>
<head>
	<title>Alta Recurso</title>

	<script type="text/javascript" src="../../js/validaciones/validacionRecursos.js"></script>

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

		    <label>Nombre del Recurso</label>
		    <input type="text" id="txtRecurso" name="txtRecurso">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>