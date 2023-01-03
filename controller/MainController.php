<?php
class MainController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){

        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $socialNetworks = $socialNetworksModel->getAll();

        $generalModel = new GeneralModel($this->adapter);
        $general = $generalModel->getAll();

        $sliderModel = new SliderModel($this->adapter);
        $slider = $sliderModel->getAll();

        $serviceModel = new ServiceModel($this->adapter);
        $service = $serviceModel->getAll();

        $serviceDetailModel = new ServiceDetailModel($this->adapter);
        $serviceDetail = $serviceDetailModel->getAll();

        $promotionModel = new PromotionModel($this->adapter);
        $promotion = $promotionModel->getAll();

        $projectModel = new ProjectModel($this->adapter);
        $project = $projectModel->getAll();

        $chooseModel = new ChooseModel($this->adapter);
        $choose = $chooseModel->getAll();

        $offerInformationModel = new OfferInformationModel($this->adapter);
        $offerInformation = $offerInformationModel->getAll();

        $offerModel = new OfferModel($this->adapter);
        $offer = $offerModel->getAll();

        $offerDetaiModel = new OfferDetailModel($this->adapter);
        $offerDetai = $offerDetaiModel->getAll();

        $questionsModel = new QuestionsModel($this->adapter);
        $questions = $questionsModel->getAll();

        $contactModel = new ContactModel($this->adapter);
        $contact = $contactModel->getAll();

        $clientModel = new ClientModel($this->adapter);
        $client = $clientModel->getAll();

        $this->view("index",array(
			"socialNetworks"    => $socialNetworks,
			"general"           => $general,
            "slider"            => $slider,
            "service"           => $service,
            "serviceDetail"     => $serviceDetail,
            "promotion"         => $promotion,
            "project"           => $project,
            "choose"            => $choose,
            "offerInformation"  => $offerInformation,
            "offer"             => $offer,
            "offerDetai"        => $offerDetai,
            "questions"         => $questions,
            "contact"           => $contact,
            "client"            => $client,
            "view" => CONTROLADOR_MAIN
        ));
    }
    
}
?>
