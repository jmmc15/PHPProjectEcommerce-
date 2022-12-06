<?php
//  include('includes/db.php');
 include('cart.php');
 include('products.php');

//  $conn = new Database();


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


<?php

 // Function from tutorial
 function getRealIPUser () {

    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP']; 
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP']; 
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR']; 

        default : return $_SERVER['REMOTE_ADDR']; 
    }

}

 // Function from PHP Documentation
 function real_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] AS $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP'])) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    return $ip;
}


function addCart() {

    global $pdo;

    if(isset($_GET['add_cart'])){

        $ip_add = real_ip();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $product_size = $_POST['product_size'];

        $check_product = "select count(*) from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
        $run_check = $pdo->query($check_product);

        // $check_product = new Cart();
        // $run_check = $check_product->checkProduct($ip_add,$p_id);

        if($row_check=$run_check->fetchColumn()) {

            echo "<script> alert('This product has been added to the cart already.'); </script>";
            echo "<script> window.open('details.php?pro_id='$p_id','self'); </script>";

        } else {

            // $insert_to_cart = "insert into cart (p_id, ip_add, qty, size) values (?,?,?,?)";
            // $conn->prepare($insert_to_cart)->execute([$p_id, $ip_add , $product_qty, $product_size]);

            $insert_to_cart = new Cart();
            $insert_to_cart->setP_id($p_id);
            $insert_to_cart->setIp_add($ip_add);
            $insert_to_cart->setQty($product_qty);
            $insert_to_cart->setSize($product_size);
            $insert_to_cart->insertToCart();

            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }

    }

}

function getPro(){

    global $pdo;

    $get_products = "select * from products order by 1 desc limit 0,8";

    $run_products = $pdo->query($get_products);

    // $get_products = new Products();
    // $run_products = $get_products->getProducts();



    while($row_products=$run_products->fetch()) {
        
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];

        echo "
        
            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                    </a>

                    <div class='text'>
                        <h3>
                            <a href='details.php?pro_id=$pro_id'>
                            
                                $pro_title
                            
                            </a>
                        
                        </h3>

                        <p class='price'>
                        
                            $ $pro_price
                        
                        </p>

                        <p class='button'>
                            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                View Details
                            </a>
                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                <i class='fa fa-shopping-cart'></i> Add to Cart
                            </a>
                        </p>
                    
                    </div>
                </div>
            </div>
        ";

    }

}


function getPCategories(){

    global $pdo;

    $get_p_categories = "select * from product_categories";
    $run_p_categories = $pdo->query($get_p_categories);

    // $get_p_categories = new ProductCategory();
    // $run_p_categories = $get_p_categories->getProductCategories();

    while($row_p_categories = $run_p_categories->fetch()) {

        $p_cat_id = $row_p_categories['p_cat_id'];
        $p_cat_title = $row_p_categories['p_cat_title'];

        echo "
        
            <li>
                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
            </li>
        
        ";

    }

}


function getCategories() {

    global $pdo;

    $get_categories = "select * from categories;";
    $run_categories = $pdo->query($get_categories);

    // $get_categories = new Categories();
    // $run_categories = $get_categories->selectAllCategories();

    while($row_categories=$run_categories->fetch()) {

        $cat_id = $row_categories['cat_id'];
        $cat_title = $row_categories['cat_title'];

        echo "
        
            <li>
            
                <a href='shop.php?cat=$cat_id'> $cat_title</a>
            
            </li>
        
        ";

    }

}

function displayCategories() {

    global $pdo;

    if(isset($_GET['p_cat'])) {

        $p_cat_id = $_GET['p_cat'];

        $get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";
        $run_p_cat = $pdo->query($get_p_cat);
        $row_p_cat = $run_p_cat->fetch();

        // $get_p_cat = new ProductCategory();
        // $run_p_cat = $get_p_cat->getProdCategoryById($p_cat_id);
        // $row_p_cat = $run_p_cat->fetch();

        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];

        $query_count_products = "select count(*) from products where p_cat_id = '$p_cat_id'";
        $run_products = $pdo->query($query_count_products);
        $get_count_products = $run_products->fetchColumn();

        // $query_count_products = new Products();
        // $run_products = $query_count_products->countProductByPCatId($p_cat_id);
        // $get_count_products = $run_products->fetchColumn();

        if($get_count_products == 0) {

            echo "
            
                <div class='box'>
                    No Product found in this product category.
                </div>
            
            ";

        } else {
            echo "
            
                <div class='box'>
                    <h1> $p_cat_title </h1>
                    <p> $p_cat_desc </p>
                </div>
            
            ";
        }

        $get_products = "select * from products where p_cat_id = '$p_cat_id'";
        $run_products = $pdo->query($get_products);

        // $get_products = new Products();
        // $run_products = $get_products->selectProductByPCatId($p_cat_id);

        while($row_products=$run_products->fetch()){

            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];

            echo "
        
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                        </a>

                        <div class='text'>
                            <h3>
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    $pro_title
                                
                                </a>
                            
                            </h3>

                            <p class='price'>
                            
                                $ $pro_price
                            
                            </p>

                            <p class='button'>
                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                    View Details
                                </a>
                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                    <i class='fa fa-shopping-cart'></i> Add to Cart
                                </a>
                            </p>
                        
                        </div>
                    </div>
                </div>
            ";

        }
    }
}


