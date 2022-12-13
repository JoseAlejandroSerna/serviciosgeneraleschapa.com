<?php
class TypeProductModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_TYPE_PRODUCT;
        
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

    public $idTypeProduct = "0";
    public $vTypeProduct = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idTypeProduct = $this->idTypeProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idTypeProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
}
?>
