<?php
class AdminOfferController extends ControladorBase{
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

            $this->view(VIEW_ADMIN_OFFER,array(
                "general"           => $general,
                "offer"             => $offer,
                "view" => VIEW_ADMIN_OFFER
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

        $offerModel                     = new OfferModel($this->adapter);
        $offerModel->vOffer             = $_POST["title_new"];
        $offerModel->iPrice             = $_POST["description_new"];
        
        $offerModel->create();

        $this->redirect(CONTROLADOR_ADMIN_OFFER, ACCION_INDEX);
    }

    public function update(){

        $offerModel                     = new OfferModel($this->adapter);
        $offerModel->idOffer            = $_POST["hdnId_update"];
        $offerModel->vOffer             = $_POST["title_edit"];
        $offerModel->iPrice             = $_POST["description_edit"];
        
        $offerModel->update();

        $this->redirect(CONTROLADOR_ADMIN_OFFER, ACCION_INDEX);
    }

    public function delete(){

        $offerModel                     = new OfferModel($this->adapter);
        $offerModel->idOffer            = $_POST["hdnId_delete"];
        
        $offerModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_OFFER, ACCION_INDEX);
    }

}
?>
