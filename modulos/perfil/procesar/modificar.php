<?php

require_once '../../../clases/Perfil.php';
require_once '../../../clases/PerfilModulo.php';

$idPerfil = $_POST['idPerfil'];
$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->setDescripcion($descripcion);

PerfilModulo::resetModulos($idPerfil);

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($idPerfil);
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->actualizar($idPerfil);
}

header("location: /grigri/modulos/perfil/listado.php");

?>