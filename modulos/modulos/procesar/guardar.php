<?php

session_start();

require_once "../../../clases/Modulo.php";;

$nombre = $_POST['txtModulo'];

$nombre = strtolower($nombre);

$directorio = $nombre;

$nombre = ucfirst($nombre);

if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre";
	header("location: /grigri/modulos/modulos/alta.php");
	exit;
}
if (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: /grigri/modulos/modulos/alta.php");
	exit;
}

$modulo = new Modulo($nombre, $directorio);

/*
highlight_string(var_export($nombre,true));
highlight_string(var_export($directorio,true));
exit;
*/

$modulo->guardar();

header("location: /grigri/modulos/modulos/listado.php");

?>
