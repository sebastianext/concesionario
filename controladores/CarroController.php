<?php 
include "../concesionario/libs/Controlador.php";

error_reporting(-1);
class CarroController extends Controlador {

		/*
	public function registrar(){

		$tipocarro= $_POST["name-select-tipo-carro"];
		$marca= $_POST["name-select-marca"];
		$capacidad= $_POST["name-input-capacidad"];
		$precio= $_POST["name-input-precio"];
		$color= $_POST["name-input-color"];
		$placa= $_POST["name-input-placa"];
		$kilometraje= $_POST["name-input-kilometraje"];
		$disponibilidad= $_POST["name-select-disponibilidad"];

		// Comprobamos si ha ocurrido un error.
		if (!isset($_FILES["name-foto"]) || $_FILES["name-foto"]["error"] > 0)
		{
		    print_r( "Ha ocurrido un error.".$_FILES["name-foto"]);
		}
		else
		{
		    // Verificamos si el tipo de archivo es un tipo de name-foto permitido.
		    // y que el tamaño del archivo no exceda los 16MB
		    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		    $limite_kb = 16384;
		 
		    if (in_array($_FILES['name-foto']['type'], $permitidos) && $_FILES['name-foto']['size'] <= $limite_kb * 1024)
		    {
		        // Archivo temporal
		        $img_temporal = $_FILES['name-foto']['tmp_name'];
		 
		        // Tipo de archivo
		        $tipofoto = $_FILES['name-foto']['type'];
		 
		        // Leemos el contenido del archivo temporal en binario.
		        $fp = fopen($img_temporal, 'r+b');
		        $foto = fread($fp, filesize($img_temporal));
		        fclose($fp);
		 
		        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
		        // $foto=file_get_contents($imagen_temporal);
		 
		        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
		        $foto = mysql_escape_string($foto);
		 		$modelo=$this->cargarModelo("CarroModelo");
				//var_dump($modelo);
					$respuesta=$modelo->registrar($tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad,$foto,$tipofoto);
					if($respuesta !=null ){
						//return $respuesta;
						print_r(json_encode(array('resultado'=>$respuesta)));
					}		
		    }
		    else
		    {
		        print_r( "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.");
		    }
		}


			
	}
*/

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
					$respuesta=$modelo->registrar($tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad/*,$foto,$tipofoto*/);
					if($respuesta !=null ){
						//return $respuesta;
						print_r(json_encode(array('resultado'=>$respuesta)));
					}				
	}

	public function actualizar(){
		$id= $_POST["name-id"];
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
					$respuesta=$modelo->actualizar($id,$tipocarro,$marca,$capacidad,$precio,$color,$placa,$kilometraje,$disponibilidad/*,$foto,$tipofoto*/);
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

	public function obtenerSelectMarcas(){
		$modelo=$this->cargarModelo("CarroModelo");
		$respuesta=$modelo->getMarcas();
		$htmlMarcas='<option value="" disabled selected>Seleccionar...</option>';
		foreach ($respuesta as $fila ) {
                $htmlMarcas.="<option value='".$fila["id"]."'>".$fila["nombre"]."</option>";

        }
        $respuesta=$modelo->getTipos();
        $htmlTipos='<option value="" disabled selected>Seleccionar...</option>';
		foreach ($respuesta as $fila ) {
                $htmlTipos.='<option value="'.$fila["id"].'">'.$fila["nombre"].'</option>';

        }
        print_r($htmlMarcas);
       
	}

	public function obtenerSelectTipos(){
		$modelo=$this->cargarModelo("CarroModelo");
        $respuesta=$modelo->getTipos();
        $htmlTipos='<option value="" disabled selected>Seleccionar...</option>';
		foreach ($respuesta as $fila ) {
                $htmlTipos.='<option value="'.$fila["id"].'">'.$fila["nombre"].'</option>';

        }
        print_r($htmlTipos);
     
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
public function obtenerImagen(){
		$carroid= $_POST["name-idcarro"];
		$modelo=$this->cargarModelo("CarroModelo");
		$respuesta=$modelo->obtenerImagen($carroid);

		foreach ($respuesta as $fila ) {
			 	//echo "entro al for";
			print_r(json_encode($fila));
			//return $fila;		
		}
		
	}

}


?>