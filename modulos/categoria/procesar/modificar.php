<?php

session_start();

require_once "../../../clases/Categoria.php";;

$nombreCategoria = $_POST['txtCategoria'];
$idCategoria = $_POST['idCategoria'];

if (empty(trim($nombreCategoria))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre para la CATEGORIA";
	header("location: /grigri/modulos/categoria/modificar.php&id=$idCategoria");
	exit;
}
if (strlen(trim($nombreCategoria)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: /grigri/modulos/categoria/modificar.php&id=$idCategoria");
	exit;
}

$categoria = Categoria::obtenerPorId($idCategoria);
$categoria->setCategoria($nombreCategoria);
$categoria->actualizar();

header("location: /grigri/modulos/categoria/listado.php");

?>
