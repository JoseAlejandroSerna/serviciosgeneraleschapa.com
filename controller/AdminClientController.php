<?php
class AdminClientController extends ControladorBase{
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

            $clientModel            = new ClientModel($this->adapter);
            $client                 = $clientModel->getAll();

            $this->view(VIEW_ADMIN_CLIENT,array(
                "general"           => $general,
                "client"            => $client,
                "view" => VIEW_ADMIN_CLIENT
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
            $dir                                = PATH_CLIENTS_ADMIN;
            $targetFilePath                     = $dir . $imageName;

            $clientModel                        = new ClientModel($this->adapter);
            $clientModel->vClient               = $_POST["title_new"];
            $clientModel->vImage                = $imageName;
            
			$clientModel->create();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["image_new"]["tmp_name"], $targetFilePath);

            $this->redirect(VIEW_ADMIN_CLIENT, ACCION_INDEX);

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
        $dir                                = PATH_CLIENTS_ADMIN;
        $targetFilePath                     = $dir . $imageName;

        $clientModel                        = new ClientModel($this->adapter);
        $clientModel->idClient              = $_POST["hdnId_update"];
        $clientModel->vClient               = $_POST["title_edit"];
        $clientModel->vImage                = $imageName;

        $clientModel->update();

        if (!is_dir($dir))
        {
            mkdir($dir, 0777);
        }
        if($newImage)
        {
            move_uploaded_file($_FILES["image_edit"]["tmp_name"], $targetFilePath);
        }

        $this->redirect(VIEW_ADMIN_CLIENT, ACCION_INDEX);
        
    }

    public function delete(){

        $clientModel                        = new ClientModel($this->adapter);
        $clientModel->idClient              = $_POST["hdnId_delete"];
        
        $clientModel->delete();

        $this->redirect(VIEW_ADMIN_CLIENT, ACCION_INDEX);
    }

}
?>
