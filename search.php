<?php session_start();

if (!isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

require 'config/config.php';
require 'config/Conexion.php';

require 'controllers/searchController.php';

?>