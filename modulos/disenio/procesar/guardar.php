<?php

require_once "../../../clases/Disenio.php";;

$item = $_POST['txtDiseño'];

if (empty(trim($item))) {
	echo "ERROR CAMPO DISEÑO VACIO";
	exit;
}

$disenio = new Disenio($item);

$disenio->guardar();

header("location: /grigri/modulos/disenio/listado.php");

?>
