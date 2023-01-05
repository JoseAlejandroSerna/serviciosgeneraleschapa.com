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

            $this->view(VIEW_ADMIN,array(
                "view" => VIEW_ADMIN
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, ACCION_INDEX);
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION['idUser']         = VALUE_ZERO;
        $_SESSION['idTypeUser']     = VALUE_ZERO;
        $_SESSION['vUser']          = "";
        $_SESSION['vPassword']      = "";

        $this->redirect(CONTROLADOR_MAIN, ACCION_INDEX);
    }

}
?>
