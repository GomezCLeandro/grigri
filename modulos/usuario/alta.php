<?php

require_once '../../clases/TipoDocumento.php';

$listadoTipoDocumento = TipoDocumento::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Usuario y Persona</title>

	<script type="text/javascript" src="../../js/validaciones/validacionUsuario.js"></script>

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

		    <label>Username</label>
		    <input type="text" id="txtUsername" name="txtUsername">
		    <br><br>

		    <label>Password</label>
		    <input type="password" id="txtPassword" name="txtPassword">
		    <br><br>

		    <label>Nombre</label>
		    <input type="text" id="txtNombre" name="txtNombre">
		    <br><br>

		    <label>Apellido</label>
		    <input type="text" id="txtApellido" name="txtApellido">
		    <br><br>

		    <label>Sexo</label>
		    <input type="text" id="txtSexo" name="txtSexo">
		    <br><br>

			<label>Tipo Documento: </label>
			<select name="cboTipoDocumento" id="cboTipoDocumento">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoTipoDocumento as $tipoDocumento): ?>

					<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>">
					    <?php echo $tipoDocumento; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

		    <label>Numero de documento </label>
		    <input type="text" id="txtNumeroDocumento" name="txtNumeroDocumento">
		    <br><br>

		    <label>Fecha de nacimiento</label>
		    <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">

		</form>

</div>
</body>
</html>