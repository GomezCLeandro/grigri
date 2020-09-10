<?php

require_once '../../clases/Pedido.php';
require_once "../../clases/Usuario.php";
require_once "../../clases/Envio.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/Disenio.php";
require_once '../../clases/DetallePedido.php';

$id = $_GET['id'];

$pedido = Pedido::obtenerPorId($id);
$detallePedido = DetallePedido::obtenerPorIdPedido($id);
$listadoUsuario = Usuario::obtenerTodos();
$listadoEnvio = Envio::obtenerTodos();
$listadoEstadoPedido = EstadoPedido::obtenerTodos();
$listadoDisenio = Disenio::obtenerTodos();

//highlight_string(var_export($modulo, true));
//exit;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Pedido</title>

	<script type="text/javascript" src="../../js/validaciones/validacionModulos.js"></script>

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

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idPedido" value="<?php echo $pedido->getIdPedido(); ?>">
			<input type="hidden" name="idDetallePedido" value="<?php echo $detallePedido->getIdDetallePedido(); ?>">

			<label>Usuario: Persona:</label>
			<select name="cboUsuario" id="">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoUsuario as $cboUsuario):
					$selected = '';
					if ($pedido->getIdUsuario() == $cboUsuario->getIdUsuario()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $cboUsuario->getIdUsuario(); ?>" <?php echo $selected; ?> >
					    <?php echo $cboUsuario. ": " .$cboUsuario->getApellido(). ", " .$cboUsuario->getNombre(); ?>
					</option>

				<?php endforeach ?>
			</select>
			<br><br>

			<label>Tipo Envio:</label>
			<select name="cboEnvio" id="">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoEnvio as $cboEnvio):
					$selected = '';
					if ($pedido->getIdEnvio() == $cboEnvio->getIdEnvio()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $cboEnvio->getIdEnvio(); ?>" <?php echo $selected; ?> >
					    <?php echo $cboEnvio->getDescripcion(); ?>
					</option>

				<?php endforeach ?>
			</select>	
			<br><br>

			<label>Diseño:</label>
			<select name="cboItem" id="">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoDisenio as $cboDisenio):
					$selected = '';
					if ($detallePedido->getIdItem() == $cboDisenio->getIdItem()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $cboDisenio->getIdItem(); ?>" <?php echo $selected; ?> >
					    <?php echo $cboDisenio->getDescripcion(); ?>
					</option>

				<?php endforeach ?>
			</select>
			<br><br>

		    <label>Fecha de Entrega</label>
		    <input type="date" id="txtDescripcion" name="txtFechaEntrega" value="<?php echo $pedido->getFechaEntrega(); ?>">
		    <br><br>

			<label>Estado:</label>
			<select name="cboEstado" id="">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoEstadoPedido as $cboEstado):
					$selected = '';
					if ($pedido->getIdEstadoPedido() == $cboEstado->getIdEstadoPedido()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $cboEstado->getIdEstadoPedido(); ?>" <?php echo $selected; ?> >
					    <?php echo $cboEstado->getDescripcion(); ?>
					</option>

				<?php endforeach ?>
			</select> 
			<br><br>

		    <label>Cantidad:</label>
		    <input type="number" id="" name="txtCantidad" value="<?php echo $detallePedido->getCantidad(); ?>">
		    <br><br>

		    <input type="submit" value="Modificar">			

		</form>

</div>
</body>
</html>

</body>
</html>