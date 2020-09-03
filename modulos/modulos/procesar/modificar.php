<?php

session_start();

require_once "../../../clases/Modulo.php";;

$id = $_POST['idModulo'];
$nombre = $_POST['txtModulo'];

$nombre = strtolower($nombre);

$directorio = $nombre;

$nombre = ucfirst($nombre);

if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre";
	header("location: /grigri/modulos/modulos/modificar.php?id=$id");
	exit;
}
if (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: /grigri/modulos/modulos/modificar.php&id=$id");
	exit;
}

$modulo = Modulo::obtenerPorId($id);
$modulo->setNombre($nombre);
$modulo->setDirectorio($directorio);

$modulo->actualizar();

header("location: /grigri/modulos/modulos/listado.php");

?>
