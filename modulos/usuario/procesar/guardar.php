<?php

require_once "../../../clases/Usuario.php";;

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$sexo = $_POST['txtSexo'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];

if (empty(trim($username))) {
	echo "ERROR CAMPO USERNAME VACIO";
	exit;
}
if (empty(trim($password))) {
	echo "ERROR CAMPO PASSWORD VACIO";
	exit;
}
if (empty(trim($nombre))) {
	echo "ERROR CAMPO NOMBRE VACIO";
	exit;
}
if (empty(trim($apellido))) {
	echo "ERROR CAMPO APELLIDO VACIO";
	exit;
}
if (empty(trim($sexo))) {
	echo "ERROR CAMPO SEXO VACIO";
	exit;
}
if (empty(trim($numeroDocumento))) {
	echo "ERROR CAMPO NUMERO DOCUMENTO VACIO";
	exit;
}
if (empty(trim($fechaNacimiento))) {
	echo "ERROR CAMPO FECHA NACIMIENTO VACIO";
	exit;
}

$usuario = new Usuario($nombre,$apellido);
$usuario->setUsername($username);
$usuario->setPassword($password);
$usuario->setSexo($sexo);
$usuario->setNumeroDocumento($numeroDocumento);
$usuario->setFechaNacimiento($fechaNacimiento);

/*
highlight_string(var_export($usuario,true));
exit;
*/

$usuario->guardar();

header("location: /grigri/modulos/usuario/listado.php");

?>
