<?php 

	require 'models/loginModel.php';
	require 'models/registroModel.php';
	// Conexion
	$conexion = new Conexion();
	if (!$conexion) {
		header('Location: error.php');
	}

	if (!isset($_GET['c']) == 'registro') {
		// Con esta variable defino el error
		$errores = '';
		// Con este condicional, pregunto si los datos fueron enviados por el metodo post
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$usuario = $_POST['usuario'];
			$pass = $_POST['pass'];
			$pass = md5($pass);
			/* 
			* Instacio la clase usuario, que pertenece al Login
			* Obtendo mediante el método login, el usuario y luego hago sus respectivas validaciones.
			*/
			$insLogin = new Usuario;
			$obtUsuario = $insLogin->Login($conexion, $usuario, $pass);

			if (empty($usuario) OR empty($pass)) {
				$errores .= 'Ingresa todos los datos';
			} else {
				if ($obtUsuario != true) {
					$errores .= 'Datos invalidos';
				} else {
					$_SESSION['usuario'] = $usuario;
					header('Location: index.php');
				}
			}

		}

		require 'views/login/login.view.php';
	} else {
		$errores = '';
		if (isset($_GET['c']) == 'registro' && $_SERVER['REQUEST_METHOD'] == 'POST') {
			// Obtengo los datos
			$usuario = $_POST['usuario'];
			$pass = $_POST['pass'];
			$pass2 = $_POST['pass2'];
			$pass = md5($pass);
			$pass2 = md5($pass2);
			// Instanciar la clase registro usuario
			$rusuarios = new RegistroUsuarios();
			$respuesta = $_POST['respuesta'];
			// Valido los datos
			if (empty($usuario) OR empty($pass) OR empty($pass2) OR empty($respuesta)) {
				$errores .= 'Ingresa todos los datos';
			} else {
				if ($pass != $pass2) {
					$errores .= 'Las contraseñas no son iguales.';
				} elseif($respuesta != 9100) {
					$errores .= 'La repuesta no es correcta';
				} elseif($rusuarios->validarUsuario($conexion, $usuario) != false){
					$errores .= 'Lo sentimos, este usuario ya existe';
				} else {
					$rusuarios->agregarUsuario($conexion, $usuario, $pass);
					echo "<script>alert('El usuario, se ha agregado exitosamente.')</script>";
					$_SESSION['usuario'] = $usuario;
					header('Location: index.php');
				}
			}
			// Inserto los datos
			/* No debo olvidar, iniciarle directamente la session al usuario */
		}

		require 'views/registro/index.view.php';
	}

?>