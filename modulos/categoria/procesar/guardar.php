<?php

require_once "../../../clases/Categoria.php";;

$nombreCategoria = $_POST['txtCategoria'];

if (empty(trim($nombreCategoria))) {
	$_SESSIONERROR['mensaje_error'] = "Debe ingresar un nombre para la CATEGORIA" ;
	header("location: /grigri/modulos/categoria/alta.php");
	exit;
}

$categoria = new Categoria($nombreCategoria);

$categoria->guardar();

header("location: /grigri/modulos/categoria/listado.php");

?>
