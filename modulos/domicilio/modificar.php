<?php

require_once "../../clases/Domicilio.php";

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);
$arrBarrios = $domicilio->barrio->obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Domicilio</title>

	<script type="text/javascript" src="../../js/validaciones/validacionDomicilio.js"></script>

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
						        <strong>Formulario de Usuario</strong>
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

						        <form action="procesar/modificar.php" id="frmDatos" name="frmDatos" method="post" enctype="multipart/form-data" class="form-horizontal">
									<input type="hidden" name="idPersona" value="<?php echo $domicilio->getIdPersona(); ?>">
									<input type="hidden" name="idDomicilio" value="<?php echo $domicilio->getIdDomicilio(); ?>">
									<input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>

						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="select" class=" form-control-label">Barrio</label>
						                </div>
						                <div class="col-12 col-md-9">
						                	<select name="idBarrio" id="cboBarrio" class="form-control">
											    <option value="0">Seleccionar</option>

												<?php
												foreach ($arrBarrios as $cboBarrios):
													$selected = '';
													if ($domicilio->getIdBarrio() == $cboBarrios->getIdBarrio()) {
														$selected = "SELECTED";
													}
												?>
													<option value="<?php echo $cboBarrios->getIdBarrio(); ?>" <?php echo $selected; ?> >
													    <?php echo $cboBarrios; ?>
													</option>

												<?php endforeach ?>

											</select>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Calle</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtCalle" name="txtCalle" placeholder="calle" class="form-control" value="<?php echo $domicilio->getCalle(); ?>">
						                    <small class="help-block form-text">Escriba el nombre de la calle</small>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="password-input" class=" form-control-label">Altura</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtAltura" name="txtAltura" placeholder="altura" class="form-control" value="<?php echo $domicilio->getAltura(); ?>">
						                    <small class="help-block form-text">Escriba la altura</small>
						                </div>
						            </div>					            
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Casa</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtCasa" name="txtCasa" placeholder="casa" class="form-control" value="<?php echo $domicilio->getCasa(); ?>">
						                    <small class="help-block form-text">casa</small>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Manzana</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtManzana" name="txtManzana" placeholder="manzana" class="form-control" value="<?php echo $domicilio->getManzana(); ?>">
						                    <small class="help-block form-text">manzana</small>
						                </div>
						            </div>						            
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Descripcion</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtDescripcion" name="txtDescripcion" placeholder="descripcion" class="form-control" value="<?php echo $domicilio->getDescripcion(); ?>">
						                    <small class="help-block form-text">pequeña descipcion que queira agregar</small>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>