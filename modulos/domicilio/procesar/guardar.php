<?php

session_start();

require_once "../../../clases/Domicilio.php";;

$idLlamada = $_POST['idLlamada'];
$idPersona = $_POST['idPersona'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$casa = $_POST['txtCasa'];
$manzana = $_POST['txtManzana'];
$descripcion = $_POST['txtDescripcion'];
$barrio = $_POST['cboBarrio'];

if ($barrio == 0) {
	$_SESSION['mensaje_error'] = "Debe selecionar un barrio";
	header("location: /grigri/modulos/domicilio/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if (empty(trim($calle))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la calle";
	header("location: /grigri/modulos/domicilio/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if (strlen(trim($calle)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una calle";
	header("location: /grigri/modulos/domicilio/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if ($altura < 1) {
	$_SESSION['mensaje_error'] = "Altura muy baja";
	header("location: /grigri/modulos/domicilio/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if ($casa < 1 ) {
	$_SESSION['mensaje_error'] = "Casa muy caja";
	header("location: /grigri/modulos/domicilio/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if ($manzana < 1 ) {
	$_SESSION['mensaje_error'] = "Manzana muy baja";
	header("location: /grigri/modulos/domicilio/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if (empty(trim($descripcion))) {
	$descripcion = "sin descripcion";
}
if (strlen(trim($descripcion)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/domicilio/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}

$domicilio = new Domicilio();
$domicilio->setIdBarrio($barrio);
$domicilio->setIdPersona($idPersona);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setCasa($casa);
$domicilio->setManzana($manzana);
$domicilio->setDescripcion($descripcion);

$domicilio->guardar();

header("location: /grigri/modulos/usuario/detalle.php?id=$idLlamada");

?>
