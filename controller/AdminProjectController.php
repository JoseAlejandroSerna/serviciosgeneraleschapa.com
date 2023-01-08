<?php
class AdminProjectController extends ControladorBase{
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

            $projectModel           = new ProjectModel($this->adapter);
            $project                = $projectModel->getAll();

            $serviceModel           = new ServiceModel($this->adapter);
            $service                = $serviceModel->getAll();

            $this->view(VIEW_ADMIN_PROJECT,array(
                "general"           => $general,
                "project"           => $project,
                "service"           => $service,
                "view" => VIEW_ADMIN_PROJECT
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

        if(!empty($_FILES["image_new"]["tmp_name"]))
		{
            $imageName                          = basename($_FILES["image_new"]["name"]);
            $dir                                = PATH_OUR_PROJECTS_ADMIN;
            $targetFilePath                     = $dir . $imageName;

            $projectModel                        = new ProjectModel($this->adapter);
            $projectModel->idService             = $_POST["hdnIdService_create"];
            $projectModel->vProject              = $_POST["title_new"];
            $projectModel->vInformation          = $_POST["description_new"];
            $projectModel->vImage                = $imageName;
            
			$projectModel->create();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["image_new"]["tmp_name"], $targetFilePath);

            $this->redirect(VIEW_ADMIN_PROJECT, ACCION_INDEX);

		}
        else{
            $this->redirect(CONTROLADOR_MAIN, ACCION_INDEX);
        }
    }

    public function update(){

        $newImage = false;
        if(basename($_FILES["image_edit"]["name"]) != ""){ $newImage = true;}

        if($newImage){
            $imageName                      = basename($_FILES["image_edit"]["name"]);
        }
        else{
            $imageName                      = $_POST["hdnImage"];
        }

        $id                                 = $_POST["hdnId_update"];
        $dir                                = PATH_OUR_PROJECTS_ADMIN;
        $targetFilePath                     = $dir . $imageName;


        $projectModel                       = new ProjectModel($this->adapter);
        $projectModel->idService            = $_POST["hdnIdService_update"];
        $projectModel->idProject            = $id;
        $projectModel->vProject             = $_POST["title_edit"];
        $projectModel->vInformation         = $_POST["description_edit"];
        $projectModel->vImage               = $imageName;

        $projectModel->update();

        if (!is_dir($dir))
        {
            mkdir($dir, 0777);
        }
        if($newImage)
        {
            move_uploaded_file($_FILES["image_edit"]["tmp_name"], $targetFilePath);
        }

        $this->redirect(VIEW_ADMIN_PROJECT, ACCION_INDEX);
        
    }

    public function delete(){

        $projectModel                       = new ProjectModel($this->adapter);
        $projectModel->idProject            = $_POST["hdnId_delete"];
        
        $projectModel->delete();

        $this->redirect(VIEW_ADMIN_PROJECT, ACCION_INDEX);
    }

}
?>
