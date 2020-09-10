<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/TipoDocumento.php";

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

$tipoDocumento = TipoDocumento::obtenerPorId($user->getIdTipoDocumento());

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once '../../menu.php'; ?>
	<div class="main-content">
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-lg-9">
	                    <div>
	                        <table class="table table-borderless table-striped table-earning">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Tipo Documento</th>
										<th>Numero Documento</th>
										<th>Fecha de Nacimiento</th>
										<th>Sexo</th>
										<th>Accion</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td> <?php echo $user->getNombre(); ?> </td>
										<td> <?php echo $user->getApellido(); ?> </td>
										<td> <?php echo $tipoDocumento; ?> </td>
										<td> <?php echo $user->getNumeroDocumento(); ?> </td>
										<td> <?php echo $user->getFechaNacimiento(); ?> </td>
										<td> <?php echo $user->getSexo(); ?> </td>
										<td>
											<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $user->getIdUsuario(); ?>">Modificar</a>
											<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $user->getIdPersona(); ?>">Borrar</a>
										</td>
									</tr>
								</tbody>
							</table>

						<?php if (is_null($user->domicilio)) : ?>	    
							<br><br>

	                    	<a href="/grigri/modulos/domicilio/alta.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>" class="au-btn au-btn-icon au-btn--blue" href="alta.php">
	                        	<i class="zmdi zmdi-plus"></i>Agregar Domiclio
						    </a>

						<?php else: ?>
							<br><br>

							<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>				
									<th>Calle</th>
									<th>Altura</th>
									<th>Casa</th>
									<th>Manzana</th>				
									<th>Barrio</th>
									<th>Localidad</th>
									<th>Descripcion</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>
								<tr>				
									<td> <?php echo $user->domicilio->getCalle(); ?> </td>
									<td> <?php echo $user->domicilio->getAltura(); ?> </td>
									<td> <?php echo $user->domicilio->getCasa(); ?> </td>
									<td> <?php echo $user->domicilio->getManzana(); ?> </td>				
									<td> <?php echo $user->domicilio->barrio; ?> </td>
									<td> <?php echo $user->domicilio->barrio->localidad; ?> </td>
									<td> <?php echo $user->domicilio->getDescripcion(); ?> </td>
									<td>
										<a class="btn btn-secondary btn-sm" href="/grigri/modulos/domicilio/modificar.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>">Modificar</a>
										<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $user->getIdPersona(); ?>">Borrar</a>
									</td>
								</tr>
							</tbody>
							</table>

						<?php endif ?>

						<br><br>

	                    <div class="col-lg-6">
	                        <div class="top-campaign">
	                            <h3 class="title-3 m-b-30">Contactos</h3>
	                            <div class="table-responsive">
	                                <table class="table table-top-campaign">
										<?php foreach ($user->arrContactos as $contacto) : ?>

	                                    <tbody>
	                                        <tr>
	                                            <td> <?php echo $contacto->getDescripcion(); ?></td>
	                                            <td> <?php echo $contacto->getValor(); ?> </td>
	                                            <td>
	                                            	<a class="btn btn-warning btn-sm" href="/grigri/modulos/contacto/eliminar.php?id=<?php echo $contacto->getIdPersonaContacto(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>">borrar</a>
	                                            </td>
	                                        </tr>
										</tbody>

										<?php endforeach ?>
									</table>
								</div>
								<a href="/grigri/modulos/contacto/alta.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>" type="submit" class="btn btn-success btn-sm">
									<i class="fa fa-dot-circle-o"></i> Agregar Contacto
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
