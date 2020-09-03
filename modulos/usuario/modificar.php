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
	<title>Modificar Usuario</title>

	<script type="text/javascript" src="../../js/validaciones/validacionUsuario2.js"></script>

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

			<input type="hidden" name="txtId" value="<?php echo $user->getIdUsuario(); ?>">

		    <label>Username</label>
		    <input type="text" id="txtUsername" name="txtUsername" value="<?php echo $user->getUsername(); ?>">
		    <br><br>

		    <label>Nombre</label>
		    <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $user->getNombre(); ?>">
		    <br><br>

		    <label>Apellido</label>
		    <input type="text" id="txtApellido" name="txtApellido" value="<?php echo $user->getApellido(); ?>">
		    <br><br>

		    <label>Sexo</label>
		    <input type="text" id="txtSexo" name="txtSexo" value="<?php echo $user->getSexo(); ?>">
		    <br><br>

			<label>Tipo Documento: </label>
			<select name="cboTipoDocumento" id="cboTipoDocumento">
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
		    <input type="text" id="txtNumeroDocumento" name="txtNumeroDocumento" value="<?php echo $user->getNumeroDocumento(); ?>">
		    <br><br>

		    <label>Fecha de nacimiento</label>
		    <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" value="<?php echo $user->getFechaNacimiento(); ?>">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>