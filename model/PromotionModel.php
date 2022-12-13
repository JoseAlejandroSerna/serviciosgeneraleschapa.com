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
    public $idTypePromotion = "0";
    public $vPromotion = "";
    public $vDiscount = "";
    public $iCountPurchase = "0";
    public $iTotalPurchase = "";
    public $iStatus = "0";

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idPromotion");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll_active(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE iStatus = 1");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idPromotion,idTypePromotion,vPromotion,vDiscount,iCountPurchase,iTotalPurchase,iStatus) 
                VALUES(NULL,
                        $this->idTypePromotion,
                        '$this->vPromotion',
                        '$this->vDiscount',
                        $this->iCountPurchase,
                        $this->iTotalPurchase,
                        $this->iStatus);";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                idTypePromotion = $this->idTypePromotion, 
                vPromotion = '$this->vPromotion',
                vDiscount = '$this->vDiscount',
                iCountPurchase = $this->iCountPurchase,
                iTotalPurchase = $this->iTotalPurchase,
                iStatus = $this->iStatus
                WHERE
                idPromotion = $this->idPromotion";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
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
