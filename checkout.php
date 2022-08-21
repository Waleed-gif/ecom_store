<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

define("customer_login", TRUE);

define("review_order", TRUE);

?>
<!DOCTYPE html>
<html>

<head>
    <title>E commerce Store </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">

    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/style.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>

    <script src="https://checkout.stripe.com/checkout.js"></script>

</head>

<body>

    <?php include "includes/header.php" ?>

    <?php include "includes/navbar.php" ?>
    </div><!-- container Ends -->
    </div><!-- navbar navbar-default Ends -->


  

    <div id="content">
        <!-- content Starts -->
        <div class="container">
            <!-- container Starts -->
            <section>
                <div class="col-xs-12 col-md-12 col-sm-12" 
                    style="background-image: url(images/welcom.jpeg); height: 180px;margin-top: -20px">
            
                </div>
            </section>
            <!---      breadcrumb      --->
           <section>
                <div class="col-xs-12 col-md-12 col-sm-12"  style="padding: 0px">
                <!--- col-md-12 Starts -->

                <?php if (!isset($_SESSION['customer_email'])) { ?>

                    <ul class="breadcrumb">
                        <!-- breadcrumb Starts -->

                        <li><a href="index.php">Home</a></li>

                        <li>Login Details</li>

                    </ul><!-- breadcrumb Ends -->

                <?php } else { ?>

                    <ul class="breadcrumb">
                        <!-- breadcrumb Starts -->

                        <li><a href="index.php">Home</a></li>

                        <li>Checkout Details</li>

                    </ul><!-- breadcrumb Ends -->

                    <nav class="checkout-breadcrumbs text-center">

                        <a href="cart.php">Shopping Cart</a>

                        <i class="fa fa-chevron-right"></i>

                        <a href="checkout.php" class="active">Checkout Details</a>

                        <i class="fa fa-chevron-right"></i>

                        <a href="#"> Order Complete </a>

                    </nav>

                <?php } ?>

                </div>
           </section>
            <!--- col-md-12 Ends -->

            <div class="col-xs-12 col-md-12 col-sm-12"  style="padding: 0px">
                <!-- col-md-12 Starts -->

                <?php

                if (!isset($_SESSION['customer_email'])) {

                    include("customer/customer_login.php");
                } else {

                    include("review_order.php");
                }

                ?>

            </div><!-- col-md-12 Ends -->

        </div><!-- container Ends -->

    </div><!-- content Ends -->

    <?php include("includes/footer.php"); ?>

    <script src="js/jquery.min.js"> </script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>