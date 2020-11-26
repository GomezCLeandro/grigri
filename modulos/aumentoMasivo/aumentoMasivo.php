<?php

require_once  "../../clases/Recurso.php";
require_once  "../../clases/SubCategoria.php";
require_once  "../../clases/Categoria.php";

$listadoRecurso = Recurso::obtenerTodos();
$listadoSubCategoria = SubCategoria::obtenerTodos();
$listadoCategoria = Categoria::obtenerTodos();

const RECURSO = 1;
const SUB_CATEGORIA = 2;
const CATEGORIA = 3;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Aumento Masivo por Recurso</title>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

	<div class="main-content">
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">	

	            	<!-- Aumento Masivo de Diseños por Recurso -->
					<div class="col-lg-6">
						<div class="card">
			                <div class="card-header">
			                    <strong>Aumento de Diseños por Recurso</strong>
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

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Recurso</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idAumentoRecurso" id="idAumentoRecurso" class="form-control">
                               					<option value="0">Seleccionar</option>

                               					<?php foreach ($listadoRecurso as $recurso): ?>

													<option value="<?php echo $recurso->getIdRecurso(); ?>"> <?php echo $recurso; ?> </option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">Aumento %</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtAumentoRecurso" name="txtAumentoRecurso" placeholder="%" class="form-control">
						                </div>
						            </div>

                                </div>
		                        <div class="card-footer">
                                    <button class="btn btn-primary btn-sm" onclick="aumentarPrecioPorRecurso(<?php echo RECURSO; ?>)">
                                        <i class="fa fa-save"></i> Aumentar
                                    </button>
                                </div>

	                        </div>
			            </div>

			            <!-- Aumento Masivo de Diseños por Sub Categoria -->
			            <div class="col-lg-6">
							<div class="card">
				                <div class="card-header">
				                    <strong>Aumento de Diseños por Sub Categoria</strong>
				                </div>
				                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Sub Categoria</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="idAumentoSubCategoria" id="idAumentoSubCategoria" class="form-control">
                               					<option value="0">Seleccionar</option>

                               					<?php foreach ($listadoSubCategoria as $subCategoria): ?>

													<option value="<?php echo $subCategoria->getIdSubCategoria(); ?>"> <?php echo $subCategoria; ?> </option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">Aumento %</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtAumentoSubCategoria" name="txtAumentoSubCategoria" placeholder="%" class="form-control">
						                </div>
						            </div>

	                                </div>
			                        <div class="card-footer">
	                                    <button class="btn btn-primary btn-sm" onclick="aumentarPrecioPorSubCategoria(<?php echo SUB_CATEGORIA; ?>)">
	                                        <i class="fa fa-save"></i> Aumentar
	                                    </button>
	                                </div>

		                        </div>
				            </div>
			            </div>

						<!-- Aumento Masivo de Diseños por Categoria -->
			            <div class="col-lg-6">
							<div class="card">
				                <div class="card-header">
				                    <strong>Aumento de Diseños por Categoria</strong>
				                </div>
				                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label"> Categoria</label>
                                        </div>
                                        <div class="col col-md-9">

                                            <select name="idAumentoCategoria" id="idAumentoCategoria" class="form-control">
                               					<option value="0">Seleccionar</option>

                               					<?php foreach ($listadoCategoria as $categoria): ?>

													<option value="<?php echo $categoria->getIdCategoria(); ?>"> <?php echo $categoria; ?> </option>

												<?php endforeach ?>
                                            
                                            </select>
                                        </div>
                                    </div>

			                        <div class="row form-group">
						                <div class="col col-md-3">Aumento %</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="number" id="txtAumentoCategoria" name="txtAumentoCategoria" placeholder="%" class="form-control">
						                </div>
						            </div>

	                                </div>
			                        <div class="card-footer">
	                                    <button class="btn btn-primary btn-sm" onclick="aumentarPrecioPorCategoria(<?php echo CATEGORIA; ?>)">
	                                        <i class="fa fa-save"></i> Aumentar
	                                    </button>
	                                </div>

		                        </div>
				            </div>
			            </div>

                        <div class="table-responsive table-data">
                            <table class="table" id="tabla_diseño">
                                <tbody>
                                    <tr>

                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>

		            </div>
		        </div>
		    </div>
		</div>
	</div>

<script>

	function aumentarPrecioPorRecurso(id) {

    	let aumento = document.getElementById('txtAumentoRecurso').value
    	let idAumento = document.getElementById('idAumentoRecurso').value

	    $.ajax({
	        type: 'GET',
	        url : 'json/aumentoMasivoPorRecurso.php',
	        data: {
	        	'aumento': aumento,
	        	'idAumento': idAumento,
	        	'idDondeAumentar': id
	        },
            success: function(data){
            	console.log(data);
                if (data == true) {
	                console.log(data);
	                alert('Aumentado');
            	}
            }
	    })
	}

	function aumentarPrecioPorSubCategoria(id) {

    	let aumento = document.getElementById('txtAumentoSubCategoria').value
    	let idAumento = document.getElementById('idAumentoSubCategoria').value

	    $.ajax({
	        type: 'GET',
	        url : 'json/aumentoMasivoPorRecurso.php',
	        data: {
	        	'aumento': aumento,
	        	'idAumento': idAumento,
	        	'idDondeAumentar': id
	        },
            success: function(data){
            	console.log(data);
                if (data == true) {
	                console.log(data);
	                alert('Aumentado');
            	}
            }
	    })
	}

	function aumentarPrecioPorCategoria(id) {

    	let aumento = document.getElementById('txtAumentoCategoria').value
    	let idAumento = document.getElementById('idAumentoCategoria').value

	    $.ajax({
	        type: 'GET',
	        url : 'json/aumentoMasivoPorRecurso.php',
	        data: {
	        	'aumento': aumento,
	        	'idAumento': idAumento,
	        	'idDondeAumentar': id
	        },
            success: function(data){
            	console.log(data);
                if (data == true) {
	                console.log(data);
	                alert('Aumentado');
            	}
            }
	    })
	}

</script>

</body>
</html>