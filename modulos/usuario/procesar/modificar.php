<?php

session_start();

require_once "../../../config.php";
require_once "../../../clases/Usuario.php";
require_once "../../../clases/FotoPerfil.php";

$id = $_POST['txtId'];
$username = $_POST['txtUsername'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$sexo = $_POST['txtSexo'];
$imagen = $_FILES['fileImagen'];
$cambiar = $_POST['txtCambiar'];

if (empty(trim($username))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el username";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (strlen(trim($username)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una username";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el nombre";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una nombre";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el apellido";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una apellido";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (empty(trim($sexo))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el sexo";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (strlen($sexo) != 1) {
	$_SESSION['mensaje_error'] = "Debe ingresar el sexo de 1 caracter";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty($tipoDocumento)) {
	$_SESSION['mensaje_error'] = "Debe seleccionar tipo documento";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (empty(trim($numeroDocumento))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el numero documento";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (strlen(trim($numeroDocumento)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una numero documento";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}
if (empty($fechaNacimiento)) {
	$_SESSION['mensaje_error'] = "Debe ingresar el fecha nacimiento";
	header("location: /grigri/modulos/usuario/modificar.php?id=$id");
	exit;
}

//highlight_string(var_export($cambiar,true));
//exit;

$usuario = Usuario::obtenerPorId($id);
$usuario->setUsername($username);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setNumeroDocumento($numeroDocumento);
$usuario->setSexo($sexo);

$usuario->actualizar();

$fotoPerfil = FotoPerfil::obtenerPorIdUsuario($usuario->getIdUsuario());

if ($cambiar == "true") {

	if (empty($imagen['name'])) {
		$nombreImagen = "sinfoto.jpg";

		$fotoPerfil->setFoto($nombreImagen);

	} else {
		$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);

		$nombreSinEspacios = str_replace(" ", "_", $imagen['name']);

		$fechaHora = date("dmYHis");
		$nombreImagen = $fechaHora . "_" . $nombreSinEspacios;

		$rutaImagen = "../../../images/fotoPerfil/" . $nombreImagen;

		//highlight_string(var_export($rutaImagen,true));
		//exit;

		move_uploaded_file($imagen['tmp_name'], $rutaImagen);

		$fotoPerfil->setFoto($nombreImagen);
	}
} else {
	$nombreImagen = $fotoPerfil->getFoto();
}

$fotoPerfil->actualizar();


header("location: /grigri/modulos/usuario/listado.php?id=$id");
?>