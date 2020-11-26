<?php

require_once '../../clases/Reserva.php';
require_once '../../clases/Usuario.php';
require_once '../../clases/EstadoReserva.php';
require_once '../../clases/Servicio.php';

$id = $_GET['id'];

$reserva = Reserva::obtenerPorId($id);

$listadoServicio = Servicio::obtenerTodos();
$listadoUsuario = Usuario::obtenerTodos();
$listadoEstadoRerserva = EstadoReserva::obtenerTodos();

//highlight_string(var_export($reserva,true));
//exit;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Reserva</title>

	<script type="text/javascript" src="../../js/validaciones/validacionRecursos.js"></script>

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
			                    <strong>Reserva</strong>
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

			                    <form action="procesar/modificar.php" name="frmDatos" id="frmDatos" method="post">
			                    	<input type="hidden" name="idReserva" value="<?php echo $reserva->getIdReserva(); ?>">

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Fecha de Reserva</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="date" id="txtSubCategoria" name="txtFechaReserva" class="form-control" value="<?php echo $reserva->getFechaReserva(); ?>">
						                </div>
						            </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Hora de Reservacion</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="time" id="txtHoraReserva" name="txtHoraReserva" class="form-control" value="<?php echo $reserva->getHoraReserva(); ?>">
						                </div>
						            </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Lugar de Reserva</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtSubCategoria" name="txtLugarReserva" class="form-control" value="<?php echo $reserva->getLugarReserva(); ?>">
						                </div>
						            </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Servicio</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idServicio" id="idCategoria">
                               					<option value="0">Seleccionar</option>

												<?php
												foreach ($listadoServicio as $servicio):
													$selected = '';
													if ($servicio->getIdServicio() == $reserva->getIdServicio()) {
														$selected = "SELECTED";
													}
												?>
													<option value="<?php echo $servicio->getIdServicio(); ?>" <?php echo $selected; ?> >
													    <?php echo $servicio; ?>
													</option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Usuario</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idUsuario" id="idCategoria">
                               					<option value="0">Seleccionar</option>

												<?php
												foreach ($listadoUsuario as $usuario):
													$selected = '';
													if ($usuario->getIdUsuario() == $reserva->getIdUsuario()) {
														$selected = "SELECTED";
													}
												?>
													<option value="<?php echo $usuario->getIdUsuario(); ?>" <?php echo $selected; ?> >
													    <?php echo $usuario; ?>
													</option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>						            

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Estado Reserva</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idEstadoReserva" id="idCategoria">
                               					<option value="0">Seleccionar</option>

												<?php
												foreach ($listadoEstadoRerserva as $estadoReserva):
													$selected = '';
													if ($estadoReserva->getIdEstadoReserva() == $reserva->getIdEstadoReserva()) {
														$selected = "SELECTED";
													}
												?>
													<option value="<?php echo $estadoReserva->getIdEstadoReserva(); ?>" <?php echo $selected; ?> >
													    <?php echo $estadoReserva; ?>
													</option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Notacion</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtSubCategoria" name="txtNotacion" class="form-control" value="">
						                </div>
						            </div>

                                </div>
		                        <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Guardar
                                    </button>
                                </div>
				            	</form>
	                        </div>
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
	
</body>
</html>