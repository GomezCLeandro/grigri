<?php

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";

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
                    <div>
                    <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                        <i class="zmdi zmdi-plus"></i>Pedido</a>
                    </div>
	<?php require_once '../../menu.php'; ?>

        <div class="main-content">
            <div class="section__content section__content--p30">
                <div>
                    <div>
                    <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                        <i class="zmdi zmdi-plus"></i>Pedido</a>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <div class="table-responsive m-b-40">

                                <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Lugar de Entrega</th>
												<th>Estado del Pedido</th>
												<th>fecha de Entrega</th>
												<th>Accion</th>
                                            </tr>
                                        </thead>
                                        <?php if (!empty($listadoPedidos)): ?>
                                            <tbody>
                                            	<?php foreach ($listadoPedidos as $pedidos): ?>

                                                    <?php $usuario = Usuario::obtenerPorId($pedidos->getIdUsuario()); ?>
                                                	<?php $estado = EstadoPedido::obtenerPorId($pedidos->getIdEstadoPedido()); ?>

                                                <tr>
                                                    <td> <?php echo $usuario->getUsername(); ?> </td>
                                                    <td> <?php echo $pedidos->getLugarEntrega(); ?> </td>
                                                	<td> <?php echo $estado->getDescripcion(); ?> </td>
                                                	<td> <?php echo $pedidos->getFechaEntrega(); ?> </td>
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