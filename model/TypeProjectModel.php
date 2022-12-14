<?php
class TypeProjectModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_TYPE_PROJECT;
        
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

    public $idTypeProject = "0";
    public $vTypeProject = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idTypeProject = $this->idTypeProject");

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
                vTypeProject = '$this->vTypeProject'
                WHERE
                idTypeProject = $this->idTypeProject";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idTypeProject = $this->idTypeProject";

        $this->db()->query($query);
        
    }
}
?>
