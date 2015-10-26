<?php
class Controlador{

	private $parametros;


	protected function cargarModelo($nombreModelo, $param=null){
		//la primera letra sea mayúscula y todas las demás sean minúsculas
		$nombreModelo=ucfirst(strtolower($nombreModelo));
     	$urlFile = 'modelos/'.$nombreModelo.'.php';
     	if(file_exists($urlFile)){
     		include_once $urlFile;
     		$class = $nombreModelo;
            if($param==null){
         		$model = new $class();
            }
            else{ 
                $model = new $class($param);
            }
     		return $model;
     	}else{
     		return null;
     	}
	}
    
    protected function cargarVista($nombreVista){
    	//la primera letra sea mayúscula y todas las demás sean minúsculas
		$nombreVista=ucfirst(strtolower($nombreVista));
     	$urlFile = 'vistas/'.$nombreVista.'.php';
     	if(file_exists($urlFile)){
     		require_once($urlFile) ;
     		return true;
     	}else{
     		return false;
     	}
    }


	public function getParametros(){
		return $this->parametros;
	}

	public function setParametros($parametros){
		$this->parametros=$parametros;
	}
} 
?>