<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");

session_start();

require_once "../../../clases/Pedido.php";
require_once "../../../clases/Usuario.php";
require_once "../../../clases/DetallePedido.php";

$idUsuario = $_POST['usuario'];
$idTipoEnvio = $_POST['tipoEnvio'];
$fechaEntrega = $_POST['fechaEntrega'];
$arrItems = $_POST['items'];
$fechaCreacion = $_POST['fechaCreacion'];
$total = $_POST['total'];

if (empty($idUsuario)) {
	$_SESSION['mensaje_error'] = "Debe ingresar para quien es el pedido";
	header("location: /grigri/modulos/pedidos/alta.php");
	exit;
}
if (empty($idTipoEnvio)) {
	$_SESSION['mensaje_error'] = "Debe ingresar el tipo de envio";
	header("location: /grigri/modulos/pedidos/alta.php");
	exit;
}
if (empty($fechaEntrega)) {
	$_SESSION['mensaje_error'] = "Debe ingresar la fecha de entrega";
	header("location: /grigri/modulos/pedidos/alta.php");
	exit;
}
if (empty($total)) {
	$_SESSION['mensaje_error'] = "No hay total";
	header("location: /grigri/modulos/pedidos/alta.php");
	exit;
}

if ($idTipoEnvio == 1) {
	$usuario = Usuario::obtenerPorId($idUsuario);
	$lugarEntrega = $usuario->domicilio;
} else {
	$lugarEntrega = "Retiro de local";
}
if (empty($fechaCreacion)) {
	$fechaCreacion = date('Y-m-d');
}

$pedido = new Pedido();
$pedido->setIdUsuario($idUsuario);
$pedido->setIdEnvio($idTipoEnvio);
$pedido->setFechaEntrega($fechaEntrega);
$pedido->setLugarEntrega($lugarEntrega);
$pedido->setFechaCreacion($fechaCreacion);
$pedido->setTotal($total);

$pedido->guardar();

foreach ($arrItems as $item) {
	$detallePedido = new DetallePedido();
	$detallePedido->setIdItem($item['id']);
	$detallePedido->setCantidad($item['cantidad']);
	$detallePedido->setIdPedido($pedido->getIdPedido());

	$detallePedido->guardar();
}

?>
