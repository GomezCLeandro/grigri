<?php

require_once "../../../clases/Disenio.php";;

$item = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];

if (empty(trim($item))) {
	echo "ERROR CAMPO DESCRIPCION VACIO";
	exit;
}
if (empty(trim($precio))) {
	echo "ERROR CAMPO PRECIO VACIO";
	exit;
}


$disenio = new Disenio($item);
$disenio->setDescripcion($item);
$disenio->setPrecio($precio);

$disenio->guardar();

header("location: /grigri/modulos/disenio/listado.php");

?>
