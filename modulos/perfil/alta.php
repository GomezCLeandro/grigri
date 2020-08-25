<?php

require_once "../../clases/Modulo.php";

$listadoModulos = Modulo::obtenerTodos();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Alta de Perfil</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

	<h4>Alta de Perfil</h4>
	<br>

		<form name="frmDatos" method="POST" action="procesar/guardar.php">

	        <label>Descripcion:</label>
		    <input type="text" name="txtDescripcion">
		    <br><br>

		    <select name="cboModulos[]" multiple style="width: 250px; height: 250px;">

		         <?php foreach ($listadoModulos as $modulo) :?>

		         	<option value="<?php echo $modulo->getIdModulo(); ?>">
		         		<?php echo utf8_encode($modulo); ?>
		         	</option>

		         <?php endforeach ?>

		    </select>
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</body>
</html>