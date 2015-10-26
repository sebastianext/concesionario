<?php
class FrontController{
	private $controlador='Home';
	private $metodo='index';
	private $params;

	public  function index(){
		$url = $_SERVER["REQUEST_URI"];
     	$path = trim(parse_url($url, PHP_URL_PATH), "/");
     	try {
     		//se obitne la direccion y se divide para almacenarla en variables 
     		@list($appname,$controlador,$metodo,$params)=explode("/", $path,4);
     		@$params=(explode("/", $params));
               
     		if($appname!=null and $controlador!=null and $metodo!=null and $params!=null ){
     			$this->appname=$appname;
     			$this->controlador=$controlador;
     			$this->metodo=$metodo;
     			$this->params=$params;
     		}else{
     			//valores por defecto de las variables
     		}
               
     		$micontrolador=$this->cargarControlador($this->controlador);
               if ($micontrolador==null) {
                    echo "Error en el controlador!";
                    exit;
               }
               else{
                    //function_exists ( 'nombre' );
                    $micontrolador->setParametros($this->params);
                    if(method_exists($micontrolador,$this->metodo)){
                         $stringMetodo =$this->metodo;
                         $micontrolador->$stringMetodo();
                    }else{
                       echo  'El motodo o funcion '.$metodo.'no existe';
                    }
               }
     		
     	} catch (Exception $e) {
     		$e->getMessage();
     	}
	}

	function cargarControlador($controlador){
          //la primera letra sea mayúscula y todas las demás sean minúsculas
     			$controlador=ucfirst(strtolower($controlador));
     			$urlFile = 'controladores/'.$controlador.'.php';
     			if(file_exists($urlFile)){
     				include $urlFile;
     				$class = $controlador;
     				$controller = new $class();
     				return $controller;
     			}
     			else{
     				return null;
     			}
    }

	public function getControlador(){
		return $this->controlador;
	}

	public function getMetodo(){
		return $this->metodo;
	}

	public function getParams(){
		return $this->params;
	}

	public function setControlador($controlador){
		$this->controlador=$controlador;
	}

	public function setMetodo($metodo){
		$this->metodo=$metodo;
	}

	public function setParams($params){
		$this->params=$params;
	}
}

$frontController = new  FrontController();
$frontController->index();
/*
//obtiene el nombre del servidor
echo '$_SERVER[SERVER_NAME]: '.$_SERVER['SERVER_NAME']."<br>";
//obtiene el nombre de la carpeta 'URI'-> /ChatSystem/
$url = $_SERVER["REQUEST_URI"];
echo '$_SERVER["REQUEST_URI"]: '.$url."<br>";
//Elimina los / de la URI
$path = trim(parse_url($url, PHP_URL_PATH), "/");
echo 'trim(parse_url($url, PHP_URL_PATH), "/"): '.$path."<br>";
*/
?>