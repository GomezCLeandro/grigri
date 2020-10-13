var total = 0.0;
var detallePedido = []; // array

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
    
    items['id'] = id;
    items['cantidad'] = cantidad;

    detallePedido.push(items); // armando mi detalle para el envio

    $('#tabla_detalle tr:last').after('<tr><td>' + id + '</td><td>' + nombre + '</td><td>' + precio +'</td><td>' + cantidad + '</td><td>' + subtotal + '</td> <td class="text-right"> <i class="mr-2" data-feather="trash"></i></td></tr>')
}