<?php

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";

$listadoPedidos = Pedido::obtenerTodos();

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
                    <div>
                    <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                        <i class="zmdi zmdi-plus"></i>Pedido</a>
                    </div>
                    <br>                    
                    <div class="container-fluid">
                        <div>
                            <div >
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>Estado del Pedido</th>
												<th>fecha de Entrega</th>
												<th>Lugar de Entrega</th>
                                                <th>Diseño</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
												<th>Accion</th>
                                            </tr>
                                        </thead>
                                        <?php if (!empty($listadoPedidos)): ?>
                                            <tbody>
                                            	<?php foreach ($listadoPedidos as $pedidos): ?>

                                            	<?php $estado = EstadoPedido::obtenerPorId($pedidos->getIdEstadoPedido()); ?>
                                                <?php $detallePedido = DetallePedido::obtenerPorIdPedido($pedidos->getIdPedido()); ?>
                                                <?php $disenio = Disenio::obtenerPorIdItem($detallePedido->getIdItem()); ?>
                                                <?php $total = $disenio->getPrecio() * $detallePedido->getCantidad(); ?>
                                                <tr>
                                                	<td> <?php echo $estado->getDescripcion(); ?> </td>
                                                	<td> <?php echo $pedidos->getFechaEntrega(); ?> </td>                                                
                                                	<td> <?php echo $pedidos->getLugarEntrega(); ?> </td>
                                                    <td> <?php echo $disenio; ?> </td>
                                                    <td> <?php echo $detallePedido->getCantidad(); ?> </td>
                                                    <td> <?php echo $total ?> </td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="detalle.php?id=<?php echo $pedidos->getIdPedido(); ?>">Detalle</a>
                                                    	<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $pedidos->getIdPedido(); ?>">Modificar</a>
                                                    	<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $pedidos->getIdPedido(); ?>">Borrar</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>	
                                            </tbody>
                                        <?php endif ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>