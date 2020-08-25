<?php

require_once '../../../clases/Perfil.php';
require_once '../../../clases/PerfilModulo.php';


$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

//highlight_string(var_export($modulos, true));
//exit;


$perfil = new Perfil($descripcion);
$perfil->guardar();


foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

//highlight_string(var_export($perfil, true));


?>