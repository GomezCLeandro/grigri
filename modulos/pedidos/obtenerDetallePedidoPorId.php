<?php 

require_once '../../clases/DetallePedido.php';

$id = $_GET["idPedido"];

$listadoDetalle = DetallePedido::obtenerPorIdPedido($id);

print json_encode($listadoDetalle);

?>