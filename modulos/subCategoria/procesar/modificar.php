<?php

session_start();

require_once "../../../clases/SubCategoria.php";;

$nombreSubCategoria = $_POST['txtSubCategoria'];

$idCategoria = $_POST['idCategoria'];
$idSubCategoria = $_POST['idSubCategoria'];

if (empty(trim($nombreSubCategoria))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la descripcion";
	header("location: /grigri/modulos/subCategoria/modificar.php?id=$idSubCategoria");
	exit;
}
if (strlen(trim($nombreSubCategoria)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/subCategoria/modificar.php?id=$idSubCategoria");
	exit;
}
if (empty($idCategoria)) {
	$_SESSION['mensaje_error'] = "Debe seleccionar la categoria";
	header("location: /grigri/modulos/subCategoria/modificar.php?id=$idSubCategoria");
	exit;
}

$subCategoria = SubCategoria::obtenerPorId($idSubCategoria);
$subCategoria->setSubCategoria($nombreSubCategoria);
$subCategoria->setIdCategoria($idCategoria);

$subCategoria->actualizar();
header("location: /grigri/modulos/subcategoria/listado.php");

?>
