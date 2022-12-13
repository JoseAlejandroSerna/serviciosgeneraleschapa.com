<?php
class UserTestModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_USER_TEST;
        
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

    public $idUserTest = "0";
    public $idUser = "0";
    public $vUserTest = "";
    public $vHourTest = "";
    public $idQuiz = "0";
    public $idQuestions = "0";
    public $vDate = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idUserTest = $this->idUserTest");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_by_Quiz_Hour(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table 
                                WHERE vHourTest = '$this->vHourTest' 
                                ORDER BY idUserTest");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_by_tests(){
        $resultSet = array();
        $query=$this->db->query("SELECT distinct idUser,idQuiz,vHourTest,vDate FROM $this->table ORDER BY idUserTest DESC");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idUserTest");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idUserTest,idUser,vUserTest,vHourTest,idQuiz,idQuestions,vDate) 
                VALUES(NULL,
                       $this->idUser,
                       '$this->vUserTest',
                       '$this->vHourTest',
                        $this->idQuiz,
                        $this->idQuestions,
                       '$this->vDate');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idQuiz = $this->idQuiz AND vHourTest = '$this->vHourTest'";

        $this->db()->query($query);
        
    }

    public function delete_hour()
    {
        $query="DELETE FROM $this->table 
                WHERE
                vHourTest = '$this->vHourTest'";

        $this->db()->query($query);
        
    }
}
?>
