<?php

require_once '../../clases/Categoria.php';

$id = $_GET['id'];

$categoria = Categoria::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Categoria</title>

	<script type="text/javascript" src="../../js/validaciones/validacionCategoria.js"></script>

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

		<input type="hidden" name="idCategoria" value="<?php echo $categoria->getIdCategoria(); ?>">

	    <label>Categoria</label>
	    <input type="text" name="txtCategoria" id="txtCategoria" value="<?php echo $categoria; ?>">
	    <br><br>

	    <input type="button" value="Guardar" onclick="validarDatos()">			

	</form>

	</div>
</body>
</html>

</body>
</html>