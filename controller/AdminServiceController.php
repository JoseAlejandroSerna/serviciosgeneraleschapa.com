<?php
class AdminServiceController extends ControladorBase{
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

            $this->view(VIEW_ADMIN_SERVICE,array(
                "general"           => $general,
                "service"           => $service,
                "serviceDetail"     => $serviceDetail,
                "view" => VIEW_ADMIN_SERVICE
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

        if(!empty($_FILES["image_new"]["tmp_name"]) && !empty($_FILES["image2_new"]["tmp_name"]))
		{
            $imageName                          = basename($_FILES["image_new"]["name"]);
            $imageName2                         = basename($_FILES["image2_new"]["name"]);
            $dir                                = PATH_SERVICE_WE_PROVIDE_ADMIN;
            $targetFilePath                     = $dir . $imageName;

            $serviceModel                       = new ServiceModel($this->adapter);
            $serviceModel->vService             = $_POST["title_new"];
            $serviceModel->vInformation         = $_POST["description_new"];
            $serviceModel->vImage               = $imageName;
            $serviceModel->vImage2              = $imageName2;
            
			$serviceModel->create();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["image_new"]["tmp_name"], $targetFilePath);
            move_uploaded_file($_FILES["image2_new"]["tmp_name"], $targetFilePath);
            $this->redirect(CONTROLADOR_ADMIN_SERVICE, ACCION_INDEX);
		}
        else{
            $this->redirect(CONTROLADOR_MAIN, ACCION_INDEX);
        }
    }

    public function update(){

        $newImage = false;
        if(basename($_FILES["image_edit"]["name"]) != ""){ $newImage = true;}

        $newImage2 = false;
        if(basename($_FILES["image2_edit"]["name"]) != ""){ $newImage2 = true;}

        if($newImage){  $imageName                      = basename($_FILES["image_edit"]["name"]);}
        else{           $imageName                      = $_POST["hdnImage"];}

        if($newImage2){  $imageName2                    = basename($_FILES["image2_edit"]["name"]);}
        else{           $imageName2                     = $_POST["hdnImage2"];}

        $idService                          = $_POST["hdnId_update"];
        $dir                                = PATH_SERVICE_WE_PROVIDE_ADMIN;
        $targetFilePath                     = $dir . $imageName;


        $serviceModel                       = new ServiceModel($this->adapter);
        $serviceModel->idService            = $idService;
        $serviceModel->vService             = $_POST["title_edit"];
        $serviceModel->vInformation         = $_POST["description_edit"];
        $serviceModel->vImage               = $imageName;
        $serviceModel->vImage2              = $imageName2;

        $serviceModel->update();

        if (!is_dir($dir))
        {
            mkdir($dir, 0777);
        }
        if($newImage)
        {
            move_uploaded_file($_FILES["image_edit"]["tmp_name"], $targetFilePath);
        }
        if($newImage2)
        {
            move_uploaded_file($_FILES["image2_edit"]["tmp_name"], $targetFilePath);
        }

        $this->redirect(CONTROLADOR_ADMIN_SERVICE, ACCION_INDEX);
        
    }

    public function delete(){

        $serviceModel                     = new ServiceModel($this->adapter);
        $serviceModel->idService            = $_POST["hdnId_delete"];
        
        $serviceModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_SERVICE, ACCION_INDEX);
    }

}
?>
