<?php

require_once "../../clases/Perfil.php";
require_once "../../clases/Modulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

$listadoModulos = Modulo::obtenerTodos();

/*
highlight_string(var_export($listadoModulos,true));
exit;
*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Perfil</title>
</head>
<body>
<?php require_once '../../menu.php'; ?>
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idPerfil" value="<?php echo $perfil->getIdPerfil(); ?>">

	        <label>Descripcion:</label>
		    <input type="text" name="txtDescripcion" value="<?php echo $perfil->getDescripcion(); ?>">
		    <br><br>

			<label>Modulos:</label>
			<select name="cboModulos[]" multiple style="width: 250px; height: 250px;">
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

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>
</body>
</html>

</body>
</html>