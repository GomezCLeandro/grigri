<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");

require_once "../../clases/Pedido.php";
require_once "../../clases/EstadoPedido.php";

/*
require_once "../../clases/Usuario.php";

require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";
*/

$listadoPedidos = Pedido::obtenerTerminados();

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
                    <div class="row m-t-30">
                        <div>
                            <div class="table-responsive m-b-40">

                                <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Nr. Pedido</th>
                                                <th>Cliente</th>
                                                <th>Estado</th>
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

                                                <tr>
                                                    <td> <?php echo $pedidos->getIdPedido(); ?> </td>
                                                    <td> <?php echo $usuario->getApellido(), ", " ,$usuario->getNombre() ; ?> </td>
                                                    <td class='text-center'><span class='badge badge-warning'> <?php echo $estado->getDescripcion(); ?> </span></td>
                                                    <td class="text-center"> <?php echo $pedidos->calcularTotal(); ?> </td>
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
                            <div class="table-responsive m-b-40">

                                <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Nr. Pedido</th>
                                                <th>Cliente</th>
                                                <th>Estado</th>
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

                                                <tr>
                                                    <td> <?php echo $pedidos->getIdPedido(); ?> </td>
                                                    <td> <?php echo $usuario->getApellido(), ", " ,$usuario->getNombre() ; ?> </td>
                                                    <td class='text-center'><span class='badge badge-warning'> <?php echo $estado->getDescripcion(); ?> </span></td>
                                                    <td class="text-center"> <?php echo $pedidos->calcularTotal(); ?> </td>
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