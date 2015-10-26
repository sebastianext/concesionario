<?php
/**
* 
*/
include "libs/Controlador.php";
class Home extends Controlador {
	
	public function index(){
		$this->cargarVista("Index");
	}

}
?>