<?php
class ChooseModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_CHOOSE;
        
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

    public $idChoose = "0";
    public $vChoose = "";
    public $vInformation = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idChoose = $this->idChoose");

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
                vChoose = '$this->vChoose',
                vInformation = '$this->vInformation'
                WHERE
                idChoose = $this->idChoose";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idChoose = $this->idChoose";

        $this->db()->query($query);
        
    }
}
?>
