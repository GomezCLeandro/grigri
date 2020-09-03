<?php

require_once "../../../clases/Categoria.php";;

$nombreCategoria = $_POST['txtCategoria'];
$idCategoria = $_POST['idCategoria'];

if (empty(trim($nombreCategoria))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre para la CATEGORIA" ;
	header("location: alta.php");
	exit;
}

$categoria = Categoria::obtenerPorId($idCategoria);
$categoria->setCategoria($nombreCategoria);
$categoria->actualizar();

header("location: /grigri/modulos/categoria/listado.php");

?>
