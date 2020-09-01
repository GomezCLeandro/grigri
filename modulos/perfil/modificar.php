<?php

require_once "../../clases/Perfil.php";
require_once "../../clases/Modulo.php";
require_once "../../clases/PerfilModulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

$listadoModulos = Modulo::obtenerTodos();

$listadoPerfilModulo = Modulo::obtenerModulosPorIdPerfil($id);

/*
highlight_string(var_export($listadoPerfilModulo,true));
echo $listadoPerfilModulo->modulo->getIdModulo();
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

			    <?php
			    
			    foreach ($listadoPerfilModulo as $listado) {
			    	echo $listado->getIdModulo()
			    	echo $perfil->getIdPerfil();
			    }
			    exit;
			    ?>


				<?php
				foreach ($listadoPerfilModulo as $modulos):
					$selected = '';
					if ($listadoModulos->getIdModulo() == $modulos->getIdModulo()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $modulos->getIdModulo(); ?>" <?php echo $selected; ?> >
					    <?php echo utf8_encode($modulos); ?>
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