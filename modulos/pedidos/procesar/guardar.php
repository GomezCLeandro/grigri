<?php

session_start();

require_once "../../../clases/Pedido.php";
require_once "../../../clases/Usuario.php";
require_once "../../../clases/DetallePedido.php";

$idUsuario = $_POST['idUsuario'];
$idTipoEnvio = $_POST['idTipoEnvio'];
$fechaEntrega = $_POST['txtFechaEntrega'];
$idItem = $_POST['idItem'];
$cantidad = $_POST['txtCantidad'];
$fechaCreacion = $_POST['txtFechaCreacion'];


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

$pedido->guardar();

$detallePedido = new DetallePedido();
$detallePedido->setIdItem($idItem);
$detallePedido->setCantidad($cantidad);
$detallePedido->setIdPedido($pedido->getIdPedido());

$detallePedido->guardar();

header("location: /grigri/modulos/pedidos/listado.php");

?>
