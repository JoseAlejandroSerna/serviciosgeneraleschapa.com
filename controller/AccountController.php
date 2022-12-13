<?php
class AccountController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        if (isset($_SESSION['idLanguage'])) {   $id_language = $_SESSION['idLanguage'];     }
        else{                                   $_SESSION['idLanguage'] = LENGUAGE_DEFAULT; }
        
        //Busca lenguaje
        $languages=new LanguagesModel($this->adapter);
        $languages->idLanguage = $_SESSION['idLanguage'];

        $alllenguages=$languages->getAll();

        //Informacion de menu,car y cont Main 
        $info_menu=$languages->get_info_menu();
        $info_car=$languages->get_info_car();
        $info_account=$languages->get_info_account();

        //Informacion de redes sociales de DB
        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Busca todos los usuarios
        $users = new UserModel($this->adapter);
        $all_user = $users->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("account",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
			"account" => $info_account,
            "all_user" => $all_user,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_ACCOUNT
        ));
    }
    
    public function create(){

        $idPermissions = "1";
        $userModel                  = new UserModel($this->adapter);
        $userModel->vUser           = $_POST["hdn_name"];
        $userModel->vEmail          = $_POST["hdn_email"];
        $userModel->vPassword       = $_POST["hdn_password"];
        $userModel->vPhone          = $_POST["hdn_phone"];
        $userModel->vAddress        = $_POST["hdn_address"];
        $userModel->vCP             = $_POST["hdn_cp"];
        $userModel->vComent         = $_POST["hdn_coment"];
        $userModel->idPermissions   = $idPermissions;
        
        $userModel->create();

        $sendingSettingsModel       = new SendingSettingsModel($this->adapter);
        $info_sendingSettings       = $sendingSettingsModel->getAll();
        $vSending = "0";
        $vCommission = "0";

        foreach($info_sendingSettings as $sendingSettings) {
            $vSending       = $sendingSettings->vSending;
            $vCommission    = $sendingSettings->vCommission;
        }

        if($userModel->exist())
        {
            $arrUser = $userModel->get_login();

            foreach($arrUser as $user) {

                session_start();

                $_SESSION['idUser']         = $user->idUser;
                $_SESSION['idPermissions']  = $user->idPermissions;
                $_SESSION['vUser']          = $user->vUser;
                $_SESSION['vEmail']         = $user->vEmail;
                $_SESSION['vPassword']      = $user->vPassword;
                $_SESSION['vPhone']         = $user->vPhone;
                $_SESSION['vAddress']       = $user->vAddress;
                $_SESSION['vCP']            = $user->vCP;
                $_SESSION['vComent']        = $user->vComent;
                $_SESSION['iStatus']        = $user->iStatus;

                
                $_SESSION['vSending']       = $vSending;
                $_SESSION['vCommission']    = $vCommission;

                $this->redirect(CONTROLADOR_MAIN, "index");
            }
        }
        else{
            $this->redirect(CONTROLADOR_ACCOUNT, "index");
        }
    }

}
?>
