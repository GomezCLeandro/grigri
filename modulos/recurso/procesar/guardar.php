<?php

session_start();

require_once "../../../clases/Recurso.php";;

$nombreRecurso = $_POST['txtRecurso'];

if (empty(trim($nombreRecurso))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre";
	header("location: /grigri/modulos/recurso/alta.php");
	exit;
}
if (strlen(trim($nombreRecurso)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: /grigri/modulos/recurso/alta.php");
	exit;
}

$recurso = new Recurso($nombreRecurso);

$recurso->guardar();

header("location: /grigri/modulos/recurso/listado.php");

?>
