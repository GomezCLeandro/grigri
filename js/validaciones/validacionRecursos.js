function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var recurso = document.getElementById("txtRecurso").value;

	if (recurso.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El nombre del recurso no debe estar vacio js</font><br><br>";
		return;
	}
	if (recurso.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> El nombre del recuros debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}