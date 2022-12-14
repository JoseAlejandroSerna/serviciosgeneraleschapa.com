<?php
class OfferModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_OFFER;
        
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

    public $idOffer = "0";
    public $vOffer = "";
    public $iPrice = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idOffer = $this->idOffer");

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

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vOffer = '$this->vOffer',
                iPrice = $this->iPrice
                WHERE
                idOffer = $this->idOffer";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idOffer = $this->idOffer";

        $this->db()->query($query);
        
    }
}
?>
