<?php
class TypePaymentModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_TYPE_PAYMENT;
        
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

    public $idTypePayment = "0";
    public $vTypePayment = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idTypePayment = $this->idTypePayment");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idTypePayment");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
}
?>
