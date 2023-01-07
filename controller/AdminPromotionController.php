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
        
        if ($_SESSION['idTypeUser'] == TYPE_USER_ADMINISTRADOR && isset($_SESSION['idTypeUser'])) {

            $generalModel           = new GeneralModel($this->adapter);
            $general                = $generalModel->getAll();

            $promotionModel         = new PromotionModel($this->adapter);
            $promotion              = $promotionModel->getAll();

            $this->view(VIEW_ADMIN_PROMOTION,array(
                "general"           => $general,
                "promotion"         => $promotion,
                "view" => VIEW_ADMIN_PROMOTION
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
            $dir                                = PATH_WHO_WE_ARE_ADMIN;
            $targetFilePath                     = $dir . $imageName;

            $promotionModel                     = new PromotionModel($this->adapter);
            $promotionModel->vPromotion         = $_POST["title_new"];
            $promotionModel->vInformation       = $_POST["description_new"];
            $promotionModel->vImage             = $imageName;
            
			$promotionModel->create();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["image_new"]["tmp_name"], $targetFilePath);
            $this->redirect(CONTROLADOR_ADMIN_PROMOTION, ACCION_INDEX);

            //echo "path:".$targetFilePath." | image_new:".$_FILES['image_new']['tmp_name'];
            //@move_uploaded_file($_FILES['image_new']['tmp_name'], $targetFilePath);

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

        $idPromotion                        = $_POST["hdnId_update"];
        $dir                                = PATH_WHO_WE_ARE_ADMIN;
        $targetFilePath                     = $dir . $imageName;


        $promotionModel                     = new PromotionModel($this->adapter);
        $promotionModel->idPromotion        = $idPromotion;
        $promotionModel->vPromotion         = $_POST["title_edit"];
        $promotionModel->vInformation       = $_POST["description_edit"];
        $promotionModel->vImage             = $imageName;

        $promotionModel->update();

        if (!is_dir($dir))
        {
            mkdir($dir, 0777);
        }
        if($newImage)
        {
            move_uploaded_file($_FILES["image_edit"]["tmp_name"], $targetFilePath);

            //echo "path:".$targetFilePath." | image_edit:".$_FILES['image_edit']['tmp_name'];
            //@move_uploaded_file($_FILES['image_edit']['tmp_name'], $targetFilePath);
        }

        $this->redirect(CONTROLADOR_ADMIN_PROMOTION, ACCION_INDEX);
        
    }

    public function delete(){

        $promotionModel                     = new PromotionModel($this->adapter);
        $promotionModel->idPromotion        = $_POST["hdnId_delete"];
        
        $promotionModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_PROMOTION, ACCION_INDEX);
    }

}
?>
