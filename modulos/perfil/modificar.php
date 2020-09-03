<?php

require_once "../../clases/Perfil.php";
require_once "../../clases/Modulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

$listadoModulos = Modulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Perfil</title>

	<script type="text/javascript" src="../../js/validaciones/validacionPerfil.js"></script>
	
</head>
<body>

<?php require_once '../../menu.php'; ?>

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

			<input type="hidden" name="idPerfil" value="<?php echo $perfil->getIdPerfil(); ?>">

	        <label>Descripcion:</label>
		    <input type="text" id="txtDescripcion" name="txtDescripcion" value="<?php echo $perfil->getDescripcion(); ?>">
		    <br><br>

			<label>Modulos:</label>
			<select name="cboModulos[]" id="cboModulos" multiple style="width: 250px; height: 250px;">
			    <option value="0">Seleccionar</option>

                	<?php foreach ($listadoModulos as $modulo): ?>

                        <?php 

                        $selected = '';
                        $idModulo = $modulo->getIdModulo();

                        if ($perfil->tieneModulo($idModulo)) {
                    	    $selected = "SELECTED";
                        }

                        ?>

                        <option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected ?> >

                        <?php echo utf8_encode($modulo); ?>

                        </option>

                    <?php endforeach  ?>

			</select>
		    <br><br>

		    <input type="button" value="Guardar" onclick="validarDatos()">

		</form>
</body>
</html>

</body>
</html>