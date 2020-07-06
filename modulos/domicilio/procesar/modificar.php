<?php

require_once "../../../clases/Domicilio.php";;

$idPersona = $_POST['idPersona'];
$idDomicilio = $_POST['idDomicilio'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$casa = $_POST['txtCasa'];
$manzana = $_POST['txtManzana'];
$descripcion = $_POST['txtDescripcion'];
$idBarrio = $_POST['idBarrio'];

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
if (empty(trim($idBarrio))) {
	echo "ERROR BARRIO NO SLECIONADO";
	exit;
}
if (empty(trim($descripcion))) {
	$descripcion = 'Sin descripcion';
}

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);
$domicilio->setIdBarrio($idBarrio);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setCasa($casa);
$domicilio->setManzana($manzana);
$domicilio->setDescripcion($descripcion);

/*highlight_string(var_export($domicilio,true));
exit;*/

$domicilio->actualizar($idDomicilio);

header("location: /grigri/modulos/usuario/detalle.php?id=$idPersona");

?>