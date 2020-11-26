function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var descripcion = document.getElementById("txtDescripcion").value;
	var precio = document.getElementById("txtPrecio").value;

	if (descripcion.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El nombre no debe estar vacio js</font><br><br>";
		return;
	}
	if (descripcion.length < 5) {
		divMensajeError.innerHTML = "<font color='red'> El nombre debe contener al menos 5 caracteres js</font><br><br>";
		return;
	}
	if (precio < 1) {
		divMensajeError.innerHTML = "<font color='red'> Precio muy bajo js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}