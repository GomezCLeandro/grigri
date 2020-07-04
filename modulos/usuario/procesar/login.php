<?php

require_once "../../../clases/Usuario.php";

$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

$usuario = Usuario::login($username, $password);

$idPerfil = $usuario->perfil->getIdPerfil();

if ($usuario->estaLogueado()) {
	
	session_start();
	$_SESSION['usuario'] = $usuario;

	if ($idPerfil == 1) {
		header("location: ../../../dashboard.php");
	} else {
		header("location: ../../../inicio.php");	
	}

} else {
	header("location: ../../../formulario_login.php");
	
}

?>