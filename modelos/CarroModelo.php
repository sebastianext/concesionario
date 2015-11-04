<?php
include "../concesionario/libs/Modelo.php";
session_start();
class CarroModelo extends Modelo{

	function CarroModelo(){
		parent::__construct();
		
	}

	function getCarros(){
		return $this->query("SELECT c.id id,t.nombre tipocarro,m.nombre marca, capacidad, preciorenta, color, placa, kilometraje, disponibilidad FROM carros c,marcas m,tiposcarros t where c.marca=m.id and c.tipocarro=t.id");
	}

	function getMarcas(){
		return $this->query("SELECT id,nombre FROM marcas");
	}

	function getTipos(){
		return $this->query("SELECT id,nombre FROM tiposcarros");
	}

	function getCarro($carroid){
		return $this->query("SELECT id,tipocarro,marca, capacidad, preciorenta, color,  placa, kilometraje, disponibilidad FROM carros WHERE id=".$carroid);
	}

	
    function eliminar($placa){
     try{

        $query="DELETE FROM carros WHERE id=?";
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
	/*function registrar($tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad,$foto,$tipofoto){
	    try{
	  		$estado='A';
	  		
	        $query = "INSERT INTO carros SET tipocarro = ?,  marca = ?,foto = ?,tipofoto= ?, capacidad=? , preciorenta=? , color=? ,  placa=?, kilometraje=?, disponibilidad=?";
	        $stmt = $this->conexion->prepare($query);  
	       
	         $stmt->bindParam(1, $tipocarro);
	         $stmt->bindParam(2, $marca);
	         $stmt->bindParam(3, $foto);
	         $stmt->bindParam(4, $tipofoto);
	         $stmt->bindParam(5, $capacidad);
	         $stmt->bindParam(6, $precio);
	         $stmt->bindParam(7, $color);
	         $stmt->bindParam(8, $placa);
	         $stmt->bindParam(9, $kilometraje);
	         $stmt->bindParam(10,$disponibilidad);		
	     
	        if($stmt->execute()){
	            return "Guardo con exito";	          
	        }else{
	        	return "No guardo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }
	}*/

	function registrar($tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad){
	    try{
	  		
	  		
	        $query = "INSERT INTO carros SET tipocarro = ?,  marca = ?, capacidad=? , preciorenta=? , color=? ,  placa=?, kilometraje=?, disponibilidad=?";
	        $stmt = $this->conexion->prepare($query);  
	       
	         $stmt->bindParam(1, $tipocarro);
	         $stmt->bindParam(2, $marca);
	         $stmt->bindParam(3, $capacidad);
	         $stmt->bindParam(4, $precio);
	         $stmt->bindParam(5, $color);
	         $stmt->bindParam(6, $placa);
	         $stmt->bindParam(7, $kilometraje);
	         $stmt->bindParam(8,$disponibilidad);		
	     
	        if($stmt->execute()){
	            return "Guardo con exito";	          
	        }else{
	        	return "No guardo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }
	}

	function actualizar($id,$tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad/*,$foto,$tipofoto*/){
	    try{
	  		
	        $query = "UPDATE  carros SET tipocarro = ?,  marca = ?, capacidad=? , preciorenta=? , color=? ,  placa=?, kilometraje=?, disponibilidad=? WHERE id=?";
	        $stmt = $this->conexion->prepare($query);  
	        
	         $stmt->bindParam(1, $tipocarro);
	         $stmt->bindParam(2, $marca);
	         $stmt->bindParam(3, $capacidad);
	         $stmt->bindParam(4, $precio);
	         $stmt->bindParam(5, $color);
	         $stmt->bindParam(6, $placa);
	         $stmt->bindParam(7, $kilometraje);
	         $stmt->bindParam(8, $disponibilidad);	
	         $stmt->bindParam(9, $id);	
	     
	        if($stmt->execute()){
	            return "Actualizo con exito";	          
	        }else{
	        	return "No Actualizo!";	        	
	        }
	  
	    }catch(PDOException $exception){ 
	        return  "Error: " . $exception->getMessage();
	    }
	}
	function actualizarUsuario($id,$nombre,$apellido,$usuario,$correo,$clave){
	    try{
	  		
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