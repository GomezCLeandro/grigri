<?php

require_once '../../../clases/Perfil.php';
require_once '../../../clases/PerfilModulo.php';


$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

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