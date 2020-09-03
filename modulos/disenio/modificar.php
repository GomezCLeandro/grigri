<?php

require_once '../../clases/Disenio.php';

$id = $_GET['id'];

$disenio = Disenio::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Diseño</title>

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

		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idDisenio" value="<?php echo $disenio->getIdDisenio(); ?>">

		    <label>Diseño</label>
		    <input type="text" id="txtDescripcion" name="txtDescripcion" value="<?php echo $disenio->getDescripcion(); ?>">
		    <br><br>

		    <label>precio</label>
		    <input type="number" id="txtPrecio" name="txtPrecio" value="<?php echo $disenio->getPrecio(); ?>">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>

</body>
</html>