function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var subCategoria = document.getElementById("txtSubCategoria").value;
	var categoria = document.getElementById("idCategoria").value;

	if (subCategoria.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El nombre no debe estar vacio js</font><br><br>";
		return;
	}
	if (subCategoria.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> El nombre debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}
	if (categoria = null || categoria == 0) {
		divMensajeError.innerHTML = "<font color='red'> Debe seleccionar la categoria js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}