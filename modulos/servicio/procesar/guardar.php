<?php

require_once "../../../clases/Servicio.php";;

$item = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];

if (empty(trim($item))) {
	echo "ERROR CAMPO SERVICIO VACIO";
	exit;
}
if (empty(trim($precio))) {
	echo "ERROR CAMPO PRECIO VACIO";
	exit;
}

$servicio = new Servicio($item);
$servicio->setDescripcion($item);
$servicio->setPrecio($precio);

$servicio->guardar();

header("location: /grigri/modulos/servicio/listado.php");

?>
