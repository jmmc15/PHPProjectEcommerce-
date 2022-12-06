<?php
class Products{
    private $product_id;
    private $p_cat_id;
    private $cat_id;
    private $date;
    private $product_title;
    private $product_img1;
    private $product_img2;
    private $product_img3;
    private $product_price;
    private $product_keywords;
    private $product_desc;

    private $conn;
 
    function __construct()
    {
        $this->conn = new Database();
    }

    function getProductByID($product_id){
        $this->conn->query("SELECT * from products where product_id = :prodID");
        $this->conn->bind(":prodID",$product_id);
        return $this->conn->single();
    }

    function getProducts(){
        $this->conn->query("SELECT * from products order by 1 desc limit 0,8");
        // return $this->conn->fetch();
    }

    function countProductByPCatId($p_cat_id){
        $this->conn->query("SELECT count(*) from products where p_cat_id = :p_cat_id");
        $this->conn->bind(":p_cat_id",$p_cat_id);
        return $this->conn->single();
    }

    function countProductByCategId($cat_id){
        $this->conn->query("SELECT count(*) from products where cat_id = :cat_id");
        $this->conn->bind(":cat_id",$cat_id);
        return $this->conn->single();
    }

    function selectProductByPCatId($p_cat_id){
        $this->conn->query("SELECT * from products where p_cat_id = :p_cat_id");
        $this->conn->bind(":p_cat_id",$p_cat_id);
        return $this->conn->single();
    }

    function selectProductByCatIdLimit($cat_id){
        $this->conn->query("SELECT * from products where cat_id = :cat_id LIMIT 0,6");
        $this->conn->bind(":cat_id",$cat_id);
        return $this->conn->single();
    }

    function selectRandomProducts($qty){
        $this->conn->query("SELECT * from products order by rand() LIMIT 0,$qty");
        return $this->conn->resultset();
    }

