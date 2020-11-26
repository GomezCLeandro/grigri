<?php

require_once "../../clases/Reserva.php";

$reserva = Reserva::obtenerTodos();

//echo json_encode($reserva);

$eventos = [];
$i = 0;

foreach ($reserva as $evento) {
	$eventos[$i]['_id'] = $evento->getIdReserva();
	$eventos[$i]['backgroundColor'] = '#DBB5FF';
	$eventos[$i]['title'] = $evento->getTitulo();
	$eventos[$i]['start'] = $evento->getFechaReserva(). 'T' .$evento->getHoraReserva();
	$eventos[$i]['end'] = $evento->getFechaReserva(). 'T' .$evento->getHoraReserva();
	//$eventos[$i]['allDay'] = false;
	$i += 1;
}

print json_encode($eventos);

?>