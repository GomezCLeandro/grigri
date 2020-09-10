<?php

require_once "../../clases/Perfil.php";
require_once "../../clases/Modulo.php";

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

$listadoModulos = Modulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Perfil</title>

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

                                <form action="procesar/modificar.php" name="frmDatos" id="frmDatos" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="idPerfil" value="<?php echo $perfil->getIdPerfil(); ?>">

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Descripcion</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value="<?php echo $perfil->getDescripcion(); ?>">
                                        </div>
                                    </div>                              

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="multiple-select" class=" form-control-label">Modulos</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <select name="cboModulos[]" id="cboModulos" id="multiple-select" multiple="" class="form-control">

                                                <?php foreach ($listadoModulos as $modulo): ?>
                                                    
                                                    <?php 

                                                    $selected = '';
                                                    $idModulo = $modulo->getIdModulo();

                                                    if ($perfil->tieneModulo($idModulo)) {
                                                        $selected = "SELECTED";
                                                    }

                                                    ?>

                                                    <option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected ?> >

                                                    <?php echo utf8_encode($modulo); ?>

                                                    </option>

                                                <?php endforeach  ?>
                                            
                                            </select>
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