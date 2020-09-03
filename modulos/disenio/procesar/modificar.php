<?php

session_start();

require_once "../../../clases/Disenio.php";;

$idDisenio = $_POST['idDisenio'];
$item = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];

if (empty(trim($item))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la descripcion";
	header("location: /grigri/modulos/disenio/modificar.php?id=$idDisenio");
	exit;
}
if (strlen(trim($item)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/disenio/modificar.php?id=$idDisenio");
	exit;
}
if ($precio < 1) {
	$_SESSION['mensaje_error'] = "Precio muy bajo";
	header("location: /grigri/modulos/disenio/modificar.php?id=$idDisenio");
	exit;
}

$disenio = Disenio::obtenerPorId($idDisenio);
$disenio->setNombre($item);
$disenio->setPrecio($precio);

//$disenio->setIdDisenio($item);
//highlight_string(var_export($servicio,true));
//exit;

$disenio->actualizar();

header("location: /grigri/modulos/disenio/listado.php");

?>
