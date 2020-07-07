<?php

require_once "../../../clases/Categoria.php";;

$nombreCategoria = $_POST['txtCategoria'];

if (empty(trim($nombreCategoria))) {
	echo "ERROR CAMPO CATEGORIA VACIO";
	exit;
}

$categoria = new Categoria($nombreCategoria);

$categoria->guardar();

header("location: /grigri/modulos/categoria/listado.php");

?>
