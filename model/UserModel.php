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
    public $idBranch = "0";
    public $idPermissions = "0";
    public $vUser = "";
    public $vEmail = "";
    public $vPassword = "";
    public $vPhone = "";
    public $vAddress = "";
    public $vCP = "";
    public $vComent = "";
    public $iStatus = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idUser = $this->idUser");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_login(){
        $resultSet = array();
        
        $query=$this->db->query("SELECT * FROM $this->table WHERE vEmail = '$this->vEmail' AND vPassword = '$this->vPassword'");

        while ($row = $query->fetch_object()) {
            $resultSet[]=$row;
        }
         
        return $resultSet;
    }

    public function get_user_test(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table WHERE idPermissions = 1 ORDER BY vUser");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY vUser");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    
    /*
     public function save()
    {
        if($this->exist())
        {
            $this->update();
        }else{
            $this->create();
        }
    }
     */

    public function exist()
    {
        $exist = false;
        
        $query = $this->db->query("SELECT * FROM $this->table WHERE vEmail = '$this->vEmail' AND vPassword = '$this->vPassword'");
        if($query->num_rows > 0)
        {
            $exist = true;
        }

        return $exist;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idUser,idBranch,idPermissions,vUser,vEmail,vPassword,vPhone,vAddress,vCP,vComent,iStatus) 
                VALUES(NULL,
                        0,
                        $this->idPermissions,
                       '$this->vUser',
                       '$this->vEmail',
                       '$this->vPassword',
                       '$this->vPhone',
                       '$this->vAddress',
                       '$this->vCP',
                       '$this->vComent',
                       1);";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }

        //$save=$this->db()->query($query);
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                    idPermissions = $this->idPermissions, 
                    vUser = '$this->vUser',
                    vPassword = '$this->vPassword',
                    vPhone = '$this->vPhone',
                    vAddress = '$this->vAddress',
                    vCP = '$this->vCP',
                    vComent = '$this->vComent',
                    iStatus = $this->iStatus 
                WHERE
                    vEmail = '$this->vEmail'";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
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
