<?php
include "../concesionario/libs/Modelo.php";
session_start();
class SolicitudRentaModelo extends Modelo{

	function SolicitudRentaModelo(){
		parent::__construct();
		
	}


	function getClientes(){
		return $this->query("SELECT id,cedula,nombre FROM clientes");
	}

	function getRentas(){
		return $this->query("SELECT id,fecha,kilometraje,cliente FROM renta");
	}

	function getRenta($id){
		return $this->query("SELECT id,fecha,kilometraje,cliente FROM renta WHERE id=".$id);
	}

	

	function registrar($fecha,$kilometraje,$cliente,$id){
	    try{
	  		
	  		
	        $query = "INSERT INTO renta SET fecha = ?,  kilometraje = ?, cliente=?";
	        $stmt = $this->conexion->prepare($query);  
	       
	         $stmt->bindParam(1, $fecha);
	         $stmt->bindParam(2, $kilometraje);
	         $stmt->bindParam(3, $cliente);	
	     
	        if($stmt->execute()){
	            return "Guardo con exito";	          
	        }else{
	        	return "No guardo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }
	}
	

	function actualizar($fecha,$kilometraje,$cliente,$id){
	    try{
	  		
	        $query = "UPDATE  renta SET fecha = ?, kilometraje=?, cliente=? WHERE id=?";
	        $stmt = $this->conexion->prepare($query);  
	        
	         $stmt->bindParam(1, $fecha);
	         $stmt->bindParam(2, $kilometraje);
	         $stmt->bindParam(3, $cliente);	
	         $stmt->bindParam(4, $id);	
	     
	        if($stmt->execute()){
	            return "Actualizo con exito";	          
	        }else{
	        	return "No Actualizo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }
	}
	function eliminar($id){
     try{

        $query="DELETE FROM renta WHERE id=?";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(1,$id);

           if($stmt->execute()){
	            return "Borrado con exito";	          
	        }else{
	        	return "No borro!";	        	
	        }

     }catch(PDOException $exception){
         return  "Error: " . $exception->getMessage();
     }
    }
}
?>