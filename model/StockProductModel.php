<?php
class StockProductModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_STOCK_PRODUCT;
        
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

    public $idStockProduct = "0";
    public $idProduct = "0";
    public $idBranch = "0";
    public $idSize = "0";
    public $idColor = "0";
    public $iStock = "";
    public $iPrice = "";
    public $vImage = "";
    public $iStatus = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idStockProduct = $this->idStockProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_for_sale(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idProduct = $this->idProduct AND idBranch = $this->idBranch AND idSize = $this->idSize AND idColor = $this->idColor");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_stock_by_idProduct(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idProduct = $this->idProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idStockProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getInExistence(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE iStock<>'0' ORDER BY idStockProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function delete_by_product()
    {
        $query="DELETE FROM $this->table 
                WHERE
                    idProduct = $this->idProduct";

        $this->db()->query($query);
        
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idStockProduct,idProduct,idBranch,idSize,idColor,iPrice,vImage,iStock,iStatus) 
                VALUES(NULL,
                        $this->idProduct,
                        $this->idBranch,
                        $this->idSize,
                        $this->idColor,
                        '$this->iPrice',
                        '$this->vImage',
                        '$this->iStock',
                        $this->iStatus);";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                idProduct = $this->idProduct, 
                idBranch = $this->idBranch,
                idSize = $this->idSize,
                idColor = $this->idColor,
                iStock = '$this->iStock',
                iPrice = '$this->iPrice',
                vImage = '$this->vImage',
                iStatus = $this->iStatus 
                WHERE
                idStockProduct = $this->idStockProduct";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function update_stock()
    {
        $query="UPDATE $this->table 
                SET
                iStock = '$this->iStock'
                WHERE
                idStockProduct = $this->idStockProduct";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idStockProduct = $this->idStockProduct";

        $this->db()->query($query);
        
    }
}
?>
