<?php

session_start();

require_once "../../../clases/Domicilio.php";;

$idPersona = $_POST['idPersona'];
$idDomicilio = $_POST['idDomicilio'];
$idLlamada = $_POST['txtIdLlamada'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$casa = $_POST['txtCasa'];
$manzana = $_POST['txtManzana'];
$descripcion = $_POST['txtDescripcion'];
$idBarrio = $_POST['idBarrio'];

if ($idBarrio == 0) {
	$_SESSION['mensaje_error'] = "Debe selecionar un barrio";
	header("location: /grigri/modulos/domicilio/modificar.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if (empty(trim($calle))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la calle";
	header("location: /grigri/modulos/domicilio/modificar.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if (strlen(trim($calle)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una calle";
	header("location: /grigri/modulos/domicilio/modificar.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if ($altura < 1) {
	$_SESSION['mensaje_error'] = "Altura muy baja";
	header("location: /grigri/modulos/domicilio/modificar.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if ($casa < 1 ) {
	$_SESSION['mensaje_error'] = "Casa muy caja";
	header("location: /grigri/modulos/domicilio/modificar.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if ($manzana < 1 ) {
	$_SESSION['mensaje_error'] = "Manzana muy baja";
	header("location: /grigri/modulos/domicilio/modificar.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if (empty(trim($descripcion))) {
	$descripcion = "sin descripcion";
}
if (strlen(trim($descripcion)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/domicilio/modificar.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);
$domicilio->setIdBarrio($idBarrio);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setCasa($casa);
$domicilio->setManzana($manzana);
$domicilio->setDescripcion($descripcion);

$domicilio->actualizar($idDomicilio);

header("location: /grigri/modulos/usuario/detalle.php?id=$idLlamada");

?>