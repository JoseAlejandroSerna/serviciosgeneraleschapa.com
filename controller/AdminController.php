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
        
        if ($_SESSION['idPermissions'] != "1" && isset($_SESSION['idPermissions'])) {


            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("admin",array(
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION['idUser']         = "0";
        $_SESSION['idPermissions']  = "0";
        $_SESSION['vUser']          = "";
        $_SESSION['vEmail']         = "";
        $_SESSION['vPassword']      = "";
        $_SESSION['vPhone']         = "";
        $_SESSION['vAddress']       = "";
        $_SESSION['vCP']            = "";
        $_SESSION['vComent']        = "";
        $_SESSION['iStatus']        = "";

        $this->redirect(CONTROLADOR_MAIN, "index");
    }
}
?>
