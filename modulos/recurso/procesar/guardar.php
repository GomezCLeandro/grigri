<?php

require_once "../../../clases/Recurso.php";;

$nombreRecurso = $_POST['txtRecurso'];

if (empty(trim($nombreRecurso))) {
	echo "ERROR CAMPO RECURSO VACIO";
	exit;
}

$recurso = new Recurso($nombreRecurso);

$recurso->guardar();

header("location: /grigri/modulos/recurso/listado.php");

?>
