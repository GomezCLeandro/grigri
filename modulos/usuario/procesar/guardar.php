<?php

session_start();

require_once "../../../config.php";
require_once "../../../clases/Usuario.php";
require_once "../../../clases/FotoPerfil.php";

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$imagen = $_FILES['fileImagen'];
$idPerfil = 2;

if (empty(trim($username))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el username";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (strlen(trim($username)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una username";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty(trim($password))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el password";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (strlen(trim($password)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una password";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el nombre";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una nombre";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el apellido";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una apellido";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty($sexo)) {
	$_SESSION['mensaje_error'] = "Debe ingresar el sexo";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (strlen($sexo) != 1) {
	$_SESSION['mensaje_error'] = "Debe ingresar el sexo de 1 caracter";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty($tipoDocumento)) {
	$_SESSION['mensaje_error'] = "Debe seleccionar tipo documento";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty(trim($numeroDocumento))) {
	$_SESSION['mensaje_error'] = "Debe ingresar el numero documento";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (strlen(trim($numeroDocumento)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una numero documento";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}
if (empty($fechaNacimiento)) {
	$_SESSION['mensaje_error'] = "Debe ingresar el fecha nacimiento";
	header("location: /grigri/modulos/usuario/alta.php");
	exit;
}

//highlight_string(var_export($imagen,true));
//exit;
if (empty($imagen['name'])) {
	$nombreImagen = "sinfoto.jpg";
} else {
	$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);

	$nombreSinEspacios = str_replace(" ", "_", $imagen['name']);

	$fechaHora = date("dmYHis");
	$nombreImagen = $fechaHora . "_" . $nombreSinEspacios;

	$rutaImagen = "../../../images/fotoPerfil/" . $nombreImagen;

	move_uploaded_file($imagen['tmp_name'], $rutaImagen);
}

$usuario = new Usuario($nombre,$apellido);
$usuario->setUsername($username);
$usuario->setPassword($password);
$usuario->setSexo($sexo);
$usuario->setIdTipoDocumento($tipoDocumento);
$usuario->setNumeroDocumento($numeroDocumento);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setIdPerfil($idPerfil);

$usuario->guardar();

$fotoPerfil = new FotoPerfil($nombreImagen);
$fotoPerfil->setIdUsuario($usuario->getidUsuario());

$fotoPerfil->guardar();

header("location: /grigri/modulos/usuario/listado.php");

?>
