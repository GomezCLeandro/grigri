function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var usuario = document.getElementById("txtUsername").value;
	var nombre = document.getElementById("txtNombre").value;
	var apellido = document.getElementById("txtApellido").value;
	var sexo = document.getElementById("txtSexo").value;
	var tipoDocumento = document.getElementById("cboTipoDocumento").value;
	var numeroDocumento = document.getElementById("txtNumeroDocumento").value;
	var fechaNacimiento = document.getElementById("txtFechaNacimiento").value;

	if (usuario.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El nombre de usuario no debe estar vacio js</font><br><br>";
		return;
	}
	if (usuario.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> EL nombre de usuario debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}
	if (nombre.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El nombre de usuario no debe estar vacio js</font><br><br>";
		return;
	}
	if (nombre.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> EL nombre de usuario debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}
	if (apellido.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El apellido de usuario no debe estar vacio js</font><br><br>";
		return;
	}
	if (apellido.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> EL apellido de usuario debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}
	if (sexo.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El debe ingresar el sexo js</font><br><br>";
		return;
	}	
	if (sexo.length != 1) {
		divMensajeError.innerHTML = "<font color='red'> El sexo debe ser 1 caracter js</font><br><br>";
		return;
	}
	if (tipoDocumento.length == 0) {
		divMensajeError.innerHTML = "<font color='red'> Seleccione el tipo documento js</font><br><br>";
		return;
	}
	if (numeroDocumento.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El numero documento de usuario no debe estar vacio js</font><br><br>";
		return;
	}
	if (numeroDocumento.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> EL numero documento de usuario debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}
	if (fechaNacimiento.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> Seleccione una fecha de nacimiento js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}