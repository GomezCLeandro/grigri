<?php

require_once "../../../clases/Usuario.php";

$id = $_POST['txtId'];
$username = $_POST['txtUsername'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$sexo = $_POST['txtSexo'];

if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}

$usuario = Usuario::obtenerPorId($id);
$usuario->setUsername($username);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setNumeroDocumento($numeroDocumento);
$usuario->setSexo($sexo);

$usuario->actualizar();

?>