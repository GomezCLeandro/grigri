<?php 

require_once '../../../clases/MySQL.php';

$sql = "SELECT COUNT(pedido.id_pedido) AS cantidadPedido FROM pedido";

$mysql = new MySQL();

$cantidad = $mysql->consulta($sql);

$mysql->desconectar();

$listado = array();

if ($cantidad->num_rows > 0){
    while($r = mysqli_fetch_assoc($cantidad)) {
        $listado[] = $r;
    }
} else {
    $listado[] = $cantidad;
}

echo json_encode($listado);

?>