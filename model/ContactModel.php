<?php
class ContactModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_CONTACT;
        
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

    public $idContact = "0";
    public $vContact = "";
    public $vInformation = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idContact = $this->idContact");

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
                vContact = '$this->vContact',
                vInformation = '$this->vInformation'
                WHERE
                idContact = $this->idContact";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idContact = $this->idContact";

        $this->db()->query($query);
        
    }
}
?>
