<?php

require_once "../../../clases/Contacto.php";;

$idLlamada = $_POST['idLlamada'];

$valor = $_POST['txtContacto'];
$idPersona = $_POST['idPersona'];
$idTipoContacto = $_POST['cboTipoContacto'];

if (empty(trim($valor))) {
	echo "ERROR CAMPO DISEÑO VACIO";
	exit;
}
if (empty(trim($idTipoContacto))) {
	echo "ERROR CAMPO PRECIO VACIO";
	exit;
}


$contacto = new Contacto();
$contacto->setValor($valor);
$contacto->setTipoContacto($idTipoContacto);
$contacto->setIdPersona($idPersona);

$contacto->guardar();

header("location: /grigri/modulos/usuario/detalle.php?id=$idLlamada");
?>