<?php

require_once "../../clases/Contacto.php";

$idLlamada = $_GET['idLlamada'];

$idPersonaContacto = $_GET['id'];

Contacto::eliminar($idPersonaContacto);

header("location: /grigri/modulos/usuario/detalle.php?id=$idLlamada");
?>