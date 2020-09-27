<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";

$listadoPedidos = Pedido::obtenerTodos();

//highlight_string(var_export($listadoPedidos, true));
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
                    <div>
                    <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                        <i class="zmdi zmdi-plus"></i>Pedido</a>
                    </div>
                    <div class="row m-t-30">
                        <div>
                            <div class="table-responsive m-b-40">

                                <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Nr. Pedido</th>
                                                <th>Cliente</th>
                                                <th>Lugar de Entrega</th>
												<th>Estado del Pedido</th>
                                                <th>Fecha de Creacion</th>
												<th>Fecha de Entrega</th>
                                                <th>Para Entregar</th>
												<th>Total</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <?php if (!empty($listadoPedidos)): ?>
                                            <tbody>
                                            	<?php foreach ($listadoPedidos as $pedidos): ?>

                                                    <?php $usuario = Usuario::obtenerPorId($pedidos->getIdUsuario()); ?>
                                                	<?php $estado = EstadoPedido::obtenerPorId($pedidos->getIdEstadoPedido()); ?>
                                                    <?php $detallePedido = DetallePedido::obtenerPorIdPedido($pedidos->getIdPedido()); ?>
                                                    <?php $disenio = Disenio::obtenerPorIdItem($detallePedido->getIdItem()); ?>

                                                    <?php $fechaInicio = new DateTime(date('Y-m-d')); ?>
                                                    <?php $fechaFinal = new DateTime($pedidos->getFechaEntrega()); ?>

                                                    <?php 
                                                    if ($fechaInicio == $fechaFinal) {
                                                        $fechaEntrega = "Hoy";
                                                    } elseif ($fechaFinal < $fechaInicio) { 
                                                        $fechaEntrega = "Expirado"; 
                                                    } else {
                                                        $resultado = $fechaInicio->diff($fechaFinal);
                                                        $fechaEntrega = $resultado->format('en %a días');
                                                    }
                                                    ?>

                                                <tr>
                                                    <td> <?php echo $pedidos->getIdPedido(); ?> </td>
                                                    <td> <?php echo $usuario->getApellido(), ", " ,$usuario->getNombre() ; ?> </td>
                                                    <td> <?php echo $pedidos->getLugarEntrega(); ?> </td>
                                                    <?php
                                                        if ($estado->getIdEstadoPedido() == 1) {
                                                            echo "<td><span class='role admin'>". $estado->getDescripcion() ."</span></td>";
                                                        }
                                                        if ($estado->getIdEstadoPedido() == 2) {
                                                            echo "<td><span class='role user'>". $estado->getDescripcion() ."</span></td>";
                                                        }
                                                        if ($estado->getIdEstadoPedido() == 3) {
                                                            echo "<td><span class='role member'>". $estado->getDescripcion() ."</span></td>";
                                                            $fechaEntrega = "<i class='fa fa-check'></i>";
                                                        }
                                                    ?>
                                                    <td> <?php echo $pedidos->getFechaCreacion(); ?> </td>
                                                	<td> <?php echo $pedidos->getFechaEntrega(); ?> </td>
                                                    <td> <?php echo $fechaEntrega ?> </td>
                                                    <td> <?php echo "$".$detallePedido->getCantidad() * $disenio->getPrecio(); ?> </td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="../detallePedido/detallePedido.php?id=<?php echo $pedidos->getIdPedido(); ?>">Detalle</a>
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