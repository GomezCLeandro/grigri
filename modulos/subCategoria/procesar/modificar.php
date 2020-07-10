<?php

require_once "../../../clases/SubCategoria.php";;

$nombreSubCategoria = utf8_encode($_POST['txtSubCategoria']);

highlight_string(var_export($nombreSubCategoria,true));
exit;

$idCategoria = $_POST['idCategoria'];
$idSubCategoria = $_POST['idSubCategoria'];

if (empty(trim($nombreSubCategoria))) {
	echo "ERROR CAMPO CATEGORIA VACIO";
	exit;
}

$subCategoria = SubCategoria::obtenerPorId($idSubCategoria);
$subCategoria->setSubCategoria($nombreSubCategoria);
$subCategoria->setIdCategoria($idCategoria);

/**/
$subCategoria->actualizar();
header("location: /grigri/modulos/subcategoria/listado.php");

?>
