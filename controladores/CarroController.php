<?php 
include "../concesionario/libs/Controlador.php";
error_reporting(E_ALL);
class CarroController extends Controlador {

		
	public function registrar(){

		$tipocarro= $_POST["name-select-tipo-carro"];
		$marca= $_POST["name-select-marca"];
		$capacidad= $_POST["name-input-capacidad"];
		$precio= $_POST["name-input-precio"];
		$color= $_POST["name-input-color"];
		$placa= $_POST["name-input-placa"];
		$kilometraje= $_POST["name-input-kilometraje"];
		$disponibilidad= $_POST["name-select-disponibilidad"];

		$modelo=$this->cargarModelo("CarroModelo");
		//var_dump($modelo);
			$respuesta=$modelo->registrar($tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad);
			if($respuesta !=null ){
				//return $respuesta;
				print_r(json_encode(array('resultado'=>$respuesta)));
			}			
	}

	public function eliminar(){
		$placa= $_POST["name-input-placa"];
		
		$modelo=$this->cargarModelo("CarroModelo");
		$respuesta=$modelo->eliminar($placa);
		if($respuesta !=null ){
				//return $respuesta;
				print_r(json_encode(array('resultado'=>$respuesta)));
			}
		
	}


public function obtenerCarro(){
		$carroid= $_POST["name-idcarro"];
		$modelo=$this->cargarModelo("CarroModelo");
		$respuesta=$modelo->getCarro($carroid);

		foreach ($respuesta as $fila ) {
			 	//echo "entro al for";
			print_r(json_encode($fila));
			//return $fila;		
		}
		
	}

}


?>