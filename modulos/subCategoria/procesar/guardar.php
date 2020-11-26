<?php

session_start();

require_once '../../../clases/SubCategoria.php';

$descripcion = $_POST['txtSubCategoria'];
$categoria = $_POST['idCategoria'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la descripcion";
	header("location: /grigri/modulos/subCategoria/alta.php");
	exit;
}
if (strlen(trim($descripcion)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/subCategoria/alta.php");
	exit;
}
if (empty($categoria || $categoria == 0)) {
	$_SESSION['mensaje_error'] = "Debe seleccionar categoria";
	header("location: /grigri/modulos/subCategoria/alta.php");
	exit;
}

$subCategoria = new SubCategoria($descripcion);

$subCategoria->setIdCategoria($categoria);
$subCategoria->guardar();


header("location: /grigri/modulos/subcategoria/listado.php");

?>