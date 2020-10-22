<?php

require_once "../../../clases/Usuario.php";

$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

$usuario = Usuario::login($username, $password);



if ($usuario->estaLogueado()) {
	$idPerfil = $usuario->perfil->getIdPerfil();	
	session_start();
	$_SESSION['usuario'] = $usuario;

	if ($idPerfil == 1) {
		header("location: ../../dashboard/dashboard.php");
	} else {
		header("location: ../../../inicio.php");	
	}

} else {
	header("location: ../../../formulario_login.php?mensaje="."usuario y/o contraseña incorrecto!");
	
}

?>