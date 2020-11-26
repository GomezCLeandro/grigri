<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");

require_once "../../clases/Pedido.php";
require_once "../../clases/EstadoPedido.php";

require_once "../../clases/Usuario.php";

require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";
/**/

$listadoPedidos = Pedido::obtenerPedidoParaFacturar();

//highlight_string(var_export($listadoPedidos, true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado Facturacion</title>
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
                                                    <?php
                                                        if ($estado->getIdEstadoPedido() == 6) {
                                                            echo "<td><span class='badge badge-warning'>". "Para Facturar" ."</span></td>";
                                                        }
                                                        if ($estado->getIdEstadoPedido() == 7) {
                                                            echo "<td><span class='badge badge-info'>". $estado->getDescripcion() ."</span></td>";
                                                        }
                                                    ?>

                                                    <td class="text-center"> <?php echo $pedidos->getTotal(); ?> </td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="detalle.php?id=<?php echo $pedidos->getIdPedido(); ?>">Detalle</a>
                                                    	<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $pedidos->getIdPedido(); ?>">Borrar</a>

                                                        <?php if ($estado->getIdEstadoPedido() == 6) : ?>

                                                            <a class="btn btn-outline-success btn-sm" href="detalle.php?id=<?php echo $pedidos->getIdPedido(); ?>">Facturar</a>

                                                        <?php endif; ?>
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