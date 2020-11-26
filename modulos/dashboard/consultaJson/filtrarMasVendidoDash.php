<?php 

require_once '../../../clases/MySQL.php';

$item = $_GET['item'];

if ($item == 1) {
	$sql = "SELECT item.descripcion, SUM(detallepedido.cantidad) AS cantidad FROM pedido"
	    . " INNER JOIN detallepedido ON detallepedido.id_pedido = pedido.id_pedido"
	    . " INNER JOIN item ON item.id_item = detallepedido.id_item"
	    . " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";
} elseif ($item == 2) {
	$sql = "SELECT item.descripcion, COUNT(reserva.id_servicio) AS cantidad FROM servicio"
		. " INNER JOIN item ON item.id_item = servicio.id_item"
		. " INNER JOIN reserva ON reserva.id_servicio = servicio.id_servicio"
		. " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";
}

$mysql = new MySQL();

$arrDatosFiltrados = $mysql->consulta($sql);

$mysql->desconectar();

//$arrMasVendidos = Pedido::top4MasVendido();

//$arrMasVendidos->fetch_assoc();

$listado = array();

if ($arrDatosFiltrados->num_rows > 0){
    while($r = mysqli_fetch_assoc($arrDatosFiltrados)) {
        $listado[] = $r;
    }
} else {
    $listado[] = $arrDatosFiltrados;
}

echo json_encode($listado);

?>