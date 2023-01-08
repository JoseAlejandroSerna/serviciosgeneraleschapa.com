<?php
class AdminServiceDetailController extends ControladorBase{
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

            $serviceModel           = new ServiceModel($this->adapter);
            $service                = $serviceModel->getAll();
    
            $serviceDetailModel     = new ServiceDetailModel($this->adapter);
            $serviceDetail          = $serviceDetailModel->getAll();

            $this->view(VIEW_ADMIN_SERVICE_DETAIL,array(
                "general"           => $general,
                "service"           => $service,
                "serviceDetail"     => $serviceDetail,
                "view" => VIEW_ADMIN_SERVICE_DETAIL
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

    public function create(){

        $serviceDetailModel                     = new ServiceDetailModel($this->adapter);
        $serviceDetailModel->idService          = $_POST["hdnIdService_create"];
        $serviceDetailModel->vServiceDetail     = $_POST["description_new"];
        
        $serviceDetailModel->create();

        $this->redirect(CONTROLADOR_ADMIN_SERVICE_DETAIL, ACCION_INDEX);
    }

    public function update(){

        $serviceDetailModel                     = new ServiceDetailModel($this->adapter);
        $serviceDetailModel->idService          = $_POST["hdnIdService_update"];
        $serviceDetailModel->idServiceDetail    = $_POST["hdnId_update"];
        $serviceDetailModel->vServiceDetail     = $_POST["description_edit"];
        
        $serviceDetailModel->update();

        $this->redirect(CONTROLADOR_ADMIN_SERVICE_DETAIL, ACCION_INDEX);
    }

    public function delete(){

        $serviceDetailModel                     = new ServiceDetailModel($this->adapter);
        $serviceDetailModel->idServiceDetail    = $_POST["hdnId_delete"];
        
        $serviceDetailModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_SERVICE_DETAIL, ACCION_INDEX);
    }

}
?>