    function insertProduct(){
        $this->conn->query("INSERT into products (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_keywords,product_desc) 
        VALUES (:p_cat_id, :cat_id, :date, :product_title, :product_img1, :product_img2, :product_img3, :product_price, :product_keywords, :product_desc)");
    
        $this->conn->bind(":p_cat_id",$this->p_cat_id);
        $this->conn->bind(":cat_id",$this->cat_id);
        $this->conn->bind(":date",$this->date);
        $this->conn->bind(":product_title",$this->product_title);
        $this->conn->bind(":product_img1",$this->product_img1);
        $this->conn->bind(":product_img2",$this->product_img2);
        $this->conn->bind(":product_img3",$this->product_img3);
        $this->conn->bind(":product_price",$this->product_price);
        $this->conn->bind(":product_keywords",$this->product_keywords);
        $this->conn->bind(":product_desc",$this->product_desc);
        $this->conn->execute();


    // $product_cat, $cat,NOW(),$product_title,$product_img1,$product_img2,$product_img3
    // $product_price, $product_keywords, $product_desc

}
      /**
     * Get the value of product_desc
     */ 
    public function getProduct_desc()
    {
        return $this->product_desc;
    }

    /**
     * Set the value of product_desc
     *
     * @return  self
     */ 
    public function setProduct_desc($product_desc)
    {
        $this->product_desc = $product_desc;

        return $this;
    }

    /**
     * Get the value of product_keywords
     */ 
    public function getProduct_keywords()
    {
        return $this->product_keywords;
    }

    /**
     * Set the value of product_keywords
     *
     * @return  self
     */ 
    public function setProduct_keywords($product_keywords)
    {
        $this->product_keywords = $product_keywords;

        return $this;
    }

    /**
     * Get the value of product_price
     */ 
    public function getProduct_price()
    {
        return $this->product_price;
    }

    /**
     * Set the value of product_price
     *
     * @return  self
     */ 
    public function setProduct_price($product_price)
    {
        $this->product_price = $product_price;

        return $this;
    }

    /**
     * Get the value of product_img3
     */ 
    public function getProduct_img3()
    {
        return $this->product_img3;
    }

    /**
     * Set the value of product_img3
     *
     * @return  self
     */ 
    public function setProduct_img3($product_img3)
    {
        $this->product_img3 = $product_img3;

        return $this;
    }

    /**
     * Get the value of product_img2
     */ 
    public function getProduct_img2()
    {
        return $this->product_img2;
    }

    /**
     * Set the value of product_img2
     *
     * @return  self
     */ 
    public function setProduct_img2($product_img2)
    {
        $this->product_img2 = $product_img2;

        return $this;
    }

    /**
     * Get the value of product_img1
     */ 
    public function getProduct_img1()
    {
        return $this->product_img1;
    }

    /**
     * Set the value of product_img1
     *
     * @return  self
     */ 
    public function setProduct_img1($product_img1)
    {
        $this->product_img1 = $product_img1;

        return $this;
    }

    /**
     * Get the value of product_title
     */ 
    public function getProduct_title()
    {
        return $this->product_title;
    }

    /**
     * Set the value of product_title
     *
     * @return  self
     */ 
    public function setProduct_title($product_title)
    {
        $this->product_title = $product_title;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of cat_id
     */ 
    public function getCat_id()
    {
        return $this->cat_id;
    }

    /**
     * Set the value of cat_id
     *
     * @return  self
     */ 
    public function setCat_id($cat_id)
    {
        $this->cat_id = $cat_id;

        return $this;
    }

    /**
     * Get the value of p_cat_id
     */ 
    public function getP_cat_id()
    {
        return $this->p_cat_id;
    }

    /**
     * Set the value of p_cat_id
     *
     * @return  self
     */ 
    public function setP_cat_id($p_cat_id)
    {
        $this->p_cat_id = $p_cat_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }
}


class ProductCategory{
    private $p_cat_id;
    private $p_cat_title;
    private $p_cat_desc;


    private $conn;
 
    function __construct()
    {
        $this->conn = new Database();
    }

    function getProdCategoryById($p_cat_id){
        $this->conn->query("SELECT * from product_categories where p_cat_id = :catID");
        $this->conn->bind(":catID",$p_cat_id);
        return $this->conn->single();
    }

    function getProductCategories(){
        $this->conn->query("SELECT * from product_categories");
        return $this->conn->resultset();
    }
    

    /**
     * Get the value of p_cat_desc
     */ 
    public function getP_cat_desc()
    {
        return $this->p_cat_desc;
    }

    /**
     * Set the value of p_cat_desc
     *
     * @return  self
     */ 
    public function setP_cat_desc($p_cat_desc)
    {
        $this->p_cat_desc = $p_cat_desc;

        return $this;
    }

    /**
     * Get the value of p_cat_title
     */ 
    public function getP_cat_title()
    {
        return $this->p_cat_title;
    }

    /**
     * Set the value of p_cat_title
     *
     * @return  self
     */ 
    public function setP_cat_title($p_cat_title)
    {
        $this->p_cat_title = $p_cat_title;

        return $this;
    }

    /**
     * Get the value of p_cat_id
     */ 
    public function getP_cat_id()
    {
        return $this->p_cat_id;
    }

    /**
     * Set the value of p_cat_id
     *
     * @return  self
     */ 
    public function setP_cat_id($p_cat_id)
    {
        $this->p_cat_id = $p_cat_id;

        return $this;
    }
}

class Categories{
    private $cat_id;
    private $cat_title;
    private $cat_desc;

    private $conn;

    function __construct()
    {
        $this->conn = new Database();
    }

    function selectAllCategories(){
        $this->conn->query("SELECT * from categories");
        return $this->conn->resultset();
    }

    function selectCategoriesById($cat_id){
        $this->db->query("SELECT  * from categories where cat_id = :cat_id");
        $this->db->bind(":cat_id",$cat_id);
        return $this->db->single();
    }

    /**
     * Get the value of cat_desc
     */ 
    public function getCat_desc()
    {
        return $this->cat_desc;
    }

    /**
     * Set the value of cat_desc
     *
     * @return  self
     */ 
    public function setCat_desc($cat_desc)
    {
        $this->cat_desc = $cat_desc;

        return $this;
    }

    /**
     * Get the value of cat_title
     */ 
    public function getCat_title()
    {
        return $this->cat_title;
    }

    /**
     * Set the value of cat_title
     *
     * @return  self
     */ 
    public function setCat_title($cat_title)
    {
        $this->cat_title = $cat_title;

        return $this;
    }

    /**
     * Get the value of cat_id
     */ 
    public function getCat_id()
    {
        return $this->cat_id;
    }

    /**
     * Set the value of cat_id
     *
     * @return  self
     */ 
    public function setCat_id($cat_id)
    {
        $this->cat_id = $cat_id;

        return $this;
    }
}






// $host = "localhost";
// $username = "root";
// $password = "123456";
// $db = "ecom_store";

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;

$host = $cleardb_server;
$username = $cleardb_username;
$password = $cleardb_password;
$db = $cleardb_db;
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>