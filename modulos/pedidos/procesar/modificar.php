<?php

session_start();

require_once "../../../clases/Pedido.php";
require_once "../../../clases/DetallePedido.php";
require_once "../../../clases/Usuario.php";

$idPedido = $_POST['idPedido'];
$idDetallePedido = $_POST['idDetallePedido'];
$idUsuario = $_POST['idUsuario'];
$idTipoEnvio = $_POST['cboEnvio'];
$fechaEntrega = $_POST['txtFechaEntrega'];
$idEstado = $_POST['cboEstado'];
$idItem = $_POST['idItem'];
$cantidad = $_POST['txtCantidad'];
$fechaCreacion = $_POST['txtFechaCreacion'];

if (empty($idUsuario)) {
	$_SESSION['mensaje_error'] = "Debe ingresar para quien es el pedido";
	header("location: /grigri/modulos/pedidos/modificar.php?id=". $idPedido);
	exit;
}
if (empty($idTipoEnvio)) {
	$_SESSION['mensaje_error'] = "Debe ingresar el tipo de envio";
	header("location: /grigri/modulos/pedidos/modificar.php?id=". $idPedido);
	exit;
}
if (empty($fechaEntrega)) {
	$_SESSION['mensaje_error'] = "Debe ingresar la fecha de entrega";
	header("location: /grigri/modulos/pedidos/modificar.php?id=". $idPedido);
	exit;
}
if (empty($idEstado)) {
	$_SESSION['mensaje_error'] = "Debe seleccionar el estado";
	header("location: /grigri/modulos/pedidos/modificar.php?id=". $idPedido);
	exit;
}

if ($idTipoEnvio == 1) {
	$usuario = Usuario::obtenerPorId($idUsuario);
	$lugarEntrega = $usuario->domicilio;
} else {
	$lugarEntrega = "Retiro de local";
}

$pedido = Pedido::obtenerPorId($idPedido);
$pedido->setIdUsuario($idUsuario);
$pedido->setIdEnvio($idTipoEnvio);
$pedido->setIdEstadoPedido($idEstado);
$pedido->setFechaEntrega($fechaEntrega);
$pedido->setFechaCreacion($fechaCreacion);
$pedido->setLugarEntrega($lugarEntrega);

$pedido->actualizar($idPedido);

$detallePedido = DetallePedido::obtenerPorId($idDetallePedido);
$detallePedido->setIdPedido($idPedido);
$detallePedido->setIdItem($idItem);
$detallePedido->setCantidad($cantidad);

$detallePedido->actualizar($idDetallePedido);

header("location: /grigri/modulos/pedidos/listado.php");

?>
