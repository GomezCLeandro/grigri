<?php

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";

$idPedido = $_GET['id'];

$pedido = Pedido::obtenerPorId($idPedido);
$arrDetallePedido = DetallePedido::obtenerPorIdPedido($idPedido);

//highlight_string(var_export($listadoPedidos,true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado Pedidos</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row m-t-30">
                <div class="col-md-8">
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Lugar de Entrega</th>
                                    <th>Estado del Pedido</th>
                                    <th>fecha de Entrega</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                                <tbody>
                                        <?php $usuario = Usuario::obtenerPorId($pedido->getIdUsuario()); ?>
                                        <?php $estado = EstadoPedido::obtenerPorId($pedido->getIdEstadoPedido()); ?>
                                    <tr>
                                        <td> <?php echo $usuario->getUsername(); ?> </td>
                                        <td> <?php echo $pedido->getLugarEntrega(); ?> </td>
                                        <?php
                                            if ($estado->getIdEstadoPedido() == 1) {
                                                echo "<td><span class='role admin'>". $estado->getDescripcion() ."</span></td>";
                                            }
                                            if ($estado->getIdEstadoPedido() == 2) {
                                                echo "<td><span class='role user'>". $estado->getDescripcion() ."</span></td>";
                                            }
                                            if ($estado->getIdEstadoPedido() == 3) {
                                                echo "<td><span class='role member'>". $estado->getDescripcion() ."</span></td>";
                                            }
                                        ?>                                        
                                        <td> <?php echo $pedido->getFechaEntrega(); ?> </td>
                                        <td> <?php echo $pedido->calcularTotal(); ?> </td>
                                    </tr>
                                </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Nr. Pedido</th>
                            <th>Diseño</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php foreach ($arrDetallePedido as $detallePedido): ?>

                                <?php $disenio = Disenio::obtenerPorIdItem($detallePedido->getIdItem()); ?>
                            <tr>
                                <td> <?php echo $detallePedido->getIdPedido(); ?> </td>
                                <td> <?php echo $disenio ?> </td>
                                <td> <?php echo $detallePedido->getCantidad(); ?> </td>
                            </tr>

                            <?php endforeach ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>