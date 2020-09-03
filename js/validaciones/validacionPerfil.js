function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var descripcion = document.getElementById("txtDescripcion").value;
	var modulos = document.getElementById("cboModulos").value;

	if (descripcion.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> La descripcion no debe estar vacio js</font><br><br>";
		return;
	}
	if (descripcion.length < 5) {
		divMensajeError.innerHTML = "<font color='red'> La descripcion debe contener al menos 5 caracteres js</font><br><br>";
		return;
	}
	if (modulos.length == 0) {
		divMensajeError.innerHTML = "<font color='red'> Seleccione modulos js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}