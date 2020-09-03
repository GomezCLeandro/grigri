<?php

require_once '../../clases/Recurso.php';

$id = $_GET['id'];

$recurso = Recurso::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Recurso</title>

	<script type="text/javascript" src="../../js/validaciones/validacionRecursos.js"></script>

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

			<input type="hidden" name="idRecurso" value="<?php echo $recurso->getIdRecurso(); ?>">

		    <label>Recurso</label>
		    <input type="text" id="txtRecurso" name="txtRecurso" value="<?php echo $recurso; ?>">
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>

</body>
</html>