<?php

require_once '../../clases/Servicio.php';

$id = $_GET['id'];

$servicio = Servicio::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Servicio</title>

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
			                    <strong>Servicio</strong>
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
			                    	<input type="hidden" name="idServicio" value="<?php echo $servicio->getIdServicio(); ?>">

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Servicio</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value="<?php echo $servicio; ?>">
						                </div>
						            </div>
			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Precio</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtPrecio" name="txtPrecio" class="form-control" value="<?php echo $servicio->getPrecio(); ?>">
						                </div>
						            </div>						            
			                    
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="file-input" class=" form-control-label">Imagen del diseño:</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="file" id="file-input" name="fileImagen" class="form-control-file">
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