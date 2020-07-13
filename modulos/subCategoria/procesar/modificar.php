<?php

require_once "../../../clases/SubCategoria.php";;

$nombreSubCategoria = $_POST['txtSubCategoria'];



$idCategoria = $_POST['idCategoria'];
$idSubCategoria = $_POST['idSubCategoria'];

if (empty(trim($nombreSubCategoria))) {
	echo "ERROR CAMPO CATEGORIA VACIO";
	exit;
}

$subCategoria = SubCategoria::obtenerPorId($idSubCategoria);
$subCategoria->setSubCategoria($nombreSubCategoria);
$subCategoria->setIdCategoria($idCategoria);

/*highlight_string(var_export($subCategoria,true));
exit;*/
$subCategoria->actualizar();
header("location: /grigri/modulos/subcategoria/listado.php");

?>
