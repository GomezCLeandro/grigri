<?php

require_once '../../clases/Disenio.php';
require_once '../../clases/Recurso.php';


$id = $_GET['id'];

$disenio = Disenio::obtenerPorId($id);

$listadoRecurso = Recurso::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Diseño</title>

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

                                <form action="procesar/modificar.php" name="frmDatos" id="frmDatos" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="idDisenio" value="<?php echo $disenio->getIdDisenio(); ?>">

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Diseño</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value="<?php echo $disenio->getDescripcion(); ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Precio</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="txtPrecio" name="txtPrecio" class="form-control" value="<?php echo $disenio->getPrecio(); ?>">
                                        </div>
                                    </div>                                  

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="multiple-select" class=" form-control-label">Recurso</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="cboRecurso[]" id="cboRecurso" id="multiple-select" multiple="" class="form-control">

                                                <?php foreach ($listadoRecurso as $recurso): ?>
                                                    
                                                    <?php 
                                                    $selected = '';
                                                    $idDisenio = $disenio->getIdDisenio();

                                                    if ($recurso->tieneRecurso($idDisenio)) {
                                                        $selected = "SELECTED";
                                                    }
                                                    ?>                                                
                                                    <option value="<?php echo $recurso->getIdRecurso(); ?>" <?php echo $selected ?> >

                                                    <?php echo utf8_encode($recurso); ?>

                                                    </option>

                                                <?php endforeach  ?>
                                            
                                            </select>
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
                                        <i class="fa fa-dot-circle-o"></i> Modificar
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