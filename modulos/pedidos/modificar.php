<?php

require_once '../../clases/Pedido.php';
require_once "../../clases/Usuario.php";
require_once "../../clases/Envio.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/Disenio.php";
require_once "../../clases/Servicio.php";
require_once '../../clases/DetallePedido.php';

$id = $_GET['id'];

$listadoDisenio = Disenio::obtenerTodos();
$listadoServicio = Servicio::obtenerTodos();

$pedido = Pedido::obtenerPorId($id);

$listadoUsuario = Usuario::obtenerTodos();
$listadoEnvio = Envio::obtenerTodos();
$listadoEstadoPedido = EstadoPedido::obtenerTodos();

//highlight_string(var_export($detallePedido, true));
//exit;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Pedido</title>

	<script type="text/javascript" src="../../js/validaciones/validacionModulos.js"></script>
	<script type="text/javascript" src="../../js/pedido/guardarModificar.js"></script>
	<!--<script type="text/javascript" src="../../js/pedido/setCantidad.js"></script>-->
	<script type="text/javascript" src="../../js/pedido/calcularSubtotal.js"></script>
	<script type="text/javascript" src="../../js/pedido/eliminarItem.js"></script>

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
						        <strong>Modificar de Pedido</strong>
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

								<input type="hidden" name="txtIdPedido" id="txtIdPedido" value="<?php echo $pedido->getIdPedido(); ?>">
									
					            <div class="row form-group">
					                <div class="col col-md-3">
					                    <label for="select" class=" form-control-label">Usuario / Persona</label>
					                </div>
					                <div class="col-12 col-md-9">
					                	<select name="idUsuario" id="cboUsuario" class="form-control">
										    <option value="0">Seleccionar</option>

											<?php foreach ($listadoUsuario as $cboUsuario):
												$selected = '';
												if ($pedido->getIdUsuario() == $cboUsuario->getIdUsuario()) {
													$selected = "SELECTED";
												}
											?>
												<option value="<?php echo $cboUsuario->getIdUsuario(); ?>" <?php echo $selected; ?> >
												    <?php echo $cboUsuario. ": " .$cboUsuario->getApellido(). ", " .$cboUsuario->getNombre(); ?>
												</option>

											<?php endforeach ?>
										</select>
					                </div>
					            </div>
					            <div class="row form-group">
					                <div class="col col-md-3">
					                    <label for="select" class=" form-control-label">Tipo Envio</label>
					                </div>
					                <div class="col-12 col-md-9">
										<select name="cboEnvio" id="idTipoEnvio" class="form-control">
										    <option value="0">Seleccionar</option>

											<?php foreach ($listadoEnvio as $cboEnvio):
												$selected = '';
												if ($pedido->getIdEnvio() == $cboEnvio->getIdEnvio()) {
													$selected = "SELECTED";
												}
											?>
												<option value="<?php echo $cboEnvio->getIdEnvio(); ?>" <?php echo $selected; ?> >
												    <?php echo $cboEnvio->getDescripcion(); ?>
												</option>

											<?php endforeach ?>
										</select>
					                </div>
					            </div>

					            <div class="row form-group">
					                <div class="col col-md-3">
					                    <label for="email-input" class=" form-control-label">Fecha de Entrega</label>
					                </div>
					                <div class="col-12 col-md-9">
					                    <input type="date" id="txtFechaEntrega" name="txtFechaEntrega" value="<?php echo $pedido->getFechaEntrega(); ?>" class="form-control">
					                    <small class="help-block form-text">Fecha de Entrega</small>
					                </div>
					            </div>
					            <div class="row form-group">
					                <div class="col col-md-3">
					                    <label for="email-input" class=" form-control-label">Fecha de Creacion</label>
					                </div>
					                <div class="col-12 col-md-9">
					                    <input type="date" id="txtFechaCreacion" name="txtFechaCreacion" value="<?php echo $pedido->getFechaCreacion(); ?>" class="form-control">
					                    <small class="help-block form-text">Fecha de Creacion</small>
					                </div>
					            </div>
					            <div class="row form-group">
					                <div class="col col-md-3">
					                    <label for="select" class=" form-control-label">Estado</label>
					                </div>
					                <div class="col-12 col-md-9">
										<select name="cboEstado" id="cboEstado" class="form-control">
										    <option value="0">Seleccionar</option>

											<?php foreach ($listadoEstadoPedido as $cboEstado):
												$selected = '';
												if ($pedido->getIdEstadoPedido() == $cboEstado->getIdEstadoPedido()) {
													$selected = "SELECTED";
												}
											?>
												<option value="<?php echo $cboEstado->getIdEstadoPedido(); ?>" <?php echo $selected; ?> >
												    <?php echo $cboEstado->getDescripcion(); ?>
												</option>

											<?php endforeach ?>
										</select>
					                </div>
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

				                            <button onclick="guardarModificar()" class="btn btn-success has-icon ml-sm-1 mt-1 mt-sm-0" type="button">
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
</body>
<script>

	$('#id_message_validacion').hide();
	var total = 0.0;
	var indice = 0;
	var detallePedido = []; // array

	$.ajax({
	    type: 'GET',
	    url : 'obtenerDetallePedidoPorId.php',
	    data: {'idPedido': $('#txtIdPedido').val() },

	    success: function(data){

	        var datosDetallePedido = JSON.parse(data);
	        console.log(datosDetallePedido);

	        for (var x=0; datosDetallePedido[x] ; x+=1) {

	          	//console.log(datosDetallePedido[x]);

	            let subtotal = calcularSubtotal(datosDetallePedido[x]._cantidad, datosDetallePedido[x].item['_precio']);

	           	let items = {}; //items del detalle

	           	items['indice'] = indice;
	            items['id'] = datosDetallePedido[x].item['_idItem'];
	            items['cantidad'] = datosDetallePedido[x]._cantidad;
			    items['precio'] = datosDetallePedido[x]._precio;
				items['subtotal'] = subtotal;

	            //console.log(items);
	        	detallePedido.push(items); //armando detalle para el envio
	        	//console.log(detallePedido);

	            $('#tabla_detalle tr:last').after('<tr id=' + indice +'><td>' + datosDetallePedido[x].item['_idItem'] + '</td><td>' + datosDetallePedido[x].item['_descripcion'] + '</td><td>$' + datosDetallePedido[x].item['_precio'] + '</td><td>' + datosDetallePedido[x]._cantidad + '</td><td>$' + subtotal + '</td><td> <button type="button" onclick="eliminarItem(' + indice + ')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td></tr>');

	            indice ++;
	        }
	    }
	})

	function setCantidad(id, nombre, precio){
	    /*
	      cargar detalle de venta
	    */

		let cantidad = prompt('Ingrese la cantidad')

		//console.log(nombre, cantidad, precio, id);

		//console.log(isNaN(cantidad));

		if (cantidad == null || cantidad == "") {
			return false;
		}

	    let subtotal = calcularSubtotal(cantidad, precio);
	    let items = {}; // items del detalle
	    
	    items['indice'] = indice;
	    items['id'] = id;
	    items['cantidad'] = cantidad;
	    items['precio'] = precio;
		items['subtotal'] = subtotal;

	    detallePedido.push(items); // armando mi detalle para el envio
	    //console.log(detallePedido);

	    $('#tabla_detalle tr:last').after('<tr id=' + indice + ' ><td >' + id + '</td><td>' + nombre + '</td><td>$' + precio +'</td><td>' + cantidad + '</td><td>$' + subtotal + 
	        '</td><td> <button type="button" onclick="eliminarItem(' + indice + ')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td></tr>');

	    indice ++;
	}

	function eliminarItem(indiceDelete){
		let respuesta=[];

		//console.log('muestro lo que voy a borrar');
		//console.log(indiceDelete);

		for (let index = 0; detallePedido[index]; index++){

			if(detallePedido[index].indice !== indiceDelete){

				respuesta.push(detallePedido[index])
				//console.log(detallePedido);
				//console.log(respuesta[index]);

			} else {

				//console.log('borra este indice');
				//console.log(index);
				$('#' + detallePedido[index].indice).remove();
				restarSubtotal(detallePedido[index].subtotal);
				//respuesta.splice(index, 1);
			}
			//console.log(detallePedido[index]);
		}
		//console.log(respuesta);
		detallePedido = respuesta;
		console.log(detallePedido);
		return detallePedido;
	}

	function restarSubtotal(precio){
	    let resultado = precio;
	    total -= resultado; //restar cantidad
	    $('#id_total').text('$' + total);
	    console.log(resultado);
	    return total;

	}

	//console.log(detallePedido);
	/*
	function eliminarItem(indiceDelete){
		let respuesta=[];
		for (let index = 0; index < detallePedido.length; index++){
			if(detallePedido[index].indice !== indiceDelete){
				respuesta.push(detallePedido[indice])
				//console.log(respuesta[index]);
			} else {
				console.log('borra este id');
				console.log(index);
				$('#' + detallePedido[index].indice).remove();
				//restarSubTotal(detallePedido[index].subtotal);
				//respuesta.splice(index, 1);
			}
		}
		//console.log(respuesta);
		detallePedido = respuesta;
		console.log(detallePedido);
		return detallePedido;		
	}
	
	function guardarModificar(){

		let idPedido = $('#txtIdPedido').val();
		let usuario = $('#cboUsuario').val();
		let tipoEnvio = $('#idTipoEnvio').val();
		let estadoPedido = $('#cboEstado').val();
		let fechaCreacion = $('#txtFechaCreacion').val();
		let fechaEntrega = $('#txtFechaEntrega').val();

		if (detallePedido.length > 0){
		    $.ajax({
		        type: 'post',
		        url: 'procesar/modificar.php',
		        data: {  
		        	'idPedido': idPedido,
		        	'usuario': usuario,             
		        	'tipoEnvio': tipoEnvio,
		        	'fechaCreacion': fechaCreacion,
		        	'fechaEntrega': fechaEntrega,
		        	'item': detallePedido,
		        	'estadoPedido' : estadoPedido
		        },
		        success: function(data){
		            console.log(data)
		        }
		    })
	    }else{
	        $('#id_message_validacion').show();
	    }
	}
	*/
</script>

</body>
</html>