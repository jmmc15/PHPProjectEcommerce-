<div class="box"> <!-- box Begin -->

    <?php

        $session_email = $_SESSION['customer_email'];

        $select_customer = "select * from customers where customer_email='$session_email'";

        $run_customer = $pdo->query($select_customer);

        while($row_customer = $run_customer->fetch()) {
            $customer_id = $row_customer['customer_id'];
        }

    ?>

    <h1 class="text-center">Payment Options</h1>

    <p class="lead text-center"> <!-- lead text-center Begin -->

        <a href="order.php?c_id=<?php echo $customer_id ?>"> Offline Payment </a>

    </p> <!-- lead text-center Finish -->

    <center> <!-- center Begin -->

        <p class="lead"> <!-- lead Begin -->

            <a href="">

                Paypal Payment

                <img class="img-responsive" src="images/paypall_image.jpg" alt="img-paypall">

            </a>

        </p> <!-- lead Finish -->

    </center> <!-- center Finish -->


</div> <!-- box Finish -->