<?php

require_once "../../clases/Reserva.php";

$reserva = Reserva::obtenerFecha();

//print json_encode($reserva);

$eventos = [];
$i = 0;

foreach ($reserva as $fecha) {
	$eventos[$i]['title'] = $fecha->getTitulo();
	$eventos[$i]['start'] = $fecha->getFechaReserva();
	$i += 1;
}

print json_encode($eventos);

?>