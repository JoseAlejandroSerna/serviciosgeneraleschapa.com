<?php
class AdminSliderController extends ControladorBase{
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

            $sliderModel            = new SliderModel($this->adapter);
            $slider                 = $sliderModel->getAll();

            $this->view(VIEW_ADMIN_SLIDER,array(
                "general"           => $general,
                "slider"            => $slider,
                "view" => VIEW_ADMIN_SLIDER
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
            $dir                                = PATH_SLIDES;
            $targetFilePath                     = $dir . $imageName;

            $sliderModel                        = new SliderModel($this->adapter);
            $sliderModel->vSlider               = $_POST["title_new"];
            $sliderModel->vInformation          = $_POST["description_new"];
            $sliderModel->vImage                = $imageName;
            
			$sliderModel->create();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["image_new"]["tmp_name"], $targetFilePath);

            $this->redirect(CONTROLADOR_ADMIN_SLIDER, ACCION_INDEX);

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

        $idSlider                           = $_POST["hdnIdSlider_update"];
        $dir                                = PATH_SLIDES;
        $targetFilePath                     = $dir . $imageName;


        $sliderModel                        = new SliderModel($this->adapter);
        $sliderModel->idSlider              = $idSlider;
        $sliderModel->vSlider               = $_POST["title_edit"];
        $sliderModel->vInformation          = $_POST["description_edit"];
        $sliderModel->vImage                = $imageName;

        $sliderModel->update();

        if (!is_dir($dir))
        {
            mkdir($dir, 0777);
        }
        if($newImage)
        {
            move_uploaded_file($_FILES["image_edit"]["tmp_name"], $targetFilePath);
        }

        $this->redirect(CONTROLADOR_ADMIN_SLIDER, ACCION_INDEX);
        
    }

    public function delete(){

        $sliderModel                        = new SliderModel($this->adapter);
        $sliderModel->idSlider              = $_POST["hdnIdSlider_delete"];
        
        $sliderModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_SLIDER, ACCION_INDEX);
    }

}
?>
