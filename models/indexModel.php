<?php 

class ContactoCliente extends Conexion
{
	private $usuario;
	private $nombre;
	private $apellido;
	private $phone;
	private $email;
	private $pregunta;
	private $respuesta;
	private $id;

	
	// Retornar ID
	public function getId(){
		return $this->id;		
	}

	// Retornar usuario
	public function getUsuario()
	{
		return $this->usuario;
	}	

	// Retornar nombre
	public function getNombre(){
		return $this->nombre;
	}

	// Retornar apellido
	public function getApellido(){
		return $this->apellido;
	}

	// Retornar email
	public function getEmail(){
		return $this->email;
	}

	// Retornar pregunta
	public function getPregunta(){
		return $this->pregunta;
	}

	// Retornar email
	public function getRespuesta(){
		return $this->respuesta;
	}

	// Comprobar si el usuario, tiene agregado contactos
	public function listaContacto($usuario){
		$this->usuario = $usuario;
		
		$conexion = new Conexion();
		if (!$conexion) {
			header('Location: error.php');
		}

		$statement = $conexion->prepare('SELECT * FROM contactos WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(
			':usuario' => $usuario
		));

		$result = $statement->fetch();

		// Contar las filas de la tabla contactos

		$contarFilas = $conexion->query('SELECT FOUND_ROWS() as total');
		$contarFilas = $contarFilas->fetch()['total'];
		return $contarFilas;

	}

	// Agregar nuevo contacto

	/* 
	* PASOS A SEGUIR
	* 1. Comprobar que no exista en tu agenda, otro contacto igual
	* 2. Insertar en la agenda, el nuevo contacto.
	*/


	public function validarContacto($usuario, $nombre, $apellido, $phone, $email){
		$this->usuario = $usuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->phone = $phone;
		$this->email = $email;
		$conexion = new Conexion();
		if (!$conexion) {
			header('Location: index.php');
		}

		$statement = $conexion->prepare('SELECT * FROM contactos WHERE usuario = :usuario AND nombre = :nombre AND apellido = :apellido AND phone = :phone AND email = :email LIMIT 1');
		$statement->execute(array(

			':usuario' => $usuario,
			':nombre' => $nombre,
			':apellido' => $apellido,
			':phone' => $phone,
			':email' => $email
		));

		$result = $statement->fetch();
		return $result;
	}

	// Insertar contacto

	public function EnviarContacto($usuario, $nombre, $apellido, $phone, $email){
		$this->usuario = $usuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->phone = $phone;
		$this->email = $email;

		$conexion = new Conexion();
		if (!$conexion) {
			header('Location: error.php');
		}


		$statement = $conexion->prepare('INSERT INTO contactos (usuario, nombre, apellido, phone, email) VALUES(:usuario, :nombre, :apellido, :phone, :email)');
		$statement->execute(
			array(
				':usuario' => $usuario,
				':nombre' => $nombre,
				':apellido' => $apellido,
				':phone' => $phone,
				':email' => $email
		)); 
	}

	// Mostrar contactos
	public function mostrarContactos($usuario){
		$this->usuario = $usuario;
		$conexion = new Conexion();
		if (!$conexion) {
			header('Location: error.php');
		}

		$statement = $conexion->prepare('SELECT * FROM contactos WHERE usuario = :usuario ORDER BY id DESC LIMIT 5');
		$statement->execute(array(':usuario' => $usuario));
		$results = $statement->fetchAll();
		return $results;
	}

	/* // Comprobar si la contraseña es correcta
    public function PassCorrecta($usuario, $pass){
	 	$this->usuario = $usuario;
	 	$this->pass = $pass;

	 	$conexion = new Conexion();
	 	if (!$conexion) {
	 		header('Location: error.php');
	 	}
	
	  $statement = $conexion->prepare('SELECT * FROM ');
	}
	*/ 


	// Eliminar contacto
	public function eliminar($id, $usuario){
		$this->id = $id;
		$this->usuario = $usuario;

		$conexion = new Conexion();
		if (!$conexion) {
			header('Location: error.php');
		}

		$statement = $conexion->prepare('DELETE FROM contactos WHERE id = :id AND usuario = :usuario');
		$statement->execute(array(':id' => $id, ':usuario' => $usuario));
	}
}

?>