<?php 
include "../concesionario/libs/Controlador.php";

error_reporting(-1);
class SolicitudRentaController extends Controlador {

	public function registrar(){

		$fecha= $_POST["name-datepicker"];
		$kilometraje= $_POST["name-input-kilometraje"];
		$cliente= $_POST["name-select-clientes"];
		$id= $_POST["name-id"];

		 		$modelo=$this->cargarModelo("SolicitudRentaModelo");
				//var_dump($modelo);
					$respuesta=$modelo->registrar($fecha,$kilometraje,$cliente,$id);
					if($respuesta !=null ){
						//return $respuesta;
						print_r(json_encode(array('resultado'=>$respuesta)));
					}				
	}


	public function obtenerSelectClientes(){
		$modelo=$this->cargarModelo("SolicitudRentaModelo");
        $respuesta=$modelo->getClientes();
        $htmlTipos='<option value="" disabled selected>Seleccionar...</option>';
		foreach ($respuesta as $fila ) {
                $htmlTipos.='<option value="'.$fila["id"].'">'.$fila["cedula"].'-'.$fila["nombre"].'</option>';

        }
        print_r($htmlTipos);
     
	}




}


?>