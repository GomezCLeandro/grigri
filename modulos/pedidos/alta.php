<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/Envio.php";
require_once "../../clases/Disenio.php";

$listadoUsuario = Usuario::obtenerTodos();
$listadoEnvio = Envio::obtenerTodos();
$listadoDisenio = Disenio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Pedido</title>

	<script type="text/javascript" src="../../js/validaciones/validacionItem.js"></script>

</head>
<body>

	<?php //require_once '../../menu.php'; ?>
	
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

		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php" enctype="multipart/form-data">

			<label>Usuario / Persona:</label>
			<select name="idUsuario" id="idCategoria">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoUsuario as $usuario): ?>

					<option value="<?php echo $usuario->getIdUsuario(); ?>">
					    <?php echo $usuario . ", " . $usuario->getApellido(). " " .$usuario->getNombre(); ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

			<label>Tipo Envio:</label>
			<select name="idTipoEnvio" id="idCategoria">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoEnvio as $tipoEnvio): ?>

					<option value="<?php echo $tipoEnvio->getIdEnvio(); ?>">
					    <?php echo $tipoEnvio->getDescripcion(); ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

			<label>Diseño:</label>
			<select name="idItem" id="idCategoria">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoDisenio as $disenio): ?>

					<option value="<?php echo $disenio->getIdItem(); ?>">
					    <?php echo $disenio->getDescripcion(); ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

		    <label>Fecha de Entrega</label>
		    <input type="date" id="txtDescripcion" name="txtFechaEntrega">
		    <br><br>

		    <label>Cantidad:</label>
		    <input type="number" id="txtAltura" name="txtCantidad">
		    <br><br>

		    <input type="submit" value="Guardar" >

		</form>

</div>
</body>
</html>