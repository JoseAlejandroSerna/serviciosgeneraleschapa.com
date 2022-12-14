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

        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $socialNetworks = $socialNetworksModel->getAll();

        $generalModel = new GeneralModel($this->adapter);
        $general = $generalModel->getAll();

        $this->view("index",array(
			"socialNetworks" => $socialNetworks,
			"general" => $general,
            "view" => CONTROLADOR_MAIN
        ));
    }
    
}
?>
