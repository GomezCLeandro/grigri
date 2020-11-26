<?php

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";

?>

<!DOCTYPE html>
<html>
<head>

    <title>Top 4 de lo mas vendido</title>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
                <div class="row m-t-30">
                    <!-- USER DATA-->
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="fa fa-clipboard"></i>Top 4 de lo mas vendido</h3>
                        <div class="filters m-b-45">

                            <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="filtar()">
                                    <i class="zmdi zmdi-filter-list"></i>Filtrar</button>
                            </div>
<!--
                            <label class="switch switch-3d switch-secondary mr-3">
                                                                
                                <input type="checkbox" class="switch-input" checked="true">
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                Traer Todos

                            </label>
-->

                            <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                <select class="js-select2" id="traerTodos">
                                    <option value="1">Por fecha</option>
                                    <option selected="selected" value="2">Traer Todos</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>

                            <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                <select class="js-select2" id="filtro">
                                    <option selected="selected" value="1">Diseños</option>
                                    <option value="2">Servicios</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>

                            <input type="month" id="mesElegido" name="mesElegido" value="<?php echo date('Y-m') ?>">

                        </div>
                        <div class="table-responsive table-data">
                            <table class="table" id="tabla_diseño">
                                <tbody>
                                    <tr>

                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END USER DATA-->
                </div>
            </div>
        </div>
    </div>

<script>
    
    $.ajax({
        type: 'GET',
        url : 'obtenerTop4MasVendido.php',
        data: {},

        success: function(data){

            var datosDisenio = JSON.parse(data);

            for (var x=0; datosDisenio[x] ; x+=1) {

                //console.log(datosDisenio[x]);

                let disenio = []; //disenio del detalle

                disenio['descripcion'] = datosDisenio[x].descripcion;
                disenio['cantidad'] = datosDisenio[x].cantidad;
                //console.log(disenio);
                
                //detallePedido.push(disenio); //armando detalle para el envio
                //console.log(detallePedido);

                $('#tabla_diseño tr:last').after('<tr><td>' + disenio.descripcion + '</td><td>' + disenio.cantidad + '</td><td>');

            }
        }
    })

    function filtar() {

        console.log($('#mesElegido').val());
        console.log('Servicios o disenio');
        console.log($('#filtro').val());
        console.log('traerTodos o no');
        console.log($('#traerTodos').val());

        $("#tabla_diseño td").remove();
        
        $.ajax({
            type: 'GET',
            url : 'filtroMasVendido.php',
            data: {
                'mes': $('#mesElegido').val(),
                'filtro': $('#filtro').val(),
                'traerTodos': $('#traerTodos').val()
            },

            success: function(data){

                var datosDisenio = JSON.parse(data);
                
                for (var x=0; datosDisenio[x] ; x+=1) {

                    //console.log(datosDisenio[x]);

                    let disenio = [] //disenio del detalle

                    disenio['descripcion'] = datosDisenio[x].descripcion;
                    disenio['cantidad'] = datosDisenio[x].cantidad;
                    console.log(disenio);
                    
                    //detallePedido.push(disenio); //armando detalle para el envio
                    //console.log(detallePedido);

                    $('#tabla_diseño tr:last').after('<tr><td>' + disenio.descripcion + '</td><td>' + disenio.cantidad + '</td><td>');

                }
            }
        })
    }

</script>

</body>
</html>