<?php
class Modelo{
	protected $conexion;
	private $host="localhost";
	private $dbname="concesionario";
	private $username="root";
	private $password="";

	/*
	private $host="localhost";
	private $dbname="prest";
	private $username="root";
	private $password="";
	*/

	protected $nombretabla="usuario";

	function __construct(){
		try {
			$this->conexion=new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
				
		} catch (Exception $e) {
			echo "Error en la Conexion ".$e->getMessage();
		}
	}
	//select * tabla
	protected function query($query){
			return $this->conexion->query($query);
	}
//---------llave--------valor
//$where=["password"=='12345']
	function select($columnas,$wheres){
		$sql='SELECT ';
		//SI VEINE VACION SE PONE EL ARTERSICO 
		if($columnas==null || sizeof($columnas)==0){
			$sql.="*";
		}else{
				$coma=" ";
				foreach ($columnas as $columna) {
					$sql.=$coma."$columna";
					$coma=",";
				}
				$sql-="FROM usuario";
				if($wheres ==null || sizeof($wheres)==0){
					return $sql;
				}else{
					foreach ($wheres as $llave => $valor) {
						//Valordar si el valor es string
						if(is_string($valor)){
							$sql.=$coma."$llave=\'$valor\' ";
						}else{
							$sql.=$coma."$llave=$valor ";
						}
						$coma="AND ";
					}
				}
			
		}
		
		return $sql;
	}
}
?>