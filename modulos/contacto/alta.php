<?php

require_once "../../clases/TipoContacto.php";

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$listadoTipoContacto = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Contacto</title>

	<script type="text/javascript" src="../../js/validaciones/validacionContacto.js"></script>

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
                                <strong>Contacto</strong>
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
                                	<input type="hidden" name="idPersona" value='<?php echo $idPersona ?>'>
									<input type="hidden" name="idLlamada" value='<?php echo $idLlamada ?>'>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Contacto</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="txtContacto" name="txtContacto" class="form-control">
                                        </div>
                                    </div>                                                               

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="multiple-select" class=" form-control-label">Recurso</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="cboTipoContacto" id="cboTipoContacto" class="form-control">
                                            	<option value="0">Seleccionar</option>

                                                <?php foreach ($listadoTipoContacto as $tipoContacto): ?>
                                                                                             
                                                    <option value="<?php echo $tipoContacto->getIdTipoContacto(); ?>">
													    <?php echo $tipoContacto->getDescripcion(); ?>
													</option>

                                                <?php endforeach  ?>
                                            
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