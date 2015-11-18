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
						print_r(json_encode(array('resultado'=>$respuesta,'tabla'=>$this->obtenerRentas())));
					}				
	}

	public function actualizar(){
		$fecha= $_POST["name-datepicker"];
		$kilometraje= $_POST["name-input-kilometraje"];
		$cliente= $_POST["name-select-clientes"];
		$id= $_POST["name-id"];

		$modelo=$this->cargarModelo("SolicitudRentaModelo");
				//var_dump($modelo);
					$respuesta=$modelo->actualizar($fecha,$kilometraje,$cliente,$id);
					if($respuesta !=null ){
						//return $respuesta;
						print_r(json_encode(array('resultado'=>$respuesta,'tabla'=>$this->obtenerRentas())));
					}				
	}

	public function eliminar(){
		$id= $_POST["name-id"];
		
		$modelo=$this->cargarModelo("SolicitudRentaModelo");
		$respuesta=$modelo->eliminar($id);
		if($respuesta !=null ){
				//return $respuesta;
				print_r(json_encode(array('resultado'=>$respuesta,'tabla'=>$this->obtenerRentas())));
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


	public function obtenerRentas(){
		$modelo2=$this->cargarModelo("SolicitudRentaModelo");
		$respuesta=$modelo2->getRentas();
		$html= "<thead>
					<tr>
						<th>Editar</th>
						<th>Fecha</th>
						<th>kilometraje</th>
						<th>Cliente</th>
					</tr>
				</thead>";

			foreach ($respuesta as $fila ) {
			 	//echo "entro al for";
			 	$id=trim($fila["id"]);

				$html.= "<tr>";
					$html.= "<td><i onclick='edit(&#34;".$id."&#34;);' class='material-icons'>mode_edit</i></td>";
					$html.= "<td>".$fila["fecha"]."</td>";
					$html.= "<td>".$fila["kilometraje"]."</td>";
					$html.= "<td>".$fila["cliente"]."</td>";
				$html.= "</tr>";
			}

			return $html;
	}

	public function obtenerRenta(){
		$id= $_POST["id"];
		//echo $usuaid;
		$modelo=$this->cargarModelo("SolicitudRentaModelo");
		$respuesta=$modelo->getRenta($id);
		//var_dump($respuesta);
		//print_r($respuesta);
		foreach ($respuesta as $fila ) {
			 	//echo "entro al for";
			print_r(json_encode($fila));
			//return $fila;		
		}
		
	}



}


?>