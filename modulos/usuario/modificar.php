<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/TipoDocumento.php";

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();

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

			<input type="hidden" name="txtId" value="<?php echo $user->getIdUsuario(); ?>">

		    <label>Username</label>
		    <input type="text" name="txtUsername" value="<?php echo $user->getUsername(); ?>">
		    <br><br>

		    <label>Nombre</label>
		    <input type="text" name="txtNombre" value="<?php echo $user->getNombre(); ?>">
		    <br><br>

		    <label>Apellido</label>
		    <input type="text" name="txtApellido" value="<?php echo $user->getApellido(); ?>">
		    <br><br>

		    <label>Sexo</label>
		    <input type="text" name="txtSexo" value="<?php echo $user->getSexo(); ?>">
		    <br><br>

			<label>Tipo Documento: </label>
			<select name="cboTipoDocumento">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoTipoDocumento as $tipoDocumento):
					$selected = '';
					if ($user->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
						$selected = "SELECTED";
					}
				?>

					<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>" <?php echo $selected; ?>>
					    <?php echo $tipoDocumento; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

		    <label>Numero de documento</label>
		    <input type="text" name="txtNumeroDocumento" value="<?php echo $user->getNumeroDocumento(); ?>">
		    <br><br>

		    <label>Fecha de nacimiento</label>
		    <input type="date" name="txtFechaNacimiento" value="<?php echo $user->getFechaNacimiento(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>