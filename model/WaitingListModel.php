<?php
class WaitingListModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_WAITING_LIST;
        
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

    public $idWaitingList = "0";
    public $idUser = "0";
    public $idProduct = "0";
    public $vDateCreation = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idWaitingList = $this->idUidWaitingListser");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_by_iduser(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table WHERE idUser = $this->idUser ORDER BY idWaitingList");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idWaitingList");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idWaitingList,idUser,idProduct,vDateCreation) 
                VALUES(NULL,
                        $this->idUser,
                        $this->idProduct,
                        '$this->vDateCreation');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idWaitingList = $this->idWaitingList";

        $this->db()->query($query);
    }

}
?>
