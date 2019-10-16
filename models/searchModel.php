<?php 

class Buscador
{
	private $search;
	private $usuario;

	public function getSearch(){
		return $this->search;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function ResultadoBusqueda($conexion, $search, $usuario){
		$this->search = $search;
		$this->usuario = $usuario;


		$statement = $conexion->prepare('SELECT * FROM contactos WHERE usuario = :usuario AND nombre LIKE :busqueda OR apellido LIKE :busqueda OR phone LIKE :busqueda OR email LIKE :busqueda');
		$statement->execute(array(
			':busqueda' => "%$search%",
			':usuario' => $usuario
		));

		$results = $statement->fetchAll();
		return $results;

	}

}

?>