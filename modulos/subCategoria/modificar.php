<?php

require_once '../../clases/SubCategoria.php';
require_once '../../clases/Categoria.php';

$id = $_GET['id'];

$subCategoria = SubCategoria::obtenerPorId($id);
$listadoCategoria = Categoria::obtenerTodos();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Modificar Sub Categoria</title>

	<script type="text/javascript" src="../../js/validaciones/validacionSubCategoria.js"></script>

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
			                    <strong>SubCategoria</strong>
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

			                    <form action="procesar/modificar.php" name="frmDatos" method="post" id="frmDatos">
			                    	<input type="hidden" name="idSubCategoria" value="<?php echo $subCategoria->getIdSubCategoria(); ?>">

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Sub Categoria</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtSubCategoria" name="txtSubCategoria" class="form-control" value="<?php echo utf8_encode($subCategoria); ?>">
						                </div>
						            </div>
			                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Categoria</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idCategoria" id="idCategoria">
                               					<option value="0">Seleccionar</option>

												<?php
												foreach ($listadoCategoria as $categoria):
													$selected = '';
													if ($subCategoria->getIdCategoria() == $categoria->getIdCategoria()) {
														$selected = "SELECTED";
													}
												?>
													<option value="<?php echo $categoria->getIdCategoria(); ?>" <?php echo $selected; ?> >
													    <?php echo $categoria; ?>
													</option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>
			                    </form>
			                </div>
			                <div class="card-footer">
			                    <button class="btn btn-primary btn-sm" onclick="validarDatos()">
			                        <i class="fa fa-dot-circle-o"></i> Guardar
			                    </button>
			                </div>	
                        </div>
		            </div>
	            </div>
	        </div>
	    </div>
	</div>

</body>
</html>