<?php
include "../concesionario/libs/Modelo.php";
session_start();
class CarroModelo extends Modelo{

	function CarroModelo(){
		parent::__construct();
		
	}

	function getUsuarios(){
		return $this->query("SELECT usuaid,usuanombre,usuaapellido,usuausua,usuaclave,usuacorreo,usuaestado,usuafeact,usuafecr,usuausact,usuauscr FROM usuarios");
	}

	function getUsuario($usuaid){
		return $this->query("SELECT usuaid,usuanombre,usuaapellido,usuausua,usuaclave,usuacorreo,usuaestado,usuafeact,usuafecr,usuausact,usuauscr FROM usuarios WHERE usuaid=".$usuaid);
	}

	/*function getUsuarios(){
		$sql=$this->select(array("id", "correo", "nombre", "apellido"),array("nombre"=>"sebastian"));
		return $this->query($sql);
	}*/
	
    function eliminar($placa){
     try{
     	$estado='A';
        $query="DELETE FROM carros WHERE placa=?";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(1,$placa);

           if($stmt->execute()){
	            return "Borrado con exito";	          
	        }else{
	        	return "No borro!";	        	
	        }

     }catch(PDOException $exception){
         return  "Error: " . $exception->getMessage();
     }
    }
	function registrar($tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad){
	    try{
	  		$estado='A';
	  		
	        $query = "INSERT INTO carros SET tipocarro = ?,  marca = ?, capacidad=? , preciorenta=? , color=? ,  placa=?, kilometraje=?, disponibilidad=?";
	        $stmt = $this->conexion->prepare($query);  
	       
	         $stmt->bindParam(1, $tipocarro);
	         $stmt->bindParam(2, $marca);
	         $stmt->bindParam(3, $capacidad);
	         $stmt->bindParam(4, $precio);
	         $stmt->bindParam(5, $color);
	         $stmt->bindParam(6, $placa);
	         $stmt->bindParam(7, $kilometraje);
	         $stmt->bindParam(8, $disponibilidad);		
	     
	        if($stmt->execute()){
	            return "Guardo con exito";	          
	        }else{
	        	return "No guardo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }
	}
	function actualizarUsuario($id,$nombre,$apellido,$usuario,$correo,$clave){
	    try{
	  		$estado='A';
	  		$fecha=date("Y/m/d H:i:s");
	  		$usuarioActu=$_SESSION['usuausua'];
	        $query = "UPDATE  usuarios SET usuanombre = ?, usuaapellido = ?, usuausua = ?, usuacorreo=? , usuaclave=? , usuausact=? ,usuafeact=? WHERE usuaid=?";
	        $stmt = $this->conexion->prepare($query);  
	        
	         $stmt->bindParam(1, $nombre);
	         $stmt->bindParam(2, $apellido);
	         $stmt->bindParam(3, $usuario);
	         $stmt->bindParam(4, $correo);
	         $stmt->bindParam(5, $clave);
	         $stmt->bindParam(6, $usuarioActu);
	         $stmt->bindParam(7, $fecha);
	         $stmt->bindParam(8, $id);
	         		
	     
	        if($stmt->execute()){
	            return "Actualizo con exito";	          
	        }else{
	        	return "No Actualizo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }
	}

}
?>