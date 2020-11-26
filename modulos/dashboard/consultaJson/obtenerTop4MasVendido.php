<?php 

require_once '../../../clases/MySQL.php';

$sql = "SELECT item.descripcion, SUM(detallepedido.cantidad) AS cantidad FROM pedido"
    . " INNER JOIN detallepedido ON detallepedido.id_pedido = pedido.id_pedido"
    . " INNER JOIN item ON item.id_item = detallepedido.id_item"
    . " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";

$mysql = new MySQL();

$arrMasVendidos = $mysql->consulta($sql);

$mysql->desconectar();

//$arrMasVendidos = Pedido::top4MasVendido();

//$arrMasVendidos->fetch_assoc();

$listado = array();

if ($arrMasVendidos->num_rows > 0){
    while($r = mysqli_fetch_assoc($arrMasVendidos)) {
        $listado[] = $r;
    }
} else {
    $listado[] = $arrMasVendidos;
}

echo json_encode($listado);

?>