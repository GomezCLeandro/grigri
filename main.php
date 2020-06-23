<?php

require_once "clases/Persona.php";
require_once "clases/Usuario.php";
require_once "clases/Barrio.php";
require_once "clases/Contacto.php";

$usuario =new Usuario('lean','lean');
$usuario->obtenerPorId(1);

?>