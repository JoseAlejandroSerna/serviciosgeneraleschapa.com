<?php
class OfferInformationModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_OFFER_INFORMATION;
        
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

    public $idOfferInformation = "0";
    public $vOfferInformation = "";
    public $vInformation = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idOfferInformation = $this->idOfferInformation");

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
                vOfferInformation = '$this->vOfferInformation',
                vInformation = '$this->vInformation'
                WHERE
                idOfferInformation = $this->idOfferInformation";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idOfferInformation = $this->idOfferInformation";

        $this->db()->query($query);
        
    }
}
?>
