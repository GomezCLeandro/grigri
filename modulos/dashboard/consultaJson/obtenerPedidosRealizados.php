<?php 

require_once '../../../clases/MySQL.php';

$sql = "SELECT count(*) AS cantidad FROM pedido WHERE id_estado_pedido = 6";

$mysql = new MySQL();

$arrPedidosRealizados = $mysql->consulta($sql);

$mysql->desconectar();

$listado = array();

if ($arrPedidosRealizados->num_rows > 0){
    while($r = mysqli_fetch_assoc($arrPedidosRealizados)) {
        $listado[] = $r;
    }
} else {
    $listado[] = $arrPedidosRealizados;
}

echo json_encode($listado);

?>