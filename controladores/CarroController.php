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

	public function hu2(){
		$titulo= $_POST["name-titulo"];
		$autor= $_POST["name-autor"];
		$editorial= $_POST["name-editorial"];
		$pais= $_POST["name-pais"];

		$modelo=$this->cargarModelo("Libro");
		$respuesta=$modelo->getLibros($titulo,$autor,$editorial,$pais);
		$html= "<thead>
					<tr>
						<th>Titulo</th>
						<th>Editorial</th>
						<th>Autor</th>
					</tr>
				</thead>";
			
			foreach ($respuesta as $fila ) {
			 	
			 

				$html.= "<tr>";
					$html.= "<td>".$fila["titulo"]."</td>";
					$html.= "<td>".$fila["editorial"]."</td>";
					$html.= "<td>".$fila["autor"]."</td>";
				$html.= "</tr>";
			}
		print_r(json_encode(array('tabla'=>$html)));
		
	}

	public function hu3(){
		$libro= $_POST["name-libro"];
		$puntaje= $_POST["name-puntaje"];

		$modelo=$this->cargarModelo("Libro");
		$respuesta=$modelo->cambiarPuntaje($libro,$puntaje);
		
		if($respuesta !=null ){
		
			print_r(json_encode(array('resultado'=>$respuesta)));
		}
		
	}
	public function obtenerLibrosSelect(){
		$modelo=$this->cargarModelo("Libro");
		$respuesta=$modelo->getLibrosSelect();
		$html='<option value="" disabled selected>Seleccionar...</option>';
		foreach ($respuesta as $fila ) {
                $html.="<option value='".$fila["codigo"]."'>".$fila["titulo"]."</option>";

        }
        print_r($html);
	}

	public function agregarComentario(){
		$libro= $_POST["name-libro"];
		$comentario= $_POST["name-comentario"];

		$modelo=$this->cargarModelo("Libro");
		$respuesta=$modelo->agregarComentario($libro,$comentario);
		
		if($respuesta !=null ){
			print_r(json_encode(array('resultado'=>$respuesta)));
		}
	}
}


?>