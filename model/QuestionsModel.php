<?php
class QuestionsModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_QUESTIONS;
        
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

    public $idQuestions = "0";
    public $idQuiz = "0";
    public $vQuestions = "";
    public $iOrder = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idQuestions = $this->idQuestions");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_by_Quiz(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idQuiz = $this->idQuiz ORDER BY iOrder");

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
        $query="INSERT INTO $this->table (idQuestions,idQuiz,vQuestions,iOrder) 
                VALUES(NULL,
                        $this->idQuiz,
                       '$this->vQuestions',
                        $this->iOrder);";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET 
                idQuiz = $this->idQuiz,
                vQuestions = '$this->vQuestions', 
                iOrder = $this->iOrder 
                WHERE
                idQuestions = $this->idQuestions";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idQuestions = $this->idQuestions";

        $this->db()->query($query);
        
    }

    public function delete_by_Quiz()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idQuiz = $this->idQuiz";

        $this->db()->query($query);
        
    }

}
?>
