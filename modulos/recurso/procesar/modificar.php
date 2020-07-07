<?php

require_once "../../../clases/Recurso.php";;

$idRecurso = $_POST['idRecurso'];
$nombreRecurso = $_POST['txtRecurso'];

if (empty(trim($nombreRecurso))) {
	echo "ERROR CAMPO RECRUSO VACIO";
	exit;
}

$recurso = Recurso::obtenerPorId($idRecurso);
$recurso->setDescripcion($nombreRecurso);

$recurso->actualizar($idRecurso);

header("location: /grigri/modulos/recurso/listado.php?id=$idRecurso");

?>