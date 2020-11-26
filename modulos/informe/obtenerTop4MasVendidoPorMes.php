<?php 

require_once '../../clases/MySQL.php';

$mes = $_GET['mes'];

$mes = substr($mes, -2);

$sql = "SELECT item.descripcion, SUM(detallepedido.cantidad) AS cantidad FROM pedido"
    . " INNER JOIN detallepedido ON detallepedido.id_pedido = pedido.id_pedido"
    . " INNER JOIN item ON item.id_item = detallepedido.id_item"
    . " WHERE MONTH(pedido.fecha_creacion) = '$mes'"
    . " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";

$mysql = new MySQL();

$arrMasVendidosPorFecha = $mysql->consulta($sql);

$mysql->desconectar();

//$arrMasVendidos = Pedido::top4MasVendido();

//$arrMasVendidos->fetch_assoc();

$listado = array();

if ($arrMasVendidosPorFecha->num_rows > 0){
    while($r = mysqli_fetch_assoc($arrMasVendidosPorFecha)) {
        $listado[] = $r;
    }
} else {
    $listado[] = $arrMasVendidosPorFecha;
}

echo json_encode($listado);

?>