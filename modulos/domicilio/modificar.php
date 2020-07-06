<?php

require_once "../../clases/Domicilio.php";

$idPersona = $_GET['idPersona'];

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);
$arrBarrios = $domicilio->barrio->obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idPersona" value="<?php echo $domicilio->getIdPersona(); ?>">
			<input type="hidden" name="idDomicilio" value="<?php echo $domicilio->getIdDomicilio(); ?>">

		    <label>Calle</label>
		    <input type="text" name="txtCalle" value="<?php echo $domicilio->getCalle(); ?>">
		    <br><br>

		    <label>Altura</label>
		    <input type="number" name="txtAltura" value="<?php echo $domicilio->getAltura(); ?>">
		    <br><br>

		    <label>Casa</label>
		    <input type="number" name="txtCasa" value="<?php echo $domicilio->getCasa(); ?>">
		    <br><br>

		    <label>Manzana</label>
		    <input type="number" name="txtManzana" value="<?php echo $domicilio->getManzana(); ?>">
		    <br><br>

		    <label>Descripcion</label>
		    <input type="text" name="txtDescripcion" value="<?php echo $domicilio->getDescripcion(); ?>">
		    <br><br>

			<label>Barrio:</label>
			<select name="idBarrio">
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

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>