<?php

require_once '../../clases/Usuario.php';
require_once '../../clases/Servicio.php';
require_once '../../clases/EstadoReserva.php';

$listadoUsuario = Usuario::obtenerTodos();
$listadoServicio = Servicio::obtenerTodos();
$listadoEstadoReserva = EstadoReserva::obtenerTodos();

//highlight_string(var_export($listadoServicio, true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Reserva</title>

	<script type="text/javascript" src="../../js/validaciones/validacionModulos.js"></script>

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

			                    <form action="procesar/guardar.php" name="frmDatos" id="frmDatos" method="post" enctype="multipart/form-data">

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Fecha de Reservacion</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="date" id="txtFechaReserva" name="txtFechaReserva" class="form-control">
						                </div>
						            </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Hora de Reservacion</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="time" id="txtHoraReserva" name="txtHoraReserva" class="form-control">
						                </div>
						            </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Usuario</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idUsuario" id="idUsuario" class="form-control">
                               					<option value="0">Seleccionar</option>

                               					<?php foreach ($listadoUsuario as $usuario): ?>

													<option value="<?php echo $usuario->getIdUsuario(); ?>"> <?php echo $usuario; ?> </option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Servicio</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idServicio" id="idCategoria" class="form-control">
                               					<option value="0">Seleccionar</option>

                               					<?php foreach ($listadoServicio as $servicio): ?>

													<option value="<?php echo $servicio->getIdServicio(); ?>"> <?php echo $servicio; ?> </option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Lugar de Reserva</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtLugarReserva" name="txtLugarReserva" class="form-control">
						                </div>
						            </div>
			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Notacion</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtNotacion" name="txtNotacion" class="form-control">
						                </div>
						            </div>

                                </div>
		                        <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-save"></i> Guardar
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