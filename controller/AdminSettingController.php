<?php
class AdminSettingController extends ControladorBase{
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

            $socialNetworksModel    = new SocialNetworksModel($this->adapter);
            $info_socialNetworks    = $socialNetworksModel->getAll();
            
            $sendingSettingsModel   = new SendingSettingsModel($this->adapter);
            $info_sendingSettings   = $sendingSettingsModel->getAll();

            $mainModel              = new MainModel($this->adapter);
            $info_main              = $mainModel->getAll();

            $designerModel          = new DesignerModel($this->adapter);
            $info_designer          = $designerModel->getAll();

            $notificationsModel     = new NotificationsModel($this->adapter);
            $info_notifications     = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminSetting",array(
                "info_socialNetworks" => $info_socialNetworks,
                "info_sendingSettings" => $info_sendingSettings,
                "info_main" => $info_main,
                "info_designer" => $info_designer,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_SETTING
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function socialNetwork(){

        $socialNetworksModel                    = new SocialNetworksModel($this->adapter);
        $socialNetworksModel->idSocialNetworks  = $_POST["hdn_idSocialNetworks"];
        $socialNetworksModel->vUrlFacebook      = $_POST["facebook"];
        $socialNetworksModel->vUrlInstagram     = $_POST["instagram"];
        $socialNetworksModel->vUrlTwitter       = $_POST["twitter"];
        $socialNetworksModel->vUrlPinterest     = $_POST["pinterest"];
        
        $socialNetworksModel->update();

        $this->redirect(CONTROLADOR_ADMIN_SETTING, "index");
    }

    public function sendingSettings(){

        $sendingSettingsModel                       = new SendingSettingsModel($this->adapter);
        $sendingSettingsModel->idSendingSettings    = $_POST["hdn_idSendingSettings"];
        $sendingSettingsModel->vSending             = $_POST["vSending"];
        $sendingSettingsModel->vCommission          = $_POST["vCommission"];
        $sendingSettingsModel->vCommissionTerminal  = $_POST["vCommissionTerminal"];
        
        $sendingSettingsModel->update();

        $this->redirect(CONTROLADOR_ADMIN_SETTING, "index");
    }

    public function main(){

        $dir = "assets/video/";
        if (!is_dir($dir)){ mkdir($dir, 0777);  }

        if(!empty($_FILES["vVideoSeccion1"]["tmp_name"]))
        {
            $vVideoSeccion1                 = basename($_FILES["vVideoSeccion1"]["name"]);
            $targetFilePath1                = $dir.$vVideoSeccion1;
            move_uploaded_file($_FILES["vVideoSeccion1"]["tmp_name"], $targetFilePath1);
        }else{
            $vVideoSeccion1                 = $_POST["hdn_vVideoSeccion1"];
        }

        if(!empty($_FILES["vVideoSeccion2"]["tmp_name"]))
        {
            $vVideoSeccion2                 = basename($_FILES["vVideoSeccion2"]["name"]);
            $targetFilePath2                = $dir.$vVideoSeccion2;
            move_uploaded_file($_FILES["vVideoSeccion2"]["tmp_name"], $targetFilePath2);
        }else{
            $vVideoSeccion2                 = $_POST["hdn_vVideoSeccion2"];
        }

        if(!empty($_FILES["vVideoSeccion3"]["tmp_name"]))
        {
            $vVideoSeccion3                 = basename($_FILES["vVideoSeccion3"]["name"]);
            $targetFilePath3                = $dir.$vVideoSeccion3;
            move_uploaded_file($_FILES["vVideoSeccion3"]["tmp_name"], $targetFilePath3);
        }else{
            $vVideoSeccion3                 = $_POST["hdn_vVideoSeccion3"];
        }

        if(!empty($_FILES["vVideoSeccion4"]["tmp_name"]))
        {
            $vVideoSeccion4                 = basename($_FILES["vVideoSeccion4"]["name"]);
            $targetFilePath4                = $dir.$vVideoSeccion4;
            move_uploaded_file($_FILES["vVideoSeccion4"]["tmp_name"], $targetFilePath4);
        }else{
            $vVideoSeccion4                 = $_POST["hdn_vVideoSeccion4"];
        }

        if(!empty($_FILES["vVideoSeccion5"]["tmp_name"]))
        {
            $vVideoSeccion5                 = basename($_FILES["vVideoSeccion5"]["name"]);
            $targetFilePath5                = $dir.$vVideoSeccion5;
            move_uploaded_file($_FILES["vVideoSeccion5"]["tmp_name"], $targetFilePath5);
        }else{
            $vVideoSeccion5                 = $_POST["hdn_vVideoSeccion5"];
        }

        $mainModel                          = new MainModel($this->adapter);
        $mainModel->idMain                  = $_POST["hdn_idMain"];
        $mainModel->vVideoSeccion1          = $vVideoSeccion1;
        $mainModel->vVideoSeccion2          = $vVideoSeccion2;
        $mainModel->vVideoSeccion3          = $vVideoSeccion3;
        $mainModel->vVideoSeccion4          = $vVideoSeccion4;
        $mainModel->vVideoSeccion5          = $vVideoSeccion5;
        $mainModel->iCheck1                 = $_POST["hdn_iCheck_1"];
        $mainModel->iCheck2                 = $_POST["hdn_iCheck_2"];
        $mainModel->iCheck3                 = $_POST["hdn_iCheck_3"];
        $mainModel->iCheck4                 = $_POST["hdn_iCheck_4"];
        $mainModel->iCheck5                 = $_POST["hdn_iCheck_5"];
        
        $mainModel->update();

        $this->redirect(CONTROLADOR_ADMIN_SETTING, "index");
    }

    public function designer(){

        $dir = "assets/video/";
        if (!is_dir($dir)){ mkdir($dir, 0777);  }

        if(!empty($_FILES["vVideoSeccion1_designer"]["tmp_name"]))
        {
            $vVideoSeccion1                 = basename($_FILES["vVideoSeccion1_designer"]["name"]);
            $targetFilePath1                = $dir.$vVideoSeccion1;
            move_uploaded_file($_FILES["vVideoSeccion1_designer"]["tmp_name"], $targetFilePath1);
        }else{
            $vVideoSeccion1                 = $_POST["hdn_vVideoSeccion1_designer"];
        }

        $designerModel                      = new DesignerModel($this->adapter);
        $designerModel->idDesigner          = $_POST["hdn_idDesigner"];
        $designerModel->vVideoSeccion1      = $vVideoSeccion1;
        $designerModel->vTitle              = $_POST["vTitle"];
        $designerModel->vDescription1       = $_POST["vDescription1"];
        $designerModel->vDescription2       = $_POST["vDescription2"];
        $designerModel->vFirma              = $_POST["vFirma"];
        $designerModel->iCheck1             = $_POST["hdn_iCheck_1_designer"];
        /*
        echo "idMain:".$_POST["hdn_idMain"].
        " |vVideoSeccion1:".$vVideoSeccion1.
        " |vVideoSeccion2:".$vVideoSeccion2.
        " |vVideoSeccion3:".$vVideoSeccion3.
        " |vVideoSeccion4:".$vVideoSeccion4.
        " |vVideoSeccion5:".$vVideoSeccion5.
        " |iCheck1:".$_POST["hdn_iCheck_1"];
        */
        $designerModel->update();

        $this->redirect(CONTROLADOR_ADMIN_SETTING, "index");
    }
}
?>
