<?php
class TypePromotionModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_TYPE_PROMOTION;
        
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

    public $idTypePromotion = "0";
    public $vTypePromotion = "";

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idTypePromotion");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idTypePromotion,vTypePromotion) 
                VALUES(NULL,
                        '$this->vTypePromotion');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vTypePromotion = '$this->vTypePromotion'
                WHERE
                idTypePromotion = $this->idTypePromotion";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idTypePromotion = $this->idTypePromotion";

        $this->db()->query($query);
        
    }
}
?>
