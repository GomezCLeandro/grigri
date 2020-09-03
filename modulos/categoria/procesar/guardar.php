<?php

session_start();

require_once "../../../clases/Categoria.php";;

$nombreCategoria = $_POST['txtCategoria'];

if (empty(trim($nombreCategoria))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre para la CATEGORIA";
	header("location: /grigri/modulos/categoria/alta.php");
	exit;
}
if (strlen(trim($nombreCategoria)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: /grigri/modulos/categoria/alta.php");
	exit;
}

$categoria = new Categoria($nombreCategoria);

$categoria->guardar();

header("location: /grigri/modulos/categoria/listado.php");

?>
