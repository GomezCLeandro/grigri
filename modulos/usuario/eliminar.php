<?php

require_once '../../clases/Usuario.php';

$id = $_GET['id'];

Usuario::eliminar($id);

?>