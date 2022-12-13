<?php
class MainController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){

        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "view" => CONTROLADOR_MAIN
        ));
    }
    
}
?>
