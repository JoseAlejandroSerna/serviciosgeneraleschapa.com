<?php
class TypePurchaseModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_TYPE_PURCHASE;
        
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

    public $idTypePurchase = "0";
    public $vTypePurchase = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idTypePurchase = $this->idTypePurchase");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idTypePurchase");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
}
?>
