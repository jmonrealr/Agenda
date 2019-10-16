<?php 

require 'models/searchModel.php';

$conexion = new Conexion();
if (!$conexion) {
	header('Location: error.php');
}

$search = $_GET['s'];
if (empty($search)) {
	header('Location: index.php?action=nuevoContacto');
}
$busqueda = new Buscador();
$resultadoBusqueda = $busqueda->ResultadoBusqueda($conexion, $search, $_SESSION['usuario']);


require 'views/home/search_result.view.php';

?>