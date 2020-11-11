<?php

class modeloNotas {

	private $pdo;

	public function __CONSTRUCT()
	{
		require_once "inc/dbConnect.php";
		try {
			$this->pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(Exception $e) {
			echo "Error de conexion con " . $hostname . "<br />";
			echo "usando al usuario " . $username . "<br />";
			die($e->getMessage());
		}
	}

	function obtenerDatos($id)
	{
		try {
			$sql = "SELECT * FROM estudiante WHERE id_usu = ? ";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);

			$stm->execute(array($id));
			$resultSet = $stm->fetch(PDO::FETCH_ASSOC);
			return $resultSet;
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function modificar($id,$n1,$n2,$n3)  
	{
		try {
			$sql  = "UPDATE estudiante SET 
					n1=?,n2=?,n3=?
					WHERE id_usu = ? "; 
			$stm = $this->pdo->prepare($sql);
			$resultSet = $stm->execute([$n1,$n2,$n3,$id]);
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function insertar($id,$n1,$n2,$n3) 
	{
		try {
			$sql  = "INSERT INTO estudiante (id_usu,n1,n2,n3) VALUES (?,?,?,?) ";
			$stm = $this->pdo->prepare($sql);
			$resultSet = $stm->execute([$id,$n1,$n2,$n3]);
		
			return $resultSet;
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
}
?>