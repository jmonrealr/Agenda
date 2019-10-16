<?php 

// Obtener usuarios de la base de datos
class Usuario extends Conexion
{
	// Atributos
	private $usuario;
	private $pass;
	// Retorno los datos
	public function getUsuario(){
		return $this->usuario;
	}

	public function getPass(){
		return $this->pass;
	}

	// Obtengo los datos
	public function Login($conexion, $usuario, $pass){
		$this->usuario = $usuario;
		$this->pass = $pass;

		// Consulta para obtener los datos
		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass LIMIT 1');
		$statement->execute(array(
			':usuario' => $usuario,
			':pass' => $pass
		));
		$result = $statement->fetch();
		
		return $result;
	}

}

?>