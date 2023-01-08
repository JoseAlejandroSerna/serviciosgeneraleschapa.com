<?php
class AdminOfferDetailController extends ControladorBase{
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

            $offerModel             = new OfferModel($this->adapter);
            $offer                  = $offerModel->getAll();
    
            $offerDetailModel       = new OfferDetailModel($this->adapter);
            $offerDetail            = $offerDetailModel->getAll();

            $this->view(VIEW_ADMIN_OFFER_DETAIL,array(
                "general"           => $general,
                "offer"             => $offer,
                "offerDetail"       => $offerDetail,
                "view" => VIEW_ADMIN_OFFER_DETAIL
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

        $offerDetailModel                       = new OfferDetailModel($this->adapter);
        $offerDetailModel->idOffer              = $_POST["hdnIdOffer_create"];
        $offerDetailModel->vOfferDetail         = $_POST["description_new"];
        
        $offerDetailModel->create();

        $this->redirect(VIEW_ADMIN_OFFER_DETAIL, ACCION_INDEX);
    }

    public function update(){


        $offerDetailModel                       = new OfferDetailModel($this->adapter);
        $offerDetailModel->idOfferDetail        = $_POST["hdnId_update"];
        $offerDetailModel->idOffer              = $_POST["hdnIdOffer_update"];
        $offerDetailModel->vOfferDetail         = $_POST["description_edit"];
        
        $offerDetailModel->update();

        $this->redirect(VIEW_ADMIN_OFFER_DETAIL, ACCION_INDEX);
    }

    public function delete(){

        $offerDetailModel                       = new OfferDetailModel($this->adapter);
        $offerDetailModel->idOfferDetail        = $_POST["hdnId_delete"];
        
        $offerDetailModel->delete();

        $this->redirect(VIEW_ADMIN_OFFER_DETAIL, ACCION_INDEX);
    }

}
?>
