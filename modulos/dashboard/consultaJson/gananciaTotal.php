<?php 

require_once '../../../clases/MySQL.php';

$sql = "SELECT SUM(detallepedido.cantidad * item.precio) AS ganancia FROM pedido"
	. " INNER JOIN detallepedido ON detallepedido.id_pedido = pedido.id_pedido"
	. " INNER JOIN item ON item.id_item = detallepedido.id_item";

$mysql = new MySQL();

$gananciaTotal = $mysql->consulta($sql);

$mysql->desconectar();

$listado = array();

if ($gananciaTotal->num_rows > 0){
    while($r = mysqli_fetch_assoc($gananciaTotal)) {
        $listado[] = $r;
    }
} else {
    $listado[] = $gananciaTotal;
}

echo json_encode($listado);

?>