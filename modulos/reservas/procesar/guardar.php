<?php

session_start();

require_once "../../../clases/Reserva.php";;

$idUsuario = $_POST['idUsuario'];
$idServicio = $_POST['idServicio'];
$fechaEntrega = $_POST['txtFechaReserva'];
$horaReserva = $_POST['txtHoraReserva'];
$lugarReserva = $_POST['txtLugarReserva'];
$notacion = $_POST['txtNotacion'];

if (empty(trim($idUsuario))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un usuario";
	header("location: /grigri/modulos/reservas/alta.php");
	exit;
}
if (empty(trim($idServicio))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un servicio";
	header("location: /grigri/modulos/reservas/alta.php");
	exit;
}
if (empty(trim($fechaEntrega))) {
	$_SESSION['mensaje_error'] = "Debe ingresar una fecha de entrega";
	header("location: /grigri/modulos/reservas/alta.php");
	exit;
}
if (empty(trim($lugarReserva))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un lugar de entrega";
	header("location: /grigri/modulos/reservas/alta.php");
	exit;
}

$reserva = new Reserva();

$reserva->setIdUsuario($idUsuario);
$reserva->setIdServicio($idServicio);
$reserva->setFechaReserva($fechaEntrega);
$reserva->setHoraReserva($horaReserva);
$reserva->setLugarReserva($lugarReserva);

/*
highlight_string(var_export($reserva,true));
exit;
*/

$reserva->guardar();

header("location: /grigri/modulos/reservas/listado.php");

?>
