<?php

session_start();

require_once "../../../clases/Recurso.php";;

$idRecurso = $_POST['idRecurso'];
$nombreRecurso = $_POST['txtRecurso'];

if (empty(trim($nombreRecurso))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre";
	header("location: /grigri/modulos/recurso/modificar.php?id=$idRecurso");
	exit;
}
if (strlen(trim($nombreRecurso)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: /grigri/modulos/recurso/modificar.php?id=$idRecurso");
	exit;
}

$recurso = Recurso::obtenerPorId($idRecurso);
$recurso->setDescripcion($nombreRecurso);

$recurso->actualizar();

header("location: /grigri/modulos/recurso/listado.php?id=$idRecurso");

?>