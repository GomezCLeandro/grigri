<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/TipoDocumento.php";

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();

$checkedM = "";
$checkedF = "";

if ($user->getSexo() == "M") {
	$checkedM = "checked";
} elseif ($user->getSexo() == "F") {
	$checkedF = "checked";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Usuario</title>

	<script type="text/javascript" src="../../js/validaciones/validacionUsuario2.js"></script>

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
						        <form action="procesar/modificar.php" method="post" enctype="multipart/form-data" class="form-horizontal">

						        	<input type="hidden" name="txtId" value="<?php echo $user->getIdUsuario(); ?>">

						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Username</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="email-input" name="txtUsername" placeholder="nombre de Usuario" class="form-control" value="<?php echo $user->getUsername(); ?>">
						                    <small class="help-block form-text">Escriba el nombre de Usuario</small>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Nombre</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="email-input" name="txtNombre" placeholder="nombre" class="form-control" value="<?php echo $user->getNombre(); ?>">
						                    <small class="help-block form-text">Escriba su nombre</small>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Apellido</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="email-input" name="txtApellido" placeholder="apellido" class="form-control" value="<?php echo $user->getApellido(); ?>">
						                    <small class="help-block form-text">Escriba su apellido</small>
						                </div>
						            </div>						            
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Sexo</label>
						                </div>
						                <div class="col col-md-9">
						                    <div class="form-check-inline form-check">
						                        <label for="inline-radio1" class="form-check-label ">
						                            <input type="radio" name="txtSexo" id="inline-radio1" name="inline-radios" value="M" class="form-check-input" <?php echo $checkedM; ?>>Masculino
						                        </label>
						                        <label for="inline-radio2" class="form-check-label ">
						                            <input type="radio" name="txtSexo" id="inline-radio2" name="inline-radios" value="F" class="form-check-input" <?php echo $checkedF; ?>>Femenino
						                        </label>
						                    </div>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="select" class=" form-control-label">Tipo Documento:</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <select name="cboTipoDocumento" id="select" class="form-control">
						                    	<option value="0">Seleccionar</option>
												
												<?php foreach ($listadoTipoDocumento as $tipoDocumento):
													$selected = '';
													if ($user->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
														$selected = "SELECTED";
													}
												?>
													<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>" <?php echo $selected; ?>>
													    <?php echo $tipoDocumento; ?>
													</option>

												<?php endforeach ?>
						                    </select>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Numero de documento</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="email-input" name="txtNumeroDocumento" placeholder="escriba su documento" class="form-control" value="<?php echo $user->getNumeroDocumento(); ?>">
						                    <small class="help-block form-text">Coloque el numero de documento seleccionado</small>
						                </div>
						            </div>	
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="email-input" class=" form-control-label">Fecha de Nacimiento</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="date" id="email-input" name="txtFechaNacimiento" class="form-control" value="<?php echo $user->getFechaNacimiento(); ?>">
						                    <small class="help-block form-text">Selecciones o escriba su fecha de nacimiento</small>
						                </div>
						            </div>
						            <br>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">¿Cambiar foto?</label>
						                </div>
						                <div class="col col-md-9">
						                    <div class="form-check-inline form-check">
						                        <label for="inline-radio1" class="form-check-label ">
						                            <input type="radio" name="txtCambiar" id="inline-radio1" name="inline-radios" value="true" class="form-check-input">SI
						                        </label>
						                        <label for="inline-radio2" class="form-check-label ">
						                            <input type="radio" name="txtCambiar" id="inline-radio2" name="inline-radios" value=false class="form-check-input" checked>NO
						                        </label>
						                    </div>
						                </div>
						            </div>
						            <div class="row form-group">
						                <div class="col col-md-3">
						                    <label for="file-input" class=" form-control-label">Imagen para perfil:</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="file" id="file-input" name="fileImagen" class="form-control-file">
						                </div>
						            </div>
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
			</div>
		</div>
	</div>

</div>
</body>
</html>