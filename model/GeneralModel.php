<?php
class GeneralModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_GENERAL;
        
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

    public $idGeneral = "0";
    public $vPhone = "";
    public $vEmail = "";
    public $vAddresses = "";
    public $vLogo = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idGeneral = $this->idGeneral");

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

    public function create()
    {
        $query="INSERT INTO $this->table (idGeneral,vPhone,vEmail,vAddresses,vLogo) 
                VALUES(NULL,
                       '$this->vPhone',
                        '$this->vEmail',
                        '$this->vAddresses',
                        '$this->vLogo');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.");
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vPhone = '$this->vPhone',
                vEmail = '$this->vEmail',
                vAddresses = '$this->vAddresses'
                WHERE
                idGeneral = $this->idGeneral";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
    }

    public function update_logo()
    {
        $query="UPDATE $this->table 
                SET
                vLogo = '$this->vLogo'
                WHERE
                idGeneral = $this->idGeneral";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idGeneral = $this->idGeneral";

        $this->db()->query($query);
        
    }
}
?>
