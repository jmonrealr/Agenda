<?php 

require 'models/indexModel.php';
require 'models/loginModel.php';


if (isset($_SESSION['usuario'])) {
	$contactoCliente = new contactoCliente();

	$errores = '';
	if (isset($_GET['action']) == 'nuevoContacto' && isset($_POST['enviarContacto'])) {
		@$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
		@$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
		@$apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
		@$phone = $_POST['phone'];
		@$email = $_POST['email'];

		if (empty($email)) {
			$email = 'No hay correo registrado';
		}

		if ($contactoCliente->validarContacto($usuario, $nombre, $apellido, $phone, $email) != false) {
			$errores .= 'El contacto ya existe';
		} else {
			$contactoCliente->EnviarContacto($usuario, $nombre, $apellido, $phone, $email);
			echo '<script>alert("Se ha agregado tu nuevo contacto")</script>';

		}

	} elseif(isset($_GET['action']) == 'config' && isset($_POST['cambiarRespuesta'])) {
		
	}

	require 'views/home/index.view.php';
} else {
	 header('Location: index.php');
}

?>