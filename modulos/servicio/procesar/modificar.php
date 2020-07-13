<?php

require_once "../../../clases/Servicio.php";;

$idServicio =$_POST['idServicio'];
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

$servicio = Servicio::obtenerPorId($idServicio);
$servicio->setNombre($item);
$servicio->setDescripcion($item);
$servicio->setPrecio($precio);

//highlight_string(var_export($servicio,true));
//exit;

$servicio->actualizar();

header("location: /grigri/modulos/servicio/listado.php");

?>
