<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

$include_page = "shop"

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

</head>

<body>

    <?php  include "includes/header.php" ?>
    <?php  include "includes/navbar.php" ?>

    <div id="content">
        <!-- content Starts -->
        <div class="container">
            <!-- container Starts -->

            <section>
                <div class="col-xs-12 col-md-12 col-sm-12" 
                    style="background-image: url(images/app.png); height: 180px;margin-top: -20px">
            
                </div>
            </section>

            <div class="col-xs-12 col-md-12 col-sm-12" style="padding: 0px">
                <!--- col-md-12 Starts -->

                <ul class="breadcrumb">
                    <!-- breadcrumb Starts -->

                    <li>
                        <a href="index.php">Home</a>
                    </li>

                    <li><a href="shop.php">Shop</a></li>
                    <?php
                        $title = "SELECT * FROM categories WHERE cat_id = $_REQUEST[cat_id]";
                        $tit_result = mysqli_query($con,$title);
                        $cat_title = mysqli_fetch_array($tit_result);  
                    ?>
                    
                </ul><!-- breadcrumb Ends -->



            </div>
            <!--- col-md-12 Ends -->


            <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: white;margin-bottom: 50px;padding-top: 20px">
                <!-- col-md-9 Starts --->
                <!-- <div class='box'>
                    <h1>Shop</h1>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using '</p>
                </div> -->

                <div class="col-md-12 col-xs-12 col-sm-12" style="padding: 20px;margin-bottom: 50px">
              
                <div class="col-md-3">
                <!-- col-md-3 Starts -->

                  <?php include("includes/sidebar.php"); ?>

                </div><!-- col-md-3 Ends -->

                <div class="row flex-wrap col-md-9 col-xs-12" id="Products">
                   
                    <div class="col-xs-12 col-md-12 col-sm-12">
                        <?php
                        $title = "SELECT * FROM categories WHERE cat_id = $_REQUEST[cat_id]";
                        $tit_result = mysqli_query($con,$title);
                        $cat_title = mysqli_fetch_array($tit_result);  
                    ?>

                  

                        <p style="font-size: 18px;margin-bottom: 20px;font-weight: bold;">
                            <?=$cat_title['cat_title'] ?> 
                      
                        </p>
                    </div>

                    <!-- row Starts -->

                    <?php
                        $cat_products = "SELECT * FROM products WHERE cat_id = $_REQUEST[cat_id]";
                        $cat_result = mysqli_query($con,$cat_products);
                        while($cat_row= mysqli_fetch_array($cat_result))
                    {  
                    ?>

                    <div class='col-md-4 col-sm-6 col-xs-6 center-responsive' >

                        <div class='product' style = 'background-color : white;height:392px;margin-bottom:25px'>

                        <a href='$pro_url' >

                        <center>

                        <img style = 'max-height : 260px; min-height : 200px' src='admin_area/product_images/<?=$cat_row['product_img1']?>' class='product-img' >

                        </center>

                        <!-- $outofstock_label -->

                        </a>

                        <div class='text' style='padding:20px;margin-top:20px'>


                        <p  ><a class=' text-muted' style=' text-decoration: none; color: #777;margin-bottom: 30px;text-align:justify;font-weight : bold' href='$pro_url' ><?=$cat_row['product_title'] ?></a></p>

                        <p class='text-muted' style = 'color : red'>$<?=$cat_row['product_price'] ?></p>


                        </center>

                        </p>
                         


                        </div>


                        </div>


                    </div>

                        

                    <?php
                        }
                    ?>

                </div><!-- row Ends -->
                <div style="float: right;">
                    <!-- center Starts -->

                    <ul class="pagination pager" style="height: 50px">
                        <!-- pagination Starts -->

                        <?php getPaginator(""); ?>

                    </ul><!-- pagination Ends -->

                </div><!-- center Ends -->

                <!-- <center>
                    <ul class="pagination">
                        <?php getPaginatorshopbyCat(""); ?>
                    </ul>
                </center> -->

            </div><!-- col-md-9 Ends --->

            <div id="wait" style="position:absolute;top:40%;left:45%;padding:100px;padding-top:200px;">
                <!--- wait Starts -->

            </div>
            <!--- wait Ends -->

        </div><!-- container Ends -->
    </div><!-- content Ends -->



    <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery.min.js"> </script>

    <script src="js/bootstrap.min.js"></script>





</body>

</html>