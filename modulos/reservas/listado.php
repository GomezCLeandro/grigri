<?php
/*
require_once "../../clases/Reserva.php";

$reserva = Reserva::obtenerTodos();

highlight_string(var_export($reserva,true));
exit;

*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Reserva</title>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
            <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                <i class="zmdi zmdi-plus"></i>Agregar de Reserva</a>
            </div>
            <br>                    
            <div class="container-fluid">
                <div class="row">
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                      <div class="au-card">

                                        <div id="calendar"></div>

                                      </div>
                                    </div><!-- .col -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<script>

    $('#calendar').fullCalendar({
        locale: 'es',
        height: 650,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
        events: '/grigri/modulos/reservas/eventos.php',
        eventClick: function(evento) {
            window.location.href = "modificar.php?id=" + evento._id;
        },

    });
/**/
</script>

</body>
</html>