<?php

require_once '../../clases/Categoria.php';

$listadoCategoria = Categoria::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Sub Categoria</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/guardar.php">

		    <label>Nombre del Sub Categoria</label>
		    <input type="text" name="txtSubCategoria">
		    <br><br>

			<label>Categorias:</label>
			<select name="idCategoria">
			    <option value="0">Seleccionar</option>

				<?php foreach ($listadoCategoria as $categoria): ?>

					<option value="<?php echo $categoria->getIdCategoria(); ?>">
					    <?php echo $categoria; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</div>
</body>
</html>