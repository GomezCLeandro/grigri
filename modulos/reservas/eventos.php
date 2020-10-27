<?php

require_once "../../clases/Reserva.php";

$reserva = Reserva::obtenerTodos();

//print json_encode($reserva);

$eventos = [];
$i = 0;

foreach ($reserva as $evento) {
	$eventos[$i]['title'] = $evento->getTitulo();
	$eventos[$i]['start'] = $evento->getFechaReserva();
	$eventos[$i]['_id'] = $evento->getIdReserva();
	$i += 1;
}

print json_encode($eventos);

?>