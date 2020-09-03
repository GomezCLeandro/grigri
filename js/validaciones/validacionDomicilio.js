function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var barrio = document.getElementById("cboBarrio").value;
	var calle = document.getElementById("txtCalle").value;
	var altura = document.getElementById("txtAltura").value;
	var casa = document.getElementById("txtCasa").value;
	var manzana = document.getElementById("txtManzana").value;
	var descripcion = document.getElementById("txtDescripcion").value;

	if (barrio == 0) {
		divMensajeError.innerHTML = "<font color='red'> Debe selecionar un barrio js</font><br><br>";
		return;
	}
	if (calle.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> La calle no debe estar vacio js</font><br><br>";
		return;
	}
	if (calle.length < 5) {
		divMensajeError.innerHTML = "<font color='red'> EL nombre de la calle debe contener al menos 5 caracteres js</font><br><br>";
		return;
	}	
	if (altura < 1) {
		divMensajeError.innerHTML = "<font color='red'> Altura muy bajo js</font><br><br>";
		return;
	}
	if (casa < 1) {
		divMensajeError.innerHTML = "<font color='red'> Casa muy bajo js</font><br><br>";
		return;
	}
	if (manzana < 1) {
		divMensajeError.innerHTML = "<font color='red'> Manzana muy bajo js</font><br><br>";
		return;
	}
	if (descripcion.length < 5) {
		divMensajeError.innerHTML = "<font color='red'> La descripcion debe contener al menos 5 caracteres js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}