<?php

require_once "../../clases/Perfil.php";
require_once "../../clases/Modulo.php";

$listadoModulos = Modulo::obtenerTodos();

$id = $_GET['id'];

$perfilModulos = Perfil::obtenerPorId($id);
$arrModulos = $perfilModulos->getModulos();
/*
highlight_string(var_export($arrModulos, true));
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

			<input type="hidden" name="idPerfil" value="<?php echo $perfilModulos->getIdPerfil(); ?>">

	        <label>Descripcion:</label>
		    <input type="text" name="txtDescripcion" value="<?php echo $perfilModulos->getDescripcion(); ?>">
		    <br><br>

		    <h7>
		    	Este perfil ya tiene acceso a:
		    	
		    	<?php foreach ($arrModulos as $modulos) :?>
		         	<?php echo utf8_encode($modulos); ?>
		        <?php endforeach ?>		        
		    </h7>

		    </select>
		    <br><br>
		    <select name="cboModulos[]" multiple style="width: 250px; height: 250px;">

		         <?php foreach ($listadoModulos as $modulo) :?>

		         	<option value="<?php echo $modulo->getIdModulo(); ?>">
		         		<?php echo utf8_encode($modulo); ?>
		         	</option>

		         <?php endforeach ?>

		    </select>
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>
</body>
</html>

</body>
</html>