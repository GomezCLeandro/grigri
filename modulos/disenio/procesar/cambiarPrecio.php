<?php

require_once "../../../clases/MySQL.php";

$idItem = $_GET['idItem'];
$precio = $_GET['precio'];

$sql = "UPDATE item SET item.precio = (item.precio + '$precio') WHERE id_item = '$idItem'";

$mysql = new MySQL();

$precioCambiado = $mysql->consulta($sql);

$mysql->desconectar();

echo json_encode($precioCambiado);

?>