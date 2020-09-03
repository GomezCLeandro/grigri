<?php

session_start();

require_once "../../../clases/Contacto.php";;

$idLlamada = $_POST['idLlamada'];

$valor = $_POST['txtContacto'];
$idPersona = $_POST['idPersona'];
$idTipoContacto = $_POST['cboTipoContacto'];

if (empty(trim($valor))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el CONTACTO";
	header("location: /grigri/modulos/contacto/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if (strlen(trim($valor)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para ser un CONTACTO";
	header("location: /grigri/modulos/contacto/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}
if ($idTipoContacto == 0) {
	$_SESSION['mensaje_error'] = "Debe seleccionar algun TIPO de CONTACTO";
	header("location: /grigri/modulos/contacto/alta.php?idPersona=$idPersona&idLlamada=$idLlamada");
	exit;
}

$contacto = new Contacto();
$contacto->setValor($valor);
$contacto->setTipoContacto($idTipoContacto);
$contacto->setIdPersona($idPersona);

$contacto->guardar();

header("location: /grigri/modulos/usuario/detalle.php?id=$idLlamada");
?>