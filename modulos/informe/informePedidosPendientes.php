<?php

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";

$pedidosPendientes = Pedido::pendientes();

$cantidad = 0;
//highlight_string(var_export($pedidosPendientes,true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>

    <title>Listado Pedidos Pendientes</title>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
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

                                <?php if (!empty($pedidosPendientes)): ?>
                                    <tbody>
                                    	<?php foreach ($pedidosPendientes as $pedidos): ?>
                                            <?php $cantidad += 1; ?>
                                            <?php $usuario = Usuario::obtenerPorId($pedidos->getIdUsuario()); ?>
                                        	<?php $estado = EstadoPedido::obtenerPorId($pedidos->getIdEstadoPedido()); ?>
                                            <?php $detallePedido = DetallePedido::obtenerPorIdPedido($pedidos->getIdPedido()); ?>

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
                                                    echo "<td><span class='badge badge-danger'>". $estado->getDescripcion() ."</span></td>";
                                                }
                                                if ($estado->getIdEstadoPedido() == 2) {
                                                    echo "<td><span class='badge badge-info'>". $estado->getDescripcion() ."</span></td>";
                                                }
                                                if ($estado->getIdEstadoPedido() == 3) {
                                                    echo "<td><span class='badge badge-success'>". $estado->getDescripcion() ."</span></td>";
                                                    $fechaEntrega = "<i class='fa fa-check'></i>";
                                                }
                                                if ($estado->getIdEstadoPedido() == 6) {
                                                    echo "<td><span class='badge badge-primary'>". $estado->getDescripcion() ."</span></td>";
                                                }
                                                if ($estado->getIdEstadoPedido() == 7) {
                                                    echo "<td><span class='badge badge-warning'>". $estado->getDescripcion() ."</span></td>";
                                                }
                                                if ($estado->getIdEstadoPedido() == 8) {
                                                    echo "<td><span class='badge badge-info'>". utf8_encode($estado->getDescripcion()) ."</span></td>";
                                                }
                                            ?>
                                            <td> <?php echo $pedidos->getFechaCreacion(); ?> </td>
                                        	<td> <?php echo $pedidos->getFechaEntrega(); ?> </td>
                                            <td> <?php echo $fechaEntrega; ?> </td>
                                            <td> <?php echo $pedidos->calcularTotal(); ?> </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="../detallePedido/detallePedido.php?id=<?php echo $pedidos->getIdPedido(); ?>">Detalle</a>
                                            	<a class="btn btn-secondary btn-sm" href="../pedidos/modificar.php?id=<?php echo $pedidos->getIdPedido(); ?>">Modificar</a>
                                            	<a class="btn btn-warning btn-sm" href="../pedidos/eliminar.php?id=<?php echo $pedidos->getIdPedido(); ?>">Borrar</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>	
                                    </tbody>
                                <?php endif ?>
                            </table>

                            <?php echo $cantidad; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>