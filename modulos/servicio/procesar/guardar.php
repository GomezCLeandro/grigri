<?php

session_start();

require_once "../../../clases/Servicio.php";;

$item = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];

if (empty(trim($item))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la descripcion";
	header("location: /grigri/modulos/servicio/alta.php");
	exit;
}
if (strlen(trim($item)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/servicio/alta.php");
	exit;
}
if ($precio < 1) {
	$_SESSION['mensaje_error'] = "Precio muy bajo";
	header("location: /grigri/modulos/servicio/alta.php");
	exit;
}

$servicio = new Servicio($item);
$servicio->setDescripcion($item);
$servicio->setPrecio($precio);

//highlight_string(var_export($servicio,true));
//exit;
$servicio->guardar();

header("location: /grigri/modulos/servicio/listado.php");

?>
