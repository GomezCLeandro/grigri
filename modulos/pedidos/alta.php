<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/Envio.php";
require_once "../../clases/Disenio.php";

$listadoUsuario = Usuario::obtenerTodos();
$listadoEnvio = Envio::obtenerTodos();
$listadoDisenio = Disenio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Pedido</title>

	<script type="text/javascript" src="../../js/validaciones/validacionItem.js"></script>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

	<div class="main-content">
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">	
					<div class="col-lg-6">
						<div class="card">
						    <div class="card-header">
						        <strong>Alta de Pedido</strong>
						    </div>
						    <div class="card-body card-block">
				    	        <?php if (isset($_SESSION['mensaje_error'])) : ?>

						            <font color="red"> 
						              	<?php echo $_SESSION['mensaje_error']; ?>
						            </font>
						            <br><br>

						        <?php
						                unset($_SESSION['mensaje_error']);
						            endif;
						        ?>
						        <div id="mensajeError"></div>

						        <form action="procesar/guardar.php" id="frmDatos" name="frmDatos" method="post" class="form-horizontal">

						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="select" class=" form-control-label">Usuario / Persona</label>
						                </div>
						                <div class="col-12 col-md-9">
						                	<select name="idUsuario" id="idCategoria" class="form-control">
											    <option value="0">Seleccionar</option>

												<?php foreach ($listadoUsuario as $usuario): ?>

													<option value="<?php echo $usuario->getIdUsuario(); ?>">
													    <?php echo $usuario . ", " . $usuario->getApellido(). " " .$usuario->getNombre(); ?>
													</option>

												<?php endforeach ?>

											</select>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="select" class=" form-control-label">Tipo Envio</label>
						                </div>
						                <div class="col-12 col-md-9">
											<select name="idTipoEnvio" id="idCategoria" class="form-control">
											    <option value="0">Seleccionar</option>

												<?php foreach ($listadoEnvio as $tipoEnvio): ?>

													<option value="<?php echo $tipoEnvio->getIdEnvio(); ?>">
													    <?php echo $tipoEnvio->getDescripcion(); ?>
													</option>

												<?php endforeach ?>
											</select>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="select" class=" form-control-label">Diseño</label>
						                </div>
						                <div class="col-12 col-md-9">
											<select name="idItem" id="idCategoria" class="form-control">
											    <option value="0">Seleccionar</option>

												<?php foreach ($listadoDisenio as $disenio): ?>

													<option value="<?php echo $disenio->getIdItem(); ?>">
													    <?php echo $disenio->getDescripcion(); ?>
													</option>

												<?php endforeach ?>
											</select>
						                </div>
						            </div>

						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Fecha de Entrega</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="date" id="txtDescripcion" name="txtFechaEntrega" class="form-control">
						                    <small class="help-block form-text">Fecha de Entrega</small>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Fecha de Creacion</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="date" id="txtDescripcion" name="txtFechaCreacion" class="form-control">
						                    <small class="help-block form-text">Fecha de Creacion (opcional)</small>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="password-input" class=" form-control-label">Cantidad</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtCantidad" name="txtCantidad" placeholder="cantidad" class="form-control">
						                    <small class="help-block form-text">Eliga la cantidad</small>
						                </div>
						            </div>
						        </div>
		                        <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="validarDatos()">
                                        <i class="fa fa-dot-circle-o"></i> Guardar
                                    </button>
                                </div>
                            	</form>
						    </div>
						    
                <section id="section1">
                <h5>Realizar Venta </h5>
                <div id="id_message_validacion" class="alert alert-danger" role="alert">
                    Error de carga
                </div>

                <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>2020/02/20</span>
                        </div>
                        <hr>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                        <div class="col-sm-6 mb-3">
                            <div class="list-with-gap">
                                <!-- control -->
                                    <div class="floating-label input-icon input-icon-right">
                                        <i onclick="abrirListaProductos();" data-feather="search"></i>
                                        <input id="id_txt_codigo" type="text" class="form-control" id="floatingSearch" placeholder="Código del articulo">
                                        <label for="floatingSearch">Codigo del articulo</label>
                                    </div>
                                <!-- control -->
                            </div>
                        </div>

                        </div>
                        <div class="table-responsive my-3">
                            <table  id="id_detalle_venta"  class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <th class="text-center">Código</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th class="">Subtotal</th>
                                <th class="text-right">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                  
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="row row-cols-2">
                            <div class="col">
                            <p class="lead">Totales</p>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                <tbody>
                                    <tr>
                                    <th class="w-50">Total:</th>
                                    <td id="id_total">$0.0</td>
                                    </tr>
                                    <tr>
                                    <th>Pago</th>
                                    <td><input id="id_pago" type="number" class="form-control"></td>
                                    </tr>
                                    <tr>
                                    <th>Vuelto:</th>
                                    <td id="id_vuelto">$0.0</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-sm-row mt-3">
                           
                            <button onclick="guardarFormVentas()" class="btn btn-success has-icon ml-sm-1 mt-1 mt-sm-0" type="button">
                            <i class="mr-2" data-feather="printer"></i>Guardar
                            </button>
                        </div>
                        </div>
                </div>


                </section>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>