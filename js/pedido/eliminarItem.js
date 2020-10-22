function eliminarItem(indiceDelete, detallePedido){
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