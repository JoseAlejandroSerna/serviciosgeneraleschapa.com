<?php
class AdminQuestionsController extends ControladorBase{
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

            $questionsModel         = new QuestionsModel($this->adapter);
            $questions              = $questionsModel->getAll();

            $this->view(VIEW_ADMIN_QUESTIONS,array(
                "general"           => $general,
                "questions"         => $questions,
                "view" => VIEW_ADMIN_QUESTIONS
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

        $questionsModel                         = new QuestionsModel($this->adapter);
        $questionsModel->vQuestion              = $_POST["title_new"];
        $questionsModel->vResponse              = $_POST["description_new"];
        
        $questionsModel->create();

        $this->redirect(VIEW_ADMIN_QUESTIONS, ACCION_INDEX);
    }

    public function update(){

        $questionsModel                         = new QuestionsModel($this->adapter);
        $questionsModel->idQuestion             = $_POST["hdnId_update"];
        $questionsModel->vQuestion              = $_POST["title_edit"];
        $questionsModel->vResponse              = $_POST["description_edit"];
        
        $questionsModel->update();

        $this->redirect(VIEW_ADMIN_QUESTIONS, ACCION_INDEX);
    }

    public function delete(){

        $questionsModel                         = new QuestionsModel($this->adapter);
        $questionsModel->idQuestion             = $_POST["hdnId_delete"];
        
        $questionsModel->delete();

        $this->redirect(VIEW_ADMIN_QUESTIONS, ACCION_INDEX);
    }

}
?>
