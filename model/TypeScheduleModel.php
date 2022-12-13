<?php
class TypeScheduleModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_TYPE_SCHEDULE;
        
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

    public $idTypeSchedule = "0";
    public $vTypeSchedule = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idTypeSchedule = $this->idTypeSchedule");

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
}
?>
