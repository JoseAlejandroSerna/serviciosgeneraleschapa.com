<?php
class AdminGeneralController extends ControladorBase{
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

            $socialNetworksModel    = new SocialNetworksModel($this->adapter);
            $socialNetworks         = $socialNetworksModel->getAll();

            $this->view(VIEW_ADMIN_GENERAL,array(
                "general"           => $general,
                "socialNetworks"    => $socialNetworks,
                "view" => VIEW_ADMIN_GENERAL
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

    public function socialNetwork(){

        $socialNetworksModel                    = new SocialNetworksModel($this->adapter);
        $socialNetworksModel->idSocialNetworks  = VALUE_ONE;
        $socialNetworksModel->vUrlFacebook      = $_POST["facebook"];
        $socialNetworksModel->vUrlInstagram     = $_POST["instagram"];
        $socialNetworksModel->vUrlTwitter       = $_POST["twitter"];
        $socialNetworksModel->vUrlPinterest     = $_POST["pinterest"];
        
        $socialNetworksModel->update();

        $this->redirect(CONTROLADOR_ADMIN_GENERAL, ACCION_INDEX);
    }

    public function general(){

        $generalModel                       = new GeneralModel($this->adapter);
        $generalModel->idGeneral            = VALUE_ONE;
        $generalModel->vPhone               = $_POST["vPhone"];
        $generalModel->vEmail               = $_POST["vEmail"];
        $generalModel->vAddresses           = $_POST["vAddresses"];
        
        $generalModel->update();

        $this->redirect(CONTROLADOR_ADMIN_GENERAL, ACCION_INDEX);
    }

    public function logo(){

        if(!empty($_FILES["vLogo"]["tmp_name"]))
		{
            $imageName                      = basename($_FILES["vLogo"]["name"]);
            $dir                            = PATH_RESOURCES_ADMIN;
            $targetFilePath                 = $dir . $imageName;

            $generalModel                   = new GeneralModel($this->adapter);
            $generalModel->idGeneral        = VALUE_ONE;
            $generalModel->vLogo            = $imageName;
            
			$generalModel->update_logo();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["vLogo"]["tmp_name"], $targetFilePath);

            $this->redirect(CONTROLADOR_ADMIN_GENERAL, ACCION_INDEX);

		}
    }

}
?>
