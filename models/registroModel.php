<?php 

class RegistroUsuarios{

	// Atributos
	private $usuario;
	private $pass;
	// Metodos
	public function getUsuario(){
		return $this->usuario;
	}
	public function getPass(){
		return $this->pass;
	}

	// Validar, que el usuario no exista
	public function validarUsuario($conexion, $usuario){
		$this->usuario = $usuario;
		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(
			':usuario' => $usuario
		));
		$result = $statement->fetch();
		return $result;
	}

	// Agregar usuario
	public function agregarUsuario($conexion, $usuario, $pass){
		$this->usuario = $usuario;
		$this->pass = $pass;

		$statement = $conexion->prepare('INSERT INTO usuarios (usuario, pass) VALUES(:usuario, :pass)');
		$statement->execute(array(
			':usuario' => $usuario,
			':pass' => $pass
		));
	}
}

?>