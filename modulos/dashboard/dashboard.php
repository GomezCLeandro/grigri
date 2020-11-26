<?php

require_once "../../clases/MySQL.php";

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT factura.fecha, factura.numero, factura.tipo, "
            . "SUM(dp.cantidad * dp.precio) as total "
            . "FROM factura "
            . "INNER JOIN detallepedido as dp ON dp.id_pedido = factura.id_pedido "
            . "WHERE factura.fecha BETWEEN '$fechaDesde' AND '$fechaHasta' "
            . "GROUP BY factura.id_factura";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
    }
}

?>

<!DOCTYPE html>
<html>
<body>

    <?php require_once '../../menu.php'; ?>


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Dashboard</h2>
                        </div>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="tituloUsuario"></h2>
                                                <span>Usuarios registrados</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="tituloPedidosRealizados"></h2>
                                                <span>Pedidos Realizados</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="totalDelMes"></h2>
                                                <span>Ganancia del mes</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="total"></h2>
                                                <span>Ganancia Total</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STATISTIC CHART-->
                        <section class="statistic-chart">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="title-5 m-b-35">statistics</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <!-- CHART-->
                                        <div class="statistic-chart-1">
                                            <h3 class="title-3 m-b-30">chart</h3>
                                            <div class="chart-wrap">
                                                <canvas id="widgetChart5"></canvas>
                                            </div>
                                            <div class="statistic-chart-1-note">
                                                <span class="big">10,368</span>
                                                <span>/ 16220 items sold</span>
                                            </div>
                                        </div>
                                        <!-- END CHART-->
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <!-- TOP CAMPAIGN-->

                                        <div class="top-campaign">
                                            <h3 class="title-3 m-b-30">top Vendido</h3>
                                            <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                                <select class="js-select2" name="filtroItem" id="filtroItem">
                                                    <option value="1" selected="selected">Diseños</option>
                                                    <option  value="2">Servicios</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            
                                            <div class="table-responsive">
                                                <br>
                                                <table class="table table-top-campaign" id="tabla_dash">
                                                    <tbody>
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="filtar()">
                                                    <i class="zmdi zmdi-filter-list"></i>Filtrar</button>
                                            </div>
                                        </div>
                                        <!-- END TOP CAMPAIGN-->
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <!-- CHART PERCENT-->
                                        <div class="chart-percent-2">
                                            <h3 class="title-3 m-b-30">Ventas %</h3>
                                            <div class="chart-wrap">
                                                <canvas id="percent-chart2"></canvas>
                                                <div id="chartjs-tooltip">
                                                    <table></table>
                                                </div>
                                            </div>
                                            <div class="chart-info">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>Pedidos</span>
                                                </div>
                                                <div class="chart-note">
                                                    <span class="dot dot--red"></span>
                                                    <span>Servicios</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END CHART PERCENT-->
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END STATISTIC CHART-->

                        <div class="col-lg-6">
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                                    <button class="au-btn-plus">
                                        <i class="zmdi zmdi-plus"></i>
                                    </button>
                                </div>
                                <div class="au-inbox-wrap js-inbox-wrap">
                                    <div class="au-message js-list-load">
                                        <div class="au-message__noti">
                                            <p>You Have
                                                <span>2</span>

                                                new messages
                                            </p>
                                        </div>
                                        <div class="au-message-list">
                                            <div class="au-message__item unread">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap">
                                                            <div class="avatar">
                                                                <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">John Smith</h5>
                                                            <p>Have sent a photo</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>12 Min ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__item unread">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap online">
                                                            <div class="avatar">
                                                                <img src="images/icon/avatar-03.jpg" alt="Nicholas Martinez">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">Nicholas Martinez</h5>
                                                            <p>You are now connected on message</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>11:00 PM</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__item">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap online">
                                                            <div class="avatar">
                                                                <img src="images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">Michelle Sims</h5>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>Yesterday</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__item">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap">
                                                            <div class="avatar">
                                                                <img src="images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">Michelle Sims</h5>
                                                            <p>Purus feugiat finibus</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>Sunday</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__item js-load-item">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap online">
                                                            <div class="avatar">
                                                                <img src="images/icon/avatar-04.jpg" alt="Michelle Sims">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">Michelle Sims</h5>
                                                            <p>Lorem ipsum dolor sit amet</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>Yesterday</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="au-message__item js-load-item">
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap">
                                                            <div class="avatar">
                                                                <img src="images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">Michelle Sims</h5>
                                                            <p>Purus feugiat finibus</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>Sunday</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message__footer">
                                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                                        </div>
                                    </div>
                                    <div class="au-chat">
                                        <div class="au-chat__title">
                                            <div class="au-chat-info">
                                                <div class="avatar-wrap online">
                                                    <div class="avatar avatar--small">
                                                        <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                    </div>
                                                </div>
                                                <span class="nick">
                                                    <a href="#">John Smith</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="au-chat__content">
                                            <div class="recei-mess-wrap">
                                                <span class="mess-time">12 Min ago</span>
                                                <div class="recei-mess__inner">
                                                    <div class="avatar avatar--tiny">
                                                        <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                                    </div>
                                                    <div class="recei-mess-list">
                                                        <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                        <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="send-mess-wrap">
                                                <span class="mess-time">30 Sec ago</span>
                                                <div class="send-mess__inner">
                                                    <div class="send-mess-list">
                                                        <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-chat-textfield">
                                            <form class="au-form-icon">
                                                <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                                <button class="au-input-icon">
                                                    <i class="zmdi zmdi-camera"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                <div>
                                    <div >
                                        <div >
                                            <a href="../aumentoMasivo/aumentoMasivo.php">
                                                <input type="button" class="btn btn-info" value="Aumento masivo de Diseños">
                                            </a>
                                            <a href="../aumentoMasivo/aumentoMasivoDisenio.php">
                                                <input type="button"class="btn btn-info" value="Aumento masivo de Diseño por Sub Categoria">
                                            </a>
                                            <a href="../informe/DisenosMasVendido.php">
                                                <input type="button"class="btn btn-info" value="Informe">
                                            </a>
                                        </div>  
                                    </div>  
                                </div>
                            </section>
                        </form>
                        <br>
                        <?php if (!is_null($datos)): ?>
                            <table>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Factura Numero</th>
                                    <th>Tipo de Factura</th>
                                    <th>Total</th>
                                </tr>
                                <?php while($row = $datos->fetch_assoc()): ?>
                                    <tr>
                                    <td><?php echo $row['fecha'] ?></td>
                                    <td><?php echo $row['numero'] ?></td>
                                    <td><?php echo $row['tipo'] ?></td>
                                    <td>$<?php echo $row['total'] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </table>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

    $.ajax({
        type: 'GET',
        url : 'consultaJson/obtenerTop4MasVendido.php',
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

                $('#tabla_dash tr:last').after('<tr><td>' + disenio.descripcion + '</td><td>' + disenio.cantidad + '</td><td>');

            }
        }
    })

    function filtar() {

        $("#tabla_dash td").remove();

        //console.log($('#filtroItem').val());

        $.ajax({
            type: 'GET',
            url : 'consultaJson/filtrarMasVendidoDash.php',
            data: {
                'item': $('#filtroItem').val()
            },

            success: function(data){

                var datosDisenio = JSON.parse(data);
                
                for (var x=0; datosDisenio[x] ; x+=1) {

                    //console.log(datosDisenio[x]);

                    let disenio = [] //disenio del detalle

                    disenio['descripcion'] = datosDisenio[x].descripcion;
                    disenio['cantidad'] = datosDisenio[x].cantidad;
                    //console.log(disenio);
                    
                    //detallePedido.push(disenio); //armando detalle para el envio
                    //console.log(detallePedido);

                    $('#tabla_dash tr:last').after('<tr><td>' + disenio.descripcion + '</td><td>' + disenio.cantidad + '</td><td>');

                }
            }
        })
    }

    $.ajax({

        url : 'consultaJson/obtenerUsuarios.php',
        data: {},

        success: function(data){

            var cantidadUsuario = JSON.parse(data);

            for (var x=0; cantidadUsuario[x] ; x+=1) {

                var numeroRegistrados = cantidadUsuario[x].cantidad;
            }

            $("#tituloUsuario").after('<h2>'+ numeroRegistrados +'</h2>');

            }
    })

    $.ajax({

        url : 'consultaJson/obtenerPedidosRealizados.php',
        data: {},

        success: function(data){

            var cantidadPedidosRealizados = JSON.parse(data);

            for (var x=0; cantidadPedidosRealizados[x] ; x+=1) {

                var pedidosRealizados = cantidadPedidosRealizados[x].cantidad;
            }

            $("#tituloPedidosRealizados").after('<h2>'+ pedidosRealizados +'</h2>');

            }
    })

    $.ajax({

        url : 'consultaJson/gananciaTotalDelMes.php',
        data: {},

        success: function(data){

            var gananciaTotalDelMes = JSON.parse(data);

            //console.log(gananciaTotalDelMes);

            for (var x=0; gananciaTotalDelMes[x] ; x+=1) {

                var totalDelMes = gananciaTotalDelMes[x].ganancia;
            }

            $("#totalDelMes").after('<h2>'+ '$' + totalDelMes +'</h2>');

            }
    })

    $.ajax({

        url : 'consultaJson/gananciaTotal.php',
        data: {},

        success: function(data){

            var gananciaTotalDelMes = JSON.parse(data);

            //console.log(gananciaTotalDelMes);

            for (var x=0; gananciaTotalDelMes[x] ; x+=1) {

                var total = gananciaTotalDelMes[x].ganancia;
            }

            $("#total").after('<h2>'+ '$' + total +'</h2>');

            }
    })

    //grafico Barras 5
    var ctx = document.getElementById("widgetChart5");
    if (ctx) {
      ctx.height = 220;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [
            {
              label: "My First dataset",
              data: [78, 81, 80, 64, 65, 80, 70, 75, 67, 85, 66, 68],
              borderColor: "transparent",
              borderWidth: "0",
              backgroundColor: "#ccc",
            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              display: false,
              categoryPercentage: 1,
              barPercentage: 0.65
            }],
            yAxes: [{
              display: false
            }]
          }
        }
      });
    }

    // grafico torta percent-chart2
    $.ajax({

        url : 'consultaJson/graficoTortaReserva.php',
        data: {},

        success: function(data){

            var datoReserva = JSON.parse(data);
        
            var cantidadReserva = datoReserva[0].cantidadReserva;
            //console.log(cantidadReserva);
            }
    })
    function obtenerPedido() {
        $.ajax({

            url : 'consultaJson/graficoTortaPedidos.php',
            data: {},

            success: function(data){

                var datoPedido = JSON.parse(data);
            
                var cantidadPedido = datoPedido[0].cantidadPedido;
                //console.log(cantidadReserva);
                }
        })
    }
    var ctx = document.getElementById("percent-chart2");
    if (ctx) {
      ctx.height = 209;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [80,10],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Pedidos',
            'Servicios'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 87,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false,
            position: 'bottom',
            labels: {
              fontSize: 14,
              fontFamily: "Poppins,sans-serif"
            }

          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16,
          }
        }
      });
    }

    //WidgetChart 1
    var ctx = document.getElementById("widgetChart1");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [1, 18, 9, 17, 34, 22],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }

//WidgetChart 2
    var ctx = document.getElementById("widgetChart2");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [1, 18, 9, 17, 34, 22],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }

    //WidgetChart 3
    var ctx = document.getElementById("widgetChart3");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [1, 18, 9, 17, 34, 22],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }

    //WidgetChart 4
    var ctx = document.getElementById("widgetChart4");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [1, 18, 9, 17, 34, 22],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }    

</script>


</body>
</html>