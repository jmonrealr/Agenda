<?php session_start(); 

require 'config/Config.php';
require 'config/Conexion.php';
// Comprueba que no exista la session para incluir el login
if (!isset($_SESSION['usuario'])) {
	// echo "No hay sesión";
	switch (@$_GET['c']) {
		case 'registro':
			require 'controllers/loginController.php';
			break;
		default:
			require 'controllers/loginController.php';
			break;
	}
} else {
	require 'Controllers/indexController.php';
}

?>