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
	        	'estadoPedido' : estadoPedido,
	        	'total': total
	        },
	        success: function(data){
	            console.log(data)
	        }
	    })
    }else{
        $('#id_message_validacion').show();
    }
}