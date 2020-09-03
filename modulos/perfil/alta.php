<?php

require_once "../../clases/Modulo.php";

$listadoModulos = Modulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de Perfil</title>

	<script type="text/javascript" src="../../js/validaciones/validacionPerfil.js"></script>

</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<h4>Alta de Perfil</h4>
	<br>

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

		<form name="frmDatos" method="POST" action="procesar/guardar.php">

	        <label>Descripcion:</label>
		    <input type="text" id="txtDescripcion" name="txtDescripcion">
		    <br><br>

		    <select name="cboModulos[]" id="cboModulos" multiple style="width: 250px; height: 250px;">

		         <?php foreach ($listadoModulos as $modulo) :?>

		         	<option value="<?php echo $modulo->getIdModulo(); ?>">
		         		<?php echo utf8_encode($modulo); ?>
		         	</option>

		         <?php endforeach ?>

		    </select>
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">

		</form>

</body>
</html>