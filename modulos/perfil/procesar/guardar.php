<?php

session_start();

require_once '../../../clases/Perfil.php';
require_once '../../../clases/PerfilModulo.php';


$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la descripcion";
	header("location: /grigri/modulos/perfil/alta.php");
	exit;
}
if (strlen(trim($descripcion)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/perfil/alta.php");
	exit;
}
if (empty($listaModulos)) {
	$_SESSION['mensaje_error'] = "Debe seleccionar modulos";
	header("location: /grigri/modulos/perfil/alta.php");
	exit;
}

$perfil = new Perfil($descripcion);
$perfil->guardar();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

header("location: /grigri/modulos/perfil/listado.php");

?>