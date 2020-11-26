<?php

session_start();

require_once "../../../clases/Reserva.php";;

$idReserva = $_POST['idReserva'];
$fechaReserva = $_POST['txtFechaReserva'];
$horaReserva = $_POST['txtHoraReserva'];
$lugarReserva = $_POST['txtLugarReserva'];
$idServicio = $_POST['idServicio'];
$idUsuario = $_POST['idUsuario'];
$estadoReserva = $_POST['idEstadoReserva'];
$notacion = $_POST['txtNotacion'];

if (empty(trim($fechaReserva))) {
	$_SESSION['mensaje_error'] = "Debe ingresar una fecha";
	header("location: /grigri/modulos/reservas/modificar.php?id=$idReserva");
	exit;
}
if (empty(trim($lugarReserva))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un nombre";
	header("location: /grigri/modulos/reservas/modificar.php?id=$idReserva");
	exit;
}
if (strlen(trim($lugarReserva)) < 5) {
	$_SESSION['mensaje_error'] = "Pocos caracteres";
	header("location: /grigri/modulos/reservas/modificar.php?id=$idReserva");
	exit;
}
if (empty(trim($idServicio))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un servicio";
	header("location: /grigri/modulos/reservas/modificar.php?id=$idReserva");
	exit;
}
if (empty(trim($idUsuario))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un usuario";
	header("location: /grigri/modulos/reservas/modificar.php?id=$idReserva");
	exit;
}
if (empty(trim($estadoReserva))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un estado";
	header("location: /grigri/modulos/reservas/modificar.php?id=$idReserva");
	exit;
}

$reserva = Reserva::obtenerPorId($idReserva);
$reserva->setFechaReserva($fechaReserva);
$reserva->setLugarReserva($lugarReserva);
$reserva->setHoraReserva($horaReserva);
$reserva->setIdEstadoReserva($estadoReserva);
$reserva->setnotacion($notacion);
$reserva->setIdUsuario($idUsuario);
$reserva->setIdServicio($idServicio);

$reserva->actualizar($idReserva);

header("location: /grigri/modulos/reservas/listado.php");

?>