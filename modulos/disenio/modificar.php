<?php

require_once '../../clases/Disenio.php';
require_once '../../clases/Recurso.php';


$id = $_GET['id'];

$disenio = Disenio::obtenerPorId($id);

$listadoRecurso = Recurso::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Diseño</title>

	<script type="text/javascript" src="../../js/validaciones/validacionItem.js"></script>
	
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

			<input type="hidden" name="idDisenio" value="<?php echo $disenio->getIdDisenio(); ?>">

		    <label>Diseño</label>
		    <input type="text" id="txtDescripcion" name="txtDescripcion" value="<?php echo $disenio->getDescripcion(); ?>">
		    <br><br>

		    <label>precio</label>
		    <input type="number" id="txtPrecio" name="txtPrecio" value="<?php echo $disenio->getPrecio(); ?>">
		    <br><br>

			<label>Recursos:</label>
			<select name="cboRecurso[]" id="cboRecurso" multiple style="width: 250px; height: 250px;">
			    <option value="0">Seleccionar</option>

                	<?php foreach ($listadoRecurso as $recurso): ?>
                		
                        <?php 
                        $selected = '';
                        $idDisenio = $disenio->getIdDisenio();

                        if ($recurso->tieneRecurso($idDisenio)) {
                    	    $selected = "SELECTED";
                        }
                        ?>

                        <option value="<?php echo $recurso->getIdRecurso(); ?>" <?php echo $selected ?> >

                        <?php echo utf8_encode($recurso); ?>

                        </option>

                    <?php endforeach  ?>

			</select>
			<br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">			

		</form>

</div>
</body>
</html>

</body>
</html>