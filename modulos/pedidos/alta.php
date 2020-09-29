<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/Envio.php";
require_once "../../clases/Disenio.php";
require_once "../../clases/Servicio.php";
require_once "../../config.php";

$listadoUsuario = Usuario::obtenerTodos();
$listadoEnvio = Envio::obtenerTodos();
$listadoDisenio = Disenio::obtenerTodos();
$listadoServicio = Servicio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta Pedido</title>

	<script type="text/javascript" src="../../js/validaciones/validacionItem.js"></script>
	<script type="text/javascript" src="../../js/pedido/setCantidad.js"></script>
	<script type="text/javascript" src="../../js/pedido/calcularSubtotal.js"></script>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

	<div class="main-content">
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">	
					<div class="col-lg-12">
						<div class="card">
						    <div class="card-header">
						        <strong>Alta de Pedido</strong>
						    </div>
			                <div id="id_message_validacion" class="alert alert-danger" role="alert">
			                    Error de carga
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

						        <div class="card">
							        	<!-- fomulario de Alan -->
				                    <div class="card-body">
								        <div class=" form-control-label">

							                <div class="form-inline">

						                    	<label for="select">Usuario/Persona</label>

							                	<select name="cboUsuario" id="cboUsuario" class="form-control">
												    <option value="0">Seleccionar</option>

													<?php foreach ($listadoUsuario as $usuario): ?>

														<option value="<?php echo $usuario->getIdUsuario(); ?>">
														    <?php echo $usuario . ", " . $usuario->getApellido(). " " .$usuario->getNombre(); ?>
														</option>

													<?php endforeach ?>

												</select>

								                <label for="select" class=" form-control-label">Tipo Envio</label>

												<select name="idTipoEnvio" id="idTipoEnvio" class="form-control">
												    <option value="0">Seleccionar</option>

													<?php foreach ($listadoEnvio as $tipoEnvio): ?>

														<option value="<?php echo $tipoEnvio->getIdEnvio(); ?>">
														    <?php echo $tipoEnvio->getDescripcion(); ?>
														</option>

													<?php endforeach ?>
												</select>

								                <label for="select" class=" form-control-label">Fecha de Entrega</label>
								                    <input type="date" id="txtFechaEntrega" name="txtFechaEntrega" class="form-control">

								                <label for="email-input" class=" form-control-label">Fecha de Creacion</label>
								                    <input type="date" id="txtFechaCreacion" name="txtFechaCreacion" class="form-control">
									            
								            </div>

					                        <div class="table-responsive my-3">
					                            <table  id="tabla_detalle"  class="table table-striped table-sm">
					                            <thead>
					                                <tr>
						                                <th>Código</th>
						                                <th>Producto</th>
						                                <th>Precio</th>
						                                <th>Cantidad</th>
						                                <th>Subtotal</th>
						                                <th>Acción</th>
					                                </tr>
					                            </thead>
					                            <tbody>
					                                <tr>
					                                  
					                                </tr>
					                            </tbody>
					                            </table>
					                        </div>
					                        <div class="row row-cols-2">
					                            <div class="col">
					                            <p class="lead">Totales</p>
					                            <div class="table-responsive">
					                                <table class="table table-sm">
					                                <tbody>
					                                    <tr>
					                                    <th class="w-50">Total:</th>
					                                    <td id="id_total">$0.0</td>
					                                    </tr>
					                                </tbody>
					                                </table>
					                            </div>
					                            </div>
					                        </div>
					                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
						                        <div class="col-sm-6 mb-3">
						                            <div class="list-with-gap">
						                                <!-- control -->
														<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalDisenio">
															<i class="fa fa-list-ol" ></i>&nbsp; Listado de Diseños</button>

														<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalServicio">
			                                            	<i class="fa fa-list-ol" ></i>&nbsp; Listado de Servicios</button>

							                            <button onclick="guardarFormVentas()" class="btn btn-success has-icon ml-sm-1 mt-1 mt-sm-0" type="button">
							                            <i class="fa fa-save" data-feather="printer"></i> Guardar
							                            </button>
			                                            <!--
						                                    <div class="floating-label input-icon input-icon-right">
						                                        <i   data-feather="search"></i>
						                                        <input id="id_txt_codigo" type="text" class="form-control" id="floatingSearch" placeholder="Código del articulo">
						                                        
						                                    </div>
						                                -->
						                                <!-- control -->
						                            </div>
						                        </div>
					                        </div>
				                    	</div>
				                	</div>
				                </div>          	
					    	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- modal small usuario -->
	<div class="modal fade" id="listadoUsuario" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel">Usuarios Modal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
		            <table class="table table-striped table-sm" id="id_tabla_productos">
	                    <tbody>
		                    <thead>
		                        <tr class="text-center">
		                        	<th>Foto Perfil</th>
			                        <th>Username</th>
			                        <th>Apellido y Nombre</th>
			                        <th>Agregar</th>
		                        </tr>
		                    </thead>
							<?php foreach ($listadoUsuario as $usuario): ?>
								<tr class="text-center">
		                        	<td>
		                        		<img src="<?php echo DIR_FOTOPERFIL ?>/<?php echo $usuario->fotoPerfil->getFoto() ?>" class="rounded float-left" width="50">
		                        	</td>
		                        	<td> <?php echo $usuario; ?> </td>
		                        	<td> <?php echo $usuario->getApellido(). " " .$usuario->getNombre(); ?> </td>
		                        	<td>
			                            <button onclick="setUsuario('<?php echo $usuario->getIdUsuario(); ?>','<?php echo $usuario->fotoPerfil->getFoto(); ?>')" class="btn btn-success has-icon ml-sm-1 mt-1 mt-sm-0" type="button">
			                            <i class="fa fa-plus" data-feather="printer"></i>
			                            </button>
		                        	</td>
								</tr>

							<?php endforeach ?>
	                    </tbody>
	                </table>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal small usuario -->

	<!-- modal large disenio -->
	<div class="modal fade" id="modalDisenio" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="largeModalLabel">Listado de Diseños</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Boton para buscar
		            <input id="id_txt_buscar" class="form-control" placeholder="Buscar producto" >
		            <button onclick="buscarProductos()" class="btn btn-info">Buscar</button>
		            -->
		            <table class="table table-striped table-sm" id="id_tabla_productos">
	                    <thead>
	                        <tr class="text-center">
		                        <th>Codigo</th>
		                        <th>Diseño</th>
		                        <th>Precio</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php foreach ($listadoDisenio as $disenio) :?>
	                        <tr class="text-center" onclick="setCantidad('<?php echo $disenio->getIdItem(); ?>' , '<?php echo $disenio; ?>' , '<?php echo $disenio->getPrecio(); ?>')">
	                        	<td> <?php echo $disenio->getIdItem(); ?> </td>
	                        	<td> <?php echo $disenio; ?> </td>
	                        	<td> <?php echo $disenio->getPrecio(); ?> </td>
	                        </tr>
	                        <?php endforeach; ?>
	                    </tbody>
	                </table>
		        </div>
			</div>
		</div>
	</div>
	<!-- end modal large disenio -->
	
	<!-- modal large servicio -->
	<div class="modal fade" id="modalServicio" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="largeModalLabel">Listado de Servicios</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Boton para buscar
		            <input id="id_txt_buscar" class="form-control" placeholder="Buscar producto" >
		            <button onclick="buscarProductos()" class="btn btn-info">Buscar</button>
		            -->
		            <table class="table table-striped table-sm" id="id_tabla_productos">
	                    <thead>
	                        <tr class="text-center">
		                        <th>Codigo</th>
		                        <th>Servicio</th>
		                        <th>precio</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php foreach ($listadoServicio as $servicio) :?>
	                        <tr class="text-center" onclick="setCantidad('<?php echo $servicio->getIdItem(); ?>' , '<?php echo $servicio; ?>' , '<?php echo $servicio->getPrecio(); ?>')">
	                        	<td> <?php echo $servicio->getIdItem(); ?> </td>
	                        	<td> <?php echo $servicio; ?> </td>
	                        	<td> <?php echo $servicio->getPrecio(); ?> </td>
	                        </tr>
	                        <?php endforeach; ?>
	                    </tbody>
	                </table>
		        </div>
			</div>
		</div>
	</div>
	<!-- end modal large servicio -->
