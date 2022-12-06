
<?php

  session_start();

  if(!isset($_SESSION['customer_email'])){
      
    echo "<script>window.open('../checkout.php','_self')</script>";
    
  }else{

  include_once('functions/functions.php');
    
  if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <title>M-Dev Store</title>
</head>
<body>
 
  <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
    
                   ?>
               
               </a>
               <a href="checkout.php"> <?php itemsInCart(); ?> Items In Your Cart | Total Price: <?php cartTotal(); ?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                       
                        <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                         ?>
                       
                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="../index.php">Home</a>
                       </li>
                       <li>
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">My Account</a>
                       </li>
                       <li>
                           <a href="../cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php itemsInCart(); ?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->

  <div id="content"> <!-- content Begin -->
    <div class="container"> <!--container Begin -->
      <div class="col-md-12"> <!-- col-md-12 Begin -->

        <ul class="breadcrumb">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            My Account
          </li>
        </ul>

      </div> <!-- col-md-12 Finish -->

      <div class="col-md-3"> <!-- col-md-3 Begin -->

        <?php 
          include('includes/sidebar.php');
        ?>

      </div> <!-- col-md-3 Finish -->

      <div class="col-md-9"><!-- col-md-9 Begin -->
        <div class="box">
          <div class="center-all">
          <h1>Please confirm your payment</h1>

          <form action="confirm.php?update_id=<?php echo $order_id;?>" method="post" enctype="multipart/form-data"><!-- form Begin -->
            <div class="form-group">
              <label> Invoice No: </label>
              <input type="text" class="form-control" name="invoice_no" required>
            </div>
            <div class="form-group">
              <label> Amount Sent: </label>
              <input type="text" class="form-control" name="amount_sent" required>
            </div>
            <div class="form-group">
              <label> Select Payment Method: </label>
              <select name="payment_mode" class="form-control">
                <option> -Select Payment Mode-</option>
                <option> Bank Transfer</option>
                <option> Gcash </option>
                <option> Paypal</option>
                <option> Paymaya</option>
              </select>
            </div>
            <div class="form-group">
              <label> Transaction / Reference ID: </label>
              <input type="text" class="form-control" name="ref_no" required>
            </div>
            <div class="form-group">
              <label>  Code (if any): </label>
              <input type="text" class="form-control" name="code">
            </div>
            <div class="form-group">
              <label> Payment Date: </label>
              <input type="text" class="form-control" name="date" required>
            </div>
            <div class="text-center">
              <button class="btn btn-primary btn-lg" type="submit" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->
                <i class="fa fa-user-md"></i> Confirm Payment
              </button>
            </div>

          </form> <!-- form Finish -->

          <?php 
                   
                   if(isset($_POST['confirm_payment'])){
                       
                       $update_id = $_GET['update_id'];
                       
                       $invoice_no = $_POST['invoice_no'];
                       
                       $amount = $_POST['amount_sent'];
                       
                       $payment_mode = $_POST['payment_mode'];
                       
                       $ref_no = $_POST['ref_no'];
                       
                       $code = $_POST['code'];
                       
                       $payment_date = $_POST['date'];
                       
                       $complete = "Complete";
                       
                       $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                       
                       $run_payment = $pdo->query($insert_payment);
                       
                       $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                       
                       $run_customer_order = $pdo->query($update_customer_order);
                       
                       $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                       
                       $run_pending_order = $pdo->query($update_pending_order);
                       
                       if($run_pending_order){
                           
                           echo "<script>alert('Thank You for purchasing, we will get in touch for your order/s!')</script>";
                           
                           echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                           
                       }
                       
                   }
                  
                  ?>

          </div> <!-- box Finish -->
          
        </div>
      </div><!-- col-md-9 Finish -->

    </div> <!--container Finish -->
  </div> <!-- content Finish -->

  <?php 
  
    include('includes/footer.php');

  ?>

  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
</body>
</html>
<?php } ?>