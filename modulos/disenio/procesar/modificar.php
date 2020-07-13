<?php

require_once "../../../clases/Disenio.php";;

$idDisenio = $_POST['idDisenio'];
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

$disenio = Disenio::obtenerPorId($idDisenio);
$disenio->setNombre($item);
//$disenio->setIdDisenio($item);
$disenio->setPrecio($precio);

//highlight_string(var_export($servicio,true));
//exit;

$disenio->actualizar();

header("location: /grigri/modulos/disenio/listado.php");

?>
