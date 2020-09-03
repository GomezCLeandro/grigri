<?php

require_once '../../clases/SubCategoria.php';
require_once '../../clases/Categoria.php';

$id = $_GET['id'];

$subCategoria = SubCategoria::obtenerPorId($id);
$listadoCategoria = Categoria::obtenerTodos();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Modificar Sub Categoria</title>

	<script type="text/javascript" src="../../js/validaciones/validacionSubCategoria.js"></script>

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

			<input type="hidden" name="idSubCategoria" value="<?php echo $subCategoria->getIdSubCategoria(); ?>">

		    <label>Sub Categoria</label>
		    <input type="text" id="txtSubCategoria" name="txtSubCategoria" value="<?php echo utf8_encode($subCategoria); ?>">
		    <br><br>

			<label>Categorias:</label>
			<select name="idCategoria" id="idCategoria">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoCategoria as $categoria):
					$selected = '';
					if ($subCategoria->getIdCategoria() == $categoria->getIdCategoria()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $categoria->getIdCategoria(); ?>" <?php echo $selected; ?> >
					    <?php echo $categoria; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>

</body>
</html>