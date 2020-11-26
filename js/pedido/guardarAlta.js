function guardarAlta(){

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
	        	'items': detallePedido,
	        	'total': total
	        },
	        success: function(data){
	            console.log(data);
	        }
	    })
    }else{
        $('#id_message_validacion').show();
    }
}