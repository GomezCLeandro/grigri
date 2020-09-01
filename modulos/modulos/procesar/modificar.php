<?php

require_once "../../../clases/Modulo.php";;

$id = $_POST['idModulo'];
$nombre = $_POST['txtModulo'];

$nombre = strtolower($nombre);

$directorio = $nombre;

$nombre = ucfirst($nombre);

if (empty(trim($nombre))) {
	echo "ERROR CAMPO NOMBRE VACIO";
	exit;
}

$modulo = Modulo::obtenerPorId($id);
$modulo->setNombre($nombre);
$modulo->setDirectorio($directorio);

$modulo->actualizar();

header("location: /grigri/modulos/modulos/listado.php");

?>
