<?php

require_once "../../clases/Modulo.php";

$listadoModulos = Modulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de Perfil</title>

	<script type="text/javascript" src="../../js/validaciones/validacionPerfil.js"></script>

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
                                <strong>Diseño</strong>
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
                                            <label class=" form-control-label">Descripcion</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control">
                                        </div>
                                    </div>                              

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="multiple-select" class=" form-control-label">Modulos</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="cboModulos[]" id="cboModulos" id="multiple-select" multiple="" class="form-control">

									         <?php foreach ($listadoModulos as $modulo) :?>

									         	<option value="<?php echo $modulo->getIdModulo(); ?>">
									         		<?php echo utf8_encode($modulo); ?>
									         	</option>

									         <?php endforeach ?>
                                            
                                            </select>
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