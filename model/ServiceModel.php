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
    public $vInformation = "";
    public $vImage = "";
    public $vImage2 = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idService = $this->idService");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idService");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idService,vService,vInformation,vImage,vImage2) 
                VALUES(NULL,
                       '$this->vService',
                       '$this->vInformation',
                       '$this->vImage',
                       '$this->vImage2');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.");
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vService = '$this->vService',
                vInformation = '$this->vInformation',
                vImage = '$this->vImage',
                vImage2 = '$this->vImage2'
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
