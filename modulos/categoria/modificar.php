<?php

require_once '../../clases/Categoria.php';

$id = $_GET['id'];

$categoria = Categoria::obtenerPorId($id);
//highlight_string(var_export($categoria,true));
//exit;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Categoria</title>
</head>
<body>
<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idCategoria" value="<?php echo $categoria->getIdCategoria(); ?>">

		    <label>Categoria</label>
		    <input type="text" name="txtCategoria" value="<?php echo $categoria; ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>

</body>
</html>