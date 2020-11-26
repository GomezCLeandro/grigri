<?php 

require_once '../../clases/MySQL.php';

$mes = $_GET['mes'];
$filtro = $_GET['filtro'];
$traerTodo = $_GET['traerTodos'];

$mes = substr($mes, -2);

if ($filtro == 1) {
	$sql = "SELECT item.descripcion, SUM(detallepedido.cantidad) AS cantidad FROM pedido"
	    . " INNER JOIN detallepedido ON detallepedido.id_pedido = pedido.id_pedido"
	    . " INNER JOIN item ON item.id_item = detallepedido.id_item"
	    . " WHERE MONTH(pedido.fecha_creacion) = '$mes'"
	    . " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";
} elseif ($filtro == 2) {
	$sql = "SELECT item.descripcion, COUNT(reserva.id_servicio) AS cantidad FROM servicio"
		. " INNER JOIN item ON item.id_item = servicio.id_item"
		. " INNER JOIN reserva ON reserva.id_servicio = servicio.id_servicio"
		. " WHERE MONTH(reserva.fecha_reserva) = '$mes'"
		. " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";
}

if ($traerTodo == 2) {
	if ($filtro == 1) {
		$sql = "SELECT item.descripcion, SUM(detallepedido.cantidad) AS cantidad FROM pedido"
		    . " INNER JOIN detallepedido ON detallepedido.id_pedido = pedido.id_pedido"
		    . " INNER JOIN item ON item.id_item = detallepedido.id_item"
		    . " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";
	} elseif ($filtro == 2) {
		$sql = "SELECT item.descripcion, COUNT(reserva.id_servicio) AS cantidad FROM servicio"
			. " INNER JOIN item ON item.id_item = servicio.id_item"
			. " INNER JOIN reserva ON reserva.id_servicio = servicio.id_servicio"
			. " GROUP BY item.descripcion ORDER BY cantidad DESC LIMIT 4";
	}
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