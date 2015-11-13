<?php
include "../concesionario/libs/Modelo.php";

session_start();

class FacturaModelo  extends Modelo {
   
function FacturaModelo(){
   parent::__construct();
}

function facturar($cedula,$placa,$horas){
try{
	  		
	  		
	        $query = "INSERT INTO factura SET cedula=?, placa=?,  horas=?";
	        $stmt = $this->conexion->prepare($query);  
	       
	         $stmt->bindParam(1, $cedula);
	         $stmt->bindParam(2, $placa);
	         $stmt->bindParam(3, $horas);
	         	
	     
	        if($stmt->execute()){
	            return "Guardo con exito";	          
	        }else{
	        	return "No guardo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }

}
}

?>