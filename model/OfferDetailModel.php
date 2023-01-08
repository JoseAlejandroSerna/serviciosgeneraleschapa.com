<?php
class OfferDetailModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_OFFER_DETAIL;
        
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

    public $idOfferDetail = "0";
    public $idOffer = "0";
    public $vOfferDetail = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idOfferDetail = $this->idOfferDetail");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idOfferDetail,idOffer,vOfferDetail) 
                VALUES(NULL,
                       '$this->idOffer',
                       '$this->vOfferDetail');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.");
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                idOffer = '$this->idOffer',
                vOfferDetail = '$this->vOfferDetail'
                WHERE
                idOfferDetail = $this->idOfferDetail";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idOfferInformation = $this->idOfferDetail";

        $this->db()->query($query);
        
    }
}
?>
