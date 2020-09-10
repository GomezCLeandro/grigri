<?php

require_once "../../clases/Domicilio.php";

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);
$arrBarrios = $domicilio->barrio->obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Domicilio</title>

	<script type="text/javascript" src="../../js/validaciones/validacionDomicilio.js"></script>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

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
	
<div align="center">
		<form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idPersona" value="<?php echo $domicilio->getIdPersona(); ?>">
			<input type="hidden" name="idDomicilio" value="<?php echo $domicilio->getIdDomicilio(); ?>">
			<input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>

			<label>Barrio:</label>
			<select name="idBarrio" id="cboBarrio">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($arrBarrios as $cboBarrios):
					$selected = '';
					if ($domicilio->getIdBarrio() == $cboBarrios->getIdBarrio()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $cboBarrios->getIdBarrio(); ?>" <?php echo $selected; ?> >
					    <?php echo $cboBarrios; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

		    <label>Calle</label>
		    <input type="text" id="txtCalle" name="txtCalle" value="<?php echo $domicilio->getCalle(); ?>">
		    <br><br>

		    <label>Altura</label>
		    <input type="number" id="txtAltura" name="txtAltura" value="<?php echo $domicilio->getAltura(); ?>">
		    <br><br>

		    <label>Casa</label>
		    <input type="number" id="txtCasa" name="txtCasa" value="<?php echo $domicilio->getCasa(); ?>">
		    <br><br>

		    <label>Manzana</label>
		    <input type="number" id="txtManzana" name="txtManzana" value="<?php echo $domicilio->getManzana(); ?>">
		    <br><br>

		    <label>Descripcion</label>
		    <input type="text" id="txtDescripcion" name="txtDescripcion" value="<?php echo $domicilio->getDescripcion(); ?>">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>