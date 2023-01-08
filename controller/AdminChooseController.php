<?php
class AdminChooseController extends ControladorBase{
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

            $chooseModel            = new ChooseModel($this->adapter);
            $choose                 = $chooseModel->getAll();

            $this->view(VIEW_ADMIN_CHOOSE,array(
                "general"           => $general,
                "choose"            => $choose,
                "view" => VIEW_ADMIN_CHOOSE
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

        $chooseModel                            = new ChooseModel($this->adapter);
        $chooseModel->vTime                     = $_POST["vTime_new"];
        $chooseModel->vTeam                     = $_POST["vTeam_new"];
        $chooseModel->vSatisfaction             = $_POST["vSatisfaction_new"];
        $chooseModel->vEstimate                 = $_POST["vEstimate_new"];
        $chooseModel->vTimeInfo                 = $_POST["vTimeInfo_new"];
        $chooseModel->vTeamInfo                 = $_POST["vTeamInfo_new"];
        $chooseModel->vSatisfactionInfo         = $_POST["vSatisfactionInfo_new"];
        $chooseModel->vEstimateInfo             = $_POST["vEstimateInfo_new"];

        $chooseModel->create();

        $this->redirect(VIEW_ADMIN_CHOOSE, ACCION_INDEX);
    }

    public function update(){

        $chooseModel                            = new ChooseModel($this->adapter);
        $chooseModel->idChoose                  = $_POST["hdnId_update"];
        $chooseModel->vTime                     = $_POST["vTime_edit"];
        $chooseModel->vTeam                     = $_POST["vTeam_edit"];
        $chooseModel->vSatisfaction             = $_POST["vSatisfaction_edit"];
        $chooseModel->vEstimate                 = $_POST["vEstimate_edit"];
        $chooseModel->vTimeInfo                 = $_POST["vTimeInfo_edit"];
        $chooseModel->vTeamInfo                 = $_POST["vTeamInfo_edit"];
        $chooseModel->vSatisfactionInfo         = $_POST["vSatisfactionInfo_edit"];
        $chooseModel->vEstimateInfo             = $_POST["vEstimateInfo_edit"];
        
        $chooseModel->update();

        $this->redirect(VIEW_ADMIN_CHOOSE, ACCION_INDEX);
    }

    public function delete(){

        $chooseModel                            = new ChooseModel($this->adapter);
        $chooseModel->idChoose                  = $_POST["hdnId_delete"];
        
        $chooseModel->delete();

        $this->redirect(VIEW_ADMIN_CHOOSE, ACCION_INDEX);
    }

}
?>
