<?php

class Cart{
    private $p_id;
    private $ip_add;
    private $qty;
    private $size;

    private $conn;

    
    function __construct()
    {
        $this->conn = new Database();
    }


    function checkProduct($ip_add, $p_id){
        $this->conn->query("SELECT count(*) from cart where ip_add = :ip_add AND p_id = :p_id");
        $this->conn->bind(":ip_add",$ip_add);
        $this->conn->bind(":p_id",$p_id);
        return $this->conn->single();
    }

    function insertToCart(){
        $this->conn->query("INSERT into cart (p_id, ip_add, qty, size) values (:p_id, :ip_add, :qty, :size)");
        $this->conn->bind(":p_id",$this->p_id);
        $this->conn->bind(":ip_add",$this->ip_add);
        $this->conn->bind(":qty",$this->qty);
        $this->conn->bind(":size",$this->size);
        $this->conn->execute();
    }

    function countCartByIpAdd($ip_add){
        $this->conn->query("SELECT count(*) from cart where ip_add = :ip_add");
        $this->conn->bind(":ip_add",$ip_add);
    
        return $this->conn->fetchColumn();
    }

    function selectCartByIpAdd($ip_add){
        $this->conn->query("SELECT * from cart where ip_add = :ip_add");
        $this->conn->bind(":ip_add",$ip_add);
        return $this->conn->single();
    }

    function deleteFromCartByPId($p_id){
        $this->conn->query("DELETE from cart where p_id= :p_id");
        $this->db->bind(":p_id", $p_id);
        $this->db->execute();
    }

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of qty
     */ 
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set the value of qty
     *
     * @return  self
     */ 
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get the value of ip_add
     */ 
    public function getIp_add()
    {
        return $this->ip_add;
    }

    /**
     * Set the value of ip_add
     *
     * @return  self
     */ 
    public function setIp_add($ip_add)
    {
        $this->ip_add = $ip_add;

        return $this;
    }

    /**
     * Get the value of p_id
     */ 
    public function getP_id()
    {
        return $this->p_id;
    }

    /**
     * Set the value of p_id
     *
     * @return  self
     */ 
    public function setP_id($p_id)
    {
        $this->p_id = $p_id;

        return $this;
    }
}


?>