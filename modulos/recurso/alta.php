<!DOCTYPE html>
<html>
<head>
	<title>Alta Recurso</title>

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
			                    <strong>Recurso</strong>
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

			                    <form action="procesar/guardar.php" name="frmDatos" id="frmDatos" method="post">

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Diseño</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtRecurso" name="txtRecurso" class="form-control">
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