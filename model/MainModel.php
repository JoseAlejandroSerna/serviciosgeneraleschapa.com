<?php
class MainModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_MAIN;
        
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

    public $idMain = "0";
    public $vVideoSeccion1 = "";
    public $vVideoSeccion2 = "";
    public $vVideoSeccion3 = "";
    public $vVideoSeccion4 = "";
    public $vVideoSeccion5 = "";
    public $iCheck1 = "0";
    public $iCheck2 = "0";
    public $iCheck3 = "0";
    public $iCheck4 = "0";
    public $iCheck5 = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idMain = $this->idMain");

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
                vVideoSeccion1 = '$this->vVideoSeccion1',
                vVideoSeccion2 = '$this->vVideoSeccion2',
                vVideoSeccion3 = '$this->vVideoSeccion3',
                vVideoSeccion4 = '$this->vVideoSeccion4',
                vVideoSeccion5 = '$this->vVideoSeccion5',
                iCheck1 = $this->iCheck1,
                iCheck2 = $this->iCheck2,
                iCheck3 = $this->iCheck3,
                iCheck4 = $this->iCheck4,
                iCheck5 = $this->iCheck5
                WHERE
                idMain = $this->idMain";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }
}
?>
