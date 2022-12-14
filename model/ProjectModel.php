<?php
class ProjectModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_PROJECT;
        
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

    public $idProject = "0";
    public $idTypeProject = "0";
    public $vProject = "";
    public $vInformation = "";
    public $vImage = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idProject = $this->idProject");

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
                idTypeProject = $this->idTypeProject,
                vProject = '$this->vProject',
                vInformation = '$this->vInformation',
                vImage = '$this->vImage'
                WHERE
                idProject = $this->idProject";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idProject = $this->idProject";

        $this->db()->query($query);
        
    }
}
?>
