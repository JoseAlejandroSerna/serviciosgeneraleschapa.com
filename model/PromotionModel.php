<?php
class PromotionModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_PROMOTION;
        
		$this->conectar = null;
		$this->db = $adapter;
    }
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
////////////////////////////////////////////

    public $idPromotion = "0";
    public $vPromotion = "";
    public $vInformation = "";
    public $vImage = "";

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idPromotion");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idPromotion,vPromotion,vInformation,vImage) 
                VALUES(NULL,
                        '$this->vPromotion',
                        '$this->vInformation',
                        '$this->vImage');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.");
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vPromotion = '$this->vPromotion',
                vInformation = '$this->vInformation',
                vImage = '$this->vImage'
                WHERE
                idPromotion = $this->idPromotion";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idPromotion = $this->idPromotion";

        $this->db()->query($query);
        
    }
}
?>
