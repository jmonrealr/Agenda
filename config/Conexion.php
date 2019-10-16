<?php 

class Conexion extends PDO 
{
	public function __construct(){
		try {
			parent::__construct('mysql:host=localhost;dbname=agenda;charset=UTF8', 'root', '');
		} catch (PDOException $e) {
			return false;
		}
	}
}

?>