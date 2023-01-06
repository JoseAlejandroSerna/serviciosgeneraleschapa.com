<?php
class UserModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_USER;
        
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

    public $idUser = "0";
    public $idTypeUser = "0";
    public $vUser = "";
    public $vPassword = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idUser = $this->idUser");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_by_user(){
        $query=$this->db->query("SELECT * FROM $this->table 
                                    WHERE 
                                    vUser = '$this->vUser' 
                                    AND 
                                    vPassword = '$this->vPassword'");

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
        $query="INSERT INTO $this->table (idUser,idTypeUser,vUser,vPassword) 
                VALUES(NULL,
                        $this->idTypeUser,
                        '$this->vUser',
                        '$this->vPassword');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.");
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vPassword = '$this->vPassword'
                WHERE
                idUser = $this->idUser";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idUser = $this->idUser";

        $this->db()->query($query);
        
    }
}
?>
