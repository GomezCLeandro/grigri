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

	<script type="text/javascript" src="../../js/validaciones/validacionModulos.js"></script>

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

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idModulo" value="<?php echo $modificarModulo->getIdModulo(); ?>">

		    <input type="text" id="txtModulo" name="txtModulo" value="<?php echo $modificarModulo->getNombre(); ?>">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>

</body>
</html>