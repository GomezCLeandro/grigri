function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var modulo = document.getElementById("txtModulo").value;

	if (modulo.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El nombre del modulo no debe estar vacio js</font><br><br>";
		return;
	}
	if (modulo.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> El nombre del modulo debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}
