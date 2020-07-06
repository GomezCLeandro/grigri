<?php

require_once "../../../clases/Domicilio.php";;

$idPersona = $_POST['idPersona'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$casa = $_POST['txtCasa'];
$manzana = $_POST['txtManzana'];
$descripcion = $_POST['txtDescripcion'];
$barrio = $_POST['cboBarrio'];

if (empty(trim($calle))) {
	echo "ERROR CAMPO CALLE VACIO";
	exit;
}
if (empty(trim($altura))) {
	echo "ERROR CAMPO ALTURA VACIO";
	exit;
}
if (empty(trim($casa))) {
	echo "ERROR CAMPO CASA VACIO";
	exit;
}
if (empty(trim($manzana))) {
	echo "ERROR CAMPO MANZANA VACIO";
	exit;
}
if (empty(trim($barrio))) {
	echo "ERROR BARRIO NO SELECIONADO";
	exit;
}
if (empty(trim($descripcion))) {
	$descripcion = 'Sin descripcion';
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

header("location: /grigri/modulos/usuario/detalle.php?id=$idPersona");

?>
