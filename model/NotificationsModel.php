<?php
class NotificationsModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_NOTIFICATIONS;
        
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

    public $idNotifications = "0";
    public $iSale = "0";
    public $iRent = "0";
    public $iMaking = "0";
    public $iScheduleSale = "0";

    public function getAll(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table WHERE idNotifications = 1");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function reset_sale()
    {
        $query="UPDATE $this->table 
                SET
                iSale = 0
                WHERE
                idNotifications = 1";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function reset_rent()
    {
        $query="UPDATE $this->table 
                SET
                iRent = 0
                WHERE
                idNotifications = 1";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function reset_making()
    {
        $query="UPDATE $this->table 
                SET
                iMaking = 0
                WHERE
                idNotifications = 1";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function reset_ScheduleSale()
    {
        $query="UPDATE $this->table 
                SET
                iScheduleSale = 0
                WHERE
                idNotifications = 1";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                iSale = $this->iSale, 
                iRent = $this->iRent,
                iMaking = $this->iMaking,
                iScheduleSale = $this->iScheduleSale
                WHERE
                idNotifications = $this->idNotifications";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

}
?>
