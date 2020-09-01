<?php

require_once "../../../clases/Modulo.php";;

$nombre = $_POST['txtModulo'];

$nombre = strtolower($nombre);

$directorio = $nombre;

$nombre = ucfirst($nombre);

if (empty(trim($nombre))) {
	echo "ERROR CAMPO NOMBRE VACIO";
	exit;
}

$modulo = new Modulo($nombre, $directorio);


highlight_string(var_export($nombre,true));
highlight_string(var_export($directorio,true));
exit;
/**/

$modulo->guardar();

header("location: /grigri/modulos/modulos/listado.php");

?>
