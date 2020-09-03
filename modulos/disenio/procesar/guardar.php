<?php

session_start();

require_once "../../../clases/Disenio.php";;

$item = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];

if (empty(trim($item))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la descripcion";
	header("location: /grigri/modulos/disenio/alta.php");
	exit;
}
if (strlen(trim($item)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/disenio/alta.php");
	exit;
}
if ($precio < 1) {
	$_SESSION['mensaje_error'] = "Precio muy bajo";
	header("location: /grigri/modulos/disenio/alta.php");
	exit;
}


$disenio = new Disenio($item);
$disenio->setDescripcion($item);
$disenio->setPrecio($precio);

$disenio->guardar();

header("location: /grigri/modulos/disenio/listado.php");

?>
