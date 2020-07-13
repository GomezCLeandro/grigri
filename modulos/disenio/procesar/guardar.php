<?php

require_once "../../../clases/Disenio.php";;

$item = $_POST['txtDiseño'];
$precio = $_POST['txtPrecio'];

if (empty(trim($item))) {
	echo "ERROR CAMPO DISEÑO VACIO";
	exit;
}
if (empty(trim($precio))) {
	echo "ERROR CAMPO PRECIO VACIO";
	exit;
}


$disenio = new Disenio($item);
$disenio->setIdDisenio($item);
$disenio->setPrecio($precio);


$disenio->guardar();

header("location: /grigri/modulos/disenio/listado.php");

?>
