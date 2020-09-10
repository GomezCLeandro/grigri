<?php

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";

$idPedido = $_GET['id'];

$pedido = Pedido::obtenerPorId($idPedido);



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
                    <div class="container-fluid">
                        <div>
                            <div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>Usuario</th>
												<th>Apellido y Nombre</th>
												<th>Calle</th>
												<th>Altura</th>
												<th>Casa</th>
												<th>Manzana</th>
												<th>Barrio</th>
												<th>Localidad</th>
												<th>Descripcion</th>
                                            </tr>
                                        </thead>
                                        <?php if (!empty($pedido)): ?>
                                            <tbody>

                                            	<?php $usuario = Usuario::obtenerPorId($pedido->getIdUsuario()); ?>
                                                <tr>
                                                	<td> <?php echo $usuario; ?> </td>
                                                	<td> <?php echo $usuario->getApellido(). ", " .$usuario->getNombre(); ?> </td>
													<td> <?php echo $usuario->domicilio->getCalle(); ?> </td>
													<td> <?php echo $usuario->domicilio->getAltura(); ?> </td>
													<td> <?php echo $usuario->domicilio->getCasa(); ?> </td>
													<td> <?php echo $usuario->domicilio->getManzana(); ?> </td>				
													<td> <?php echo $usuario->domicilio->barrio; ?> </td>
													<td> <?php echo $usuario->domicilio->barrio->localidad; ?> </td>
													<td> <?php echo $usuario->domicilio->getDescripcion(); ?> </td>
                                                </tr>
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