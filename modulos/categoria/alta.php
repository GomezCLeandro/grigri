<!DOCTYPE html>
<html>
<head>
	<title>Alta Categoria</title>

	<script type="text/javascript" src="../../js/validaciones/validacionCategoria.js"></script>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

	<div class="main-content">
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="card">
	                <div class="card-header">
	                    <strong>Categoria</strong>
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

	                    <form action="procesar/guardar.php" method="post" id="frmDatos" class="form-inline">
	                        <div class="form-group">
	                            <label for="exampleInputName2" class="pr-1  form-control-label">nombre</label>
	                            <input type="text" id="txtCategoria" name="txtCategoria" placeholder="" required="" class="form-control">
	                        </div>
	                    </form>
	                </div>
	                <div class="card-footer">
	                    <button type="submit" class="btn btn-primary btn-sm" onclick="validarDatos()">
	                        <i class="fa fa-dot-circle-o"></i> Guardar
	                    </button>
	                </div>
	            </div>
            </div>
        </div>
    </div>

</body>
</html>