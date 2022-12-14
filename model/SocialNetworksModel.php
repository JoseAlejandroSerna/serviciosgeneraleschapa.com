<?php
class SocialNetworksModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_SOCIAL_NETWORKS;
        
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

    public $idSocialNetworks = "0";
    public $vUrlFacebook = "";
    public $vUrlInstagram = "";
    public $vUrlTwitter = "";
    public $vUrlPinterest = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idSocialNetworks = $this->idSocialNetworks");

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
                vUrlFacebook = '$this->vUrlFacebook',
                vUrlInstagram = '$this->vUrlInstagram',
                vUrlTwitter = '$this->vUrlTwitter',
                vUrlPinterest = '$this->vUrlPinterest'
                WHERE
                idSocialNetworks = $this->idSocialNetworks";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.");
        }
        
    }
}
?>
