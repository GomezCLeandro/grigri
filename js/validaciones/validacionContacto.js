function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var contacto = document.getElementById("txtContacto").value;
	var tipoContacto = document.getElementById("cboTipoContacto").value;

	if (contacto.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El contacto no debe estar vacio js</font><br><br>";
		return;
	}
	if (contacto.length < 5) {
		divMensajeError.innerHTML = "<font color='red'> El contacto debe contener al menos 5 caracteres js</font><br><br>";
		return;
	}
	if (tipoContacto == 0) {
		divMensajeError.innerHTML = "<font color='red'> Debe selecionar el tipo contacto js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}