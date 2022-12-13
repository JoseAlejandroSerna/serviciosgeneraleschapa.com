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
        
        $idQuiz = "0";
        $vQuiz = "";
        if (isset($_SESSION['idQuiz_view'])) {   $idQuiz = $_SESSION['idQuiz_view'];     }

        if (isset($_SESSION['vQuiz_view'])) {   $vQuiz  = $_SESSION['vQuiz_view'];     }

        if ($_SESSION['idPermissions'] != "1" && isset($_SESSION['idPermissions'])) {
    
            $questionsModel             = new QuestionsModel($this->adapter);
            $questionsModel->idQuiz     = $idQuiz;
            $info_questions             = $questionsModel->get_by_Quiz();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminQuestions",array(
                "info_questions"=>$info_questions,
                "idQuiz"=>$idQuiz,
                "vQuiz"=>$vQuiz,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_QUESTIONS
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        $questionsModel                 = new QuestionsModel($this->adapter);
        $questionsModel->vQuestions     = $_POST["hdn_vQuestions_create"];
        $questionsModel->idQuiz         = $_POST["hdn_idQuiz_create"];
        $questionsModel->iOrder         = $_POST["hdn_iOrder_create"];
        
        $questionsModel->create();

        $this->redirect(CONTROLADOR_ADMIN_QUESTIONS, "index");
    }

    public function update(){

        $questionsModel                 = new QuestionsModel($this->adapter);
        $questionsModel->idQuestions    = $_POST["hdn_idQuestions_update"];
        $questionsModel->vQuestions     = $_POST["hdn_vQuestions_update"];
        $questionsModel->idQuiz         = $_POST["hdn_idQuiz_update"];
        $questionsModel->iOrder         = $_POST["hdn_iOrder_update"];
        
        $questionsModel->update();

        $this->redirect(CONTROLADOR_ADMIN_QUESTIONS, "index");
    }

    public function delete(){

        $questionsModel                  = new QuestionsModel($this->adapter);
        $questionsModel->idQuestions     = $_POST["hdn_id_delete"];
        
        $questionsModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_QUESTIONS, "index");
    }
}
?>