</div>
<script>

$('#id_message_validacion').hide();
function guardarFormVentas(){

	let usuario = $('#cboUsuario').val();
	let tipoEnvio = $('#idTipoEnvio').val();	
	let fechaCreacion = $('#txtFechaCreacion').val();
	let fechaEntrega = $('#txtFechaEntrega').val();

	if (detallePedido.length > 0){
	    $.ajax({
	        type: 'post',
	        url: 'procesar/guardar.php',
	        data: {  
	        	'usuario': usuario,             
	        	'tipoEnvio': tipoEnvio,
	        	'fechaCreacion': fechaCreacion,
	        	'fechaEntrega': fechaEntrega,
	        	'items': detallePedido
	        },
	        success: function(data){
	            console.log(data)
	        }
	    })
    }else{
        $('#id_message_validacion').show();
    }
}

</script>
<!--

var total = 0.0;
var detalle_ventas = []; // array

function setCantidad(id, nombre, precio){
    /*
      cargar detalle de venta
    */

	let cantidad = prompt('Ingrese la cantidad')


	console.log(nombre, cantidad, precio, id);

	console.log(isNaN(cantidad));

	if (cantidad == null || cantidad == "") {
		return false;
	}

    let subtotal = calcularSubtotal(cantidad, precio);
    let items = {}; // items del detalle
    
    items['id'] = id;
    items['cantidad'] = cantidad;

    detalle_ventas.push(items); // armando mi detalle para el envio

    $('#id_detalle_venta tr:last').after('<tr><td>' + id + '</td><td>' + nombre + '</td><td>' + cantidad + '</td><td>' + subtotal + '</td> <td class="text-right"> <i class="mr-2" data-feather="trash"></i></td></tr>')
}

function calcularSubtotal(cantidad, precio){
    let resultado = parseFloat(cantidad) * parseFloat(precio);
    total += resultado; //acumula cantidad
    $('#id_total').text('$' + total);
    return resultado;
}


-->

</body>
</html>
