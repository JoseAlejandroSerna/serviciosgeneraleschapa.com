<?php
class ServiceModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_SERVICE;
        
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

    public $idService = "0";
    public $vService = "";
    public $vImage = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idService = $this->idService");

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
                vService = '$this->vService',
                vImage = '$this->vImage'
                WHERE
                idService = $this->idService";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idService = $this->idService";

        $this->db()->query($query);
        
    }
}
?>
