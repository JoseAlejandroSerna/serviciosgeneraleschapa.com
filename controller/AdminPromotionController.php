<?php
class AdminPromotionController extends ControladorBase{
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
    
            $promotionModel             = new PromotionModel($this->adapter);
            $info_promotion             = $promotionModel->getAll();
    
            $typePromotionModel         = new TypePromotionModel($this->adapter);
            $info_typePromotion         = $typePromotionModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminPromotion",array(
                "info_promotion"=>$info_promotion,
                "info_typePromotion"=>$info_typePromotion,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_PROMOTION
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        $promotionModel                     = new PromotionModel($this->adapter);
        $promotionModel->idTypePromotion    = $_POST["idTypePromotion_new"];
        $promotionModel->vPromotion         = $_POST["vPromotion_new"];
        $promotionModel->vDiscount          = $_POST["vDiscount_new"];
        $promotionModel->iCountPurchase     = $_POST["iCountPurchase_new"];
        $promotionModel->iTotalPurchase     = $_POST["iTotalPurchase_new"];
        $promotionModel->iStatus            = $_POST["iStatus_new"];
        
        $promotionModel->create();

        $this->redirect(CONTROLADOR_ADMIN_PROMOTION, "index");
    }

    public function update(){

        $promotionModel                     = new PromotionModel($this->adapter);
        $promotionModel->idPromotion        = $_POST["hdn_idPromotion"];
        $promotionModel->idTypePromotion    = $_POST["idTypePromotion"];
        $promotionModel->vPromotion         = $_POST["vPromotion"];
        $promotionModel->vDiscount          = $_POST["vDiscount"];
        $promotionModel->iCountPurchase     = $_POST["iCountPurchase"];
        $promotionModel->iTotalPurchase     = $_POST["iTotalPurchase"];
        $promotionModel->iStatus            = $_POST["iStatus"];
        
        $promotionModel->update();

        $this->redirect(CONTROLADOR_ADMIN_PROMOTION, "index");
    }

    public function delete(){

        $promotionModel                     = new PromotionModel($this->adapter);
        $promotionModel->idPromotion        = $_POST["hdn_idPromotion_delete"];
        
        $promotionModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_PROMOTION, "index");
    }
}
?>
