<?php
class LoginController extends ControladorBase{
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

        //Informacion de menu,car y contact
        $info_menu=$languages->get_info_menu();
        $info_car=$languages->get_info_car();
        $info_login=$languages->get_info_login();

        //Informacion de redes sociales de DB
        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Busca lenguaje
        $users = new UserModel($this->adapter);
        $all_user = $users->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("login",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
            "all_user"=>$all_user,
			"login" => $info_login,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_LOGIN
        ));
    }

    public function getLanguage(){
        
        $_SESSION['idLanguage'] = $_POST["idLanguage_menu"];

        $this->redirect(CONTROLADOR_LOGIN, "index");
    }

    public function login()
    {
        $idUser             = $_POST['hdn_idUser'];
        $idPermissions      = $_POST['hdn_idPermissions'];
        $vUser              = $_POST['hdn_vUser'];
        $vEmail             = $_POST['hdn_vEmail'];
        $vPassword          = $_POST['hdn_vPassword'];
        $vPhone             = $_POST['hdn_vPhone'];
        $vAddress           = $_POST['hdn_vAddress'];
        $vCP                = $_POST['hdn_vCP'];
        $vComent            = $_POST['hdn_vComent'];
        $iStatus            = $_POST['hdn_iStatus'];
    
        $sendingSettingsModel       = new SendingSettingsModel($this->adapter);
        $info_sendingSettings       = $sendingSettingsModel->getAll();
        $vSending = "0";
        $vCommission = "0";
        $vCommissionTerminal = "0";

        foreach($info_sendingSettings as $sendingSettings) {
            $vSending               = $sendingSettings->vSending;
            $vCommission            = $sendingSettings->vCommission;
            $vCommissionTerminal    = $sendingSettings->vCommissionTerminal;
        }
        
        session_start();

        $_SESSION['idUser']         = $idUser;
        $_SESSION['idPermissions']  = $idPermissions;
        $_SESSION['vUser']          = $vUser;
        $_SESSION['vEmail']         = $vEmail;
        $_SESSION['vPassword']      = $vPassword;
        $_SESSION['vPhone']         = $vPhone;
        $_SESSION['vAddress']       = $vAddress;
        $_SESSION['vCP']            = $vCP;
        $_SESSION['vComent']        = $vComent;
        $_SESSION['iStatus']        = $iStatus;

                
        $_SESSION['vSending']               = $vSending;
        $_SESSION['vCommission']            = $vCommission;
        $_SESSION['vCommissionTerminal']    = $vCommissionTerminal;

        if($idPermissions == "1")
        {
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
        else{
            $this->redirect(CONTROLADOR_ADMIN, "index");
        }
        
    }
}
?>
