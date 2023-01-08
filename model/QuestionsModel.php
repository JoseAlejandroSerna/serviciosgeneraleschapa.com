<?php
class QuestionsModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_QUESTION;
        
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

    public $idQuestion = "0";
    public $vQuestion = "";
    public $vResponse = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idQuestion = $this->idQuestion");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idQuestion,vQuestion,vResponse) 
                VALUES(NULL,
                       '$this->vQuestion',
                        '$this->vResponse');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.");
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET 
                vQuestion = '$this->vQuestion', 
                vResponse = '$this->vResponse'
                WHERE
                idQuestion = $this->idQuestion";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idQuestion = $this->idQuestion";

        $this->db()->query($query);
        
    }

}
?>
