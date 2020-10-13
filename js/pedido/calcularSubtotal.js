function calcularSubtotal(cantidad, precio){
    let resultado = parseFloat(cantidad) * parseFloat(precio);
    total += resultado; //acumula cantidad
    $('#id_total').text('$' + total);
    return resultado;
}