<?php

require_once "../../../clases/Categoria.php";;

$nombreCategoria = $_POST['txtCategoria'];
$idCategoria = $_POST['idCategoria'];

if (empty(trim($nombreCategoria))) {
	echo "ERROR CAMPO CATEGORIA VACIO";
	exit;
}

$categoria = Categoria::obtenerPorId($idCategoria);
$categoria->setCategoria($nombreCategoria);
$categoria->actualizar();

header("location: /grigri/modulos/categoria/listado.php");

?>