function getCategoryProducts(){

    global $pdo;

    if(isset($_GET['cat'])) {

        $cat_id = $_GET['cat'];

        $get_cat = "select * from categories where cat_id = '$cat_id'";
        $run_cat = $pdo->query($get_cat);
        $row_cat = $run_cat->fetch();

        // $get_cat = new Categories();
        // $run_cat = $get_cat->selectCategoriesById($cat_id);
        // $row_cat = $run_cat->fetch();

        $cat_title = $row_cat['cat_title'];
        $cat_desc = $row_cat['cat_desc'];

        $count_products = "select count(*) from products where cat_id = '$cat_id'";
        $run_count_products = $pdo->query($count_products);
        $products_quantity = $run_count_products->fetchColumn();

        // $count_products = new Products();
        // $run_count_products = $count_products->countProductByCategId($cat_id);
        // $products_quantity = $run_count_products->fetchColumn();

        if($products_quantity == 0) {
            
            echo "

                <div class='box'>
                    <h1>No products found in this category</h1>
                </div>
            
            ";

        } else {
            echo "

                <div class='box'>
                    <h1> $cat_title </h1>
                    <p> $cat_desc </p>
                </div>
            
            ";
        }

        $get_products = "select * from products where cat_id = '$cat_id' LIMIT 0,6";
        $run_get_products = $pdo->query($get_products);
        
        // $get_products = new Products();
        // $run_get_products = $get_products->selectProductByCatIdLimit($cat_id);

        while($row_products=$run_get_products->fetch()){

            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_desc = $row_products['product_desc'];
            $pro_img1 = $row_products['product_img1'];

            echo "
              
                <div class='col-md-4 col-sm-6 center-responsive'>
                  <div class='product'>
                    <a href='details.php?pro_id=$pro_id'> 
                      <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                    </a>
                    <div class='text'>
                      <h3>
                        <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                      </h3>
                      <p class='price'>
                        $$pro_price
                      </p>
                      <p class='button'>
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                          View Details
                        </a>
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                          <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

              ";

        }

    }
    
}

function itemsInCart() {

    global $pdo;

    $ip_add = real_ip();

    $get_items = "select count(*) from cart where ip_add = '$ip_add'";
    $run_items = $pdo->query($get_items);
    $count_items = $run_items->fetchColumn();

    // $get_items = new Cart();
    // $run_items = $get_items->countCartByIpAdd($ip_add);
    // $count_items = $run_items->fetchColumn();

    echo $count_items;

}

function cartTotal() {

    global $pdo;

    $ip_add = real_ip();
    $total = 0;

    $select_cart = "select * from cart where ip_add = '$ip_add'";
    $run_items = $pdo->query($select_cart);

    // $select_cart = new Cart();
    // $run_items = $select_cart->selectCartByIpAdd($ip_add);

    while($count_items = $run_items->fetch()) {
        
        $pro_id = $count_items['p_id'];
        $pro_qty = $count_items['qty'];

        $get_price = "select * from products where product_id = '$pro_id'";
        $run_price = $pdo->query($get_price);

        // $get_price = new Products();
        // $run_price = $get_price->getProductByID($pro_id);

        while($row_price=$run_price->fetch()) {

            $subtotal = $row_price['product_price'] * $pro_qty;
            $total += $subtotal;
        }

    }

    if($total == ''){
        echo "$0";
    } else {
        echo "$" . $total;
    }

}


function removeFromCart() {

    global $pdo;

    if(isset($_POST['update'])) {

        foreach($_POST['remove'] as $remove_id){

            $delete_product = "delete from cart where p_id='$remove_id'";
            $run_delete = $pdo->query($delete_product);

            // $delete_product = new Cart();
            // $run_delete = $delete_product->deleteFromCartByPId($remove_id);
            
            if($run_delete) {
                echo "<script>window.open('cart.php', '_self')</script>";
            }

        }

    }

}


function randomProducts($quantity) {

    global $pdo;

        $get_products = "select * from products order by rand() LIMIT 0,$quantity";
        $run_get_products = $pdo->query($get_products);

        // $get_products = new Products();
        // $run_get_products = $get_products->selectRandomProducts($quantity);

        while($row_get_products=$run_get_products->fetch()) {

            $pro_id = $row_get_products['product_id'];
            $pro_title = $row_get_products['product_title'];
            $pro_price = $row_get_products['product_price'];
            $pro_img1 = $row_get_products['product_img1'];

            echo "
                
            <div class='col-md-3 col-sm-6 center-responsive .flex-container'>
                <div class='product same-height'>
                <a href='details.php?pro_id=$pro_id'> 
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                </a>
                <div class='text'>
                    <h3>
                    <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                    </h3>
                    <p class='price'>
                    $$pro_price
                    </p>
                </div>
                </div>
            </div>

            ";

        }

    }

    function validate_img_security ($filename, $tmp, $path) {

        try{

            $uploads_dir = pathinfo($path.$filename);
        
            if(!((bool) ((preg_match("`^[-0-9A-Z_\.]+$`i", $filename)) ? true : false))){
                throw new RuntimeException('The image title cannot contain special characters.');

            } else if((bool) ((mb_strlen($filename,"UTF-8") > 225) ? true : false)) {
                throw new RuntimeException('Please, remain your image title less than 255 characters.');

            } else if(!($uploads_dir['extension'] != 'jpg' || $uploads_dir['extension'] != 'jpeg' || $uploads_dir['extension'] != 'png')) {
                throw new RuntimeException('Sorry, only PNG or JPG images are allowed.');

            } else if($uploads_dir['size'] > 4000000) {
                throw new RuntimeException('Sorry, size max is 4MB.');
            }

            // Destructuring the data into variables 
            [ 'basename' => $basename, 'dirname' => $dirname ] = $uploads_dir;

            move_uploaded_file($tmp, $dirname."/".$basename);

        } catch (RuntimeException $e) {

            echo $e->getMessage();
        
        }

    }




?>