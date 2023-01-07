<?php
class AdminController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){

        session_start();
        
        if ($_SESSION['idTypeUser'] == TYPE_USER_ADMINISTRADOR && isset($_SESSION['idTypeUser'])) {

            $generalModel           = new GeneralModel($this->adapter);
            $general                = $generalModel->getAll();

            $this->view(VIEW_ADMIN,array(
                "general"           => $general,
                "view" => VIEW_ADMIN
            ));
        }
        else{
            unset($_SESSION['idUser']);
            unset($_SESSION['idTypeUser']);
            unset($_SESSION['vUser']);
            unset($_SESSION['vPassword']);

            $this->redirect(CONTROLADOR_MAIN, ACCION_INDEX);
        }
    }

    public function logout()
    {
        session_start();
        
        unset($_SESSION['idUser']);
        unset($_SESSION['idTypeUser']);
        unset($_SESSION['vUser']);
        unset($_SESSION['vPassword']);

        $this->redirect(CONTROLADOR_MAIN, ACCION_INDEX);
    }

}
?>
