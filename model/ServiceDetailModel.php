<?php
class ServiceDetailModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_SERVICE_DETAIL;
        
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

    public $idServiceDetail = "0";
    public $idService = "0";
    public $vServiceDetail = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idServiceDetail = $this->idServiceDetail");

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
                vServiceDetail = '$this->vServiceDetail'
                WHERE
                idServiceDetail = $this->idServiceDetail";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idServiceDetail = $this->idServiceDetail";

        $this->db()->query($query);
        
    }
}
?>
