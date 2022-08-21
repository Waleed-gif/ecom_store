<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
$select_general_settings = "select * from general_settings";
$run_general_settings = mysqli_query($con, $select_general_settings);
$row_general_settings = mysqli_fetch_array($run_general_settings);
$site_title = $row_general_settings["site_title"];
$meta_author = $row_general_settings["meta_author"];
$meta_description = $row_general_settings["meta_description"];
$meta_keywords = $row_general_settings["meta_keywords"];
?>
<!DOCTYPE html>
<html>

<head>
   <title> <?php echo $site_title; ?> </title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="<?php echo $meta_description; ?>">
   <meta name="keywords" content="<?php echo $meta_keywords; ?>">
   <meta name="author" content="<?php echo $meta_author; ?>">
   <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
   <link href="styles/bootstrap.min.css" rel="stylesheet">
   <link href="styles/style.css" rel="stylesheet">
   <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
   <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
   <script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>

<body>
   <?php include('includes/header.php'); ?>
   <!-- top Ends -->
   <div class="navbar navbar-default" id="navbar">
      <!-- navbar navbar-default Starts -->
      <div class="container">
         <!-- container Starts -->
         <div class="navbar-header">
            <!-- navbar-header Starts -->
            <a class="navbar-brand home" href="index.php">
               <!--- navbar navbar-brand home Starts -->
               <img src="images/E-Store.png" alt="Logo" class="hidden-xs">
               <img src="images/E-Store-small.png" alt="Logo" class="visible-xs">
            </a>
            <!--- navbar navbar-brand home Ends -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
               <span class="sr-only">Toggle Navigation </span>
               <i class="fa fa-align-justify"></i>
            </button>
         </div>
         <!-- navbar-header Ends -->
         <div class="navbar-collapse collapse" id="navigation">
            <!-- navbar-collapse collapse Starts -->
            <div class="padding-nav">
               <!-- padding-nav Starts -->
               <ul class="nav navbar-nav navbar-left">
                  <!-- nav navbar-nav navbar-left Starts -->
                  <li class="active">
                     <a href="index.php"> Home </a>
                  </li>
                  <li>
                     <a href="shop.php"> Shop </a>
                  </li>
                  <li>
                     <?php
                     if (!isset($_SESSION['customer_email'])) {
                        echo "<a href='checkout.php' >My Account</a>";
                     } else {
                        echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                     }
                     ?>
                  </li>
                  <li>
                     <a href="cart.php"> Shopping Cart </a>
                  </li>
                  <li>
                     <a href="about.php"> About Us </a>
                  </li>
                  <li>
                     <a href="services.php"> Blogs </a>
                  </li>
                  <li>
                     <a href="contact.php"> Contact Us </a>
                  </li>
               </ul>
               <!-- nav navbar-nav navbar-left Ends -->
            </div>
            <!-- padding-nav Ends -->
            <a class="btn btn-primary navbar-btn right" href="cart.php">
               <!-- btn btn-primary navbar-btn right Starts -->
               <i class="fa fa-shopping-cart"></i>
               <span> <?php items(); ?> items in cart </span>
            </a>

         </div>
         <!-- navbar-collapse collapse Ends -->
      </div>
      <!-- container Ends -->


      <div class="container">
         <div class="row">
            <form class="navbar-form" method="get" action="results.php">
               <!-- navbar-form Starts -->
               <div class="col-md-3" style="border: none;">
                  <div class="cd-dropdown-wrapper" style="display: block; margin-left: auto; margin-right: auto; bottom: 20px; ">
                     <a class="cd-dropdown-trigger" href="#0" style="border-radius: 10px; background-color: rgb(79, 191, 168); text-decoration: none;">Shop by Department</a>
                     <nav class="cd-dropdown">
                        <a href="#0" class="cd-close">Close</a>
                        <ul class="cd-dropdown-content">
                           <!-- <li>
						<form class="cd-search">
							<input type="search" placeholder="Search...">
						</form>
					</li> -->
                  <?php
                     $query = "SELECT * FROM categories ORDER BY cat_id ASC";
                     $result = mysqli_query($con,$query);
                     while($row = mysqli_fetch_array($result)){
                  ?>
                           <li class="has-children">
                              <a href="#"><?php echo $row["cat_title"]; ?></a>
                              <ul class="cd-dropdown-icons is-hidden">
                                 <li class="go-back"><a href="#0">Menu</a></li>
                                 <li class="see-all"><a href="#">Go to Shop</a></li>
                  <?php
                           $query1 = "SELECT * FROM sub_category WHERE cat_id = '".$row["cat_id"]."' ORDER BY sub_id ASC";
                           // echo $query1;
                           $result1 = mysqli_query($con,$query1);
                           while($row1 = mysqli_fetch_array($result1)){
                  ?>
                                 <li>
                                    <a class="cd-dropdown-item" style="padding: 0;" href="shopbycat.php?cat_id=<?=$row['cat_id'] ?>&sub_id=<?=$row1['sub_id']?>">
                                       <h3><?php echo $row1["sub_cat_title"]; ?></h3>
                                       <!-- <p>This is the item description</p> -->
                                    </a>
                                 </li>
                  <?php
                           }
                  ?>
                              </ul>
                           </li>
                  <?php } ?>

                        </ul>
                     </nav>
                  </div>

               </div>
               <div class="input-group col-md-8" style="top: 10px;">
                  <!-- input-group Starts -->
                  <input class="form-control" type="text" placeholder="Search" name="user_query" required>
                  <span class="input-group-btn">
                     <!-- input-group-btn Starts -->
                     <button type="submit" value="Search" name="search" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                     </button>
                  </span>
                  <!-- input-group-btn Ends -->
               </div>
               <!-- input-group Ends -->
            </form>
         </div>
      </div>
   </div>


   <div class="container">
      <img class="col-md-12 col-sm-12" src="images/banner/1.png">
   </div>

   <div class="container" id="slider">
      <!-- container Starts -->
      <div class="col-md-12">
         <!-- col-md-12 Starts -->
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- carousel slide Starts --->
            <ol class="carousel-indicators">
               <!-- carousel-indicators Starts -->
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
               <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- carousel-indicators Ends -->
            <div class="carousel-inner">
               <!-- carousel-inner Starts -->
               <?php
               $get_slides = "select * from slider LIMIT 0,1";
               $run_slides = mysqli_query($con, $get_slides);
               while ($row_slides = mysqli_fetch_array($run_slides)) {
                  $slide_name = $row_slides['slide_name'];
                  $slide_image = $row_slides['slide_image'];
                  $slide_url = $row_slides['slide_url'];
                  echo "
                     <div class='item active'>
                     <a href='$slide_url'><img src='admin_area/slides_images/$slide_image'></a>
                     </div>
                     ";
               }
               ?>
               <?php
               $get_slides = "select * from slider LIMIT 1,3 ";

               $run_slides = mysqli_query($con, $get_slides);

               while ($row_slides = mysqli_fetch_array($run_slides)) {
                  $slide_name = $row_slides['slide_name'];
                  $slide_image = $row_slides['slide_image'];
                  $slide_url = $row_slides['slide_url'];
                  echo "
                     <div class='item'>
                     <a href='$slide_url'><img src='admin_area/slides_images/$slide_image'></a>
                     </div>
                     ";
               }
               ?>
            </div>
            <!-- carousel-inner Ends -->
            <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left"> </span>
               <span class="sr-only"> Previous </span>
            </a> -->
            <!-- left carousel-control Ends -->
            <!-- <a class="right carousel-control" href="#myCarousel" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right"> </span>
               <span class="sr-only"> Next </span>
            </a> -->
            <!-- right carousel-control Ends -->
         </div>
         <!-- carousel slide Ends --->
      </div>
      <!-- col-md-12 Ends -->
   </div>
   <!-- container Ends -->
   <!-- <div id="advantages">
         <div class="container">
            <div class="same-height-row">
               <?php
               $get_boxes = "select * from boxes_section";
               $run_boxes = mysqli_query($con, $get_boxes);
               while ($run_boxes_section = mysqli_fetch_array($run_boxes)) {
                  $box_id = $run_boxes_section['box_id'];
                  $box_title = $run_boxes_section['box_title'];
                  $box_desc = $run_boxes_section['box_desc'];
               ?>
               <div class="col-sm-4">
                  <div class="box same-height">
                     <div class="icon">
                        <i class="fa fa-heart" ></i>
                     </div>
                     <h3><a href="#"> <?php echo $box_title; ?> </a></h3>
                     <p>
                        <?php echo $box_desc; ?>
                     </p>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
      </div> -->
   <div id="hot">
      <!-- hot Starts -->
      <div class="box">
         <!-- box Starts -->
         <div class="container">
            <!-- container Starts -->
            <div class="col-md-12">
               <!-- col-md-12 Starts -->
               <h2>Shop by Activity</h2>
            </div>
            <!-- col-md-12 Ends -->
         </div>
         <!-- container Ends -->
      </div>
      <!-- box Ends -->
   </div>
   <!-- hot Ends -->
   <div class="container">
      <!-- container Starts -->
      <div class="row">
         <?php
         $query = "SELECT * FROM product_categories";
         $sql_act = mysqli_query($con, $query);
         while ($row_act = mysqli_fetch_array($sql_act)) {
         ?>
            <div class="col-md-2" style="padding: 3px;border: none; height: 300px; background-image: url(images/activity/<?php echo $row_act['p_cat_image'] ?>); background-position: center; background-repeat: no-repeat; ">
               <div style="background-color: rgba(0, 0, 0, 0.5);height: 50px; margin-top: 200px;">
                  <p style="color: white; text-align: center; font-size: 18px; line-height: 1.2; padding-top: 6px; font-family: Arial, Helvetica, sans-serif;">
                     <?php echo $row_act['p_cat_title'] ?></p>
               </div>
            </div>
         <?php
         }
         ?>
      </div>
      <!-- row Ends -->
   </div>
   <br />
   <div id="hot">
      <!-- hot Starts -->
      <div class="box">
         <!-- box Starts -->
         <div class="container">
            <!-- container Starts -->
            <div class="col-md-12">
               <!-- col-md-12 Starts -->
               <h2>Shop by Department</h2>
            </div>
            <!-- col-md-12 Ends -->
         </div>
         <!-- container Ends -->
      </div>
      <div class="container">
         <div class="row">
            <?php
            $query_dpt = "SELECT * FROM categories";
            $sql_dpt = mysqli_query($con, $query_dpt);
            while ($row_dpt = mysqli_fetch_array($sql_dpt)) {
            ?>
               <div class="col-md-3" style="border: solid 1px rgba(0, 0, 0, 0.1); height: 300px; background-color: white;">
               <a style="text-decoration: none;" href="shopbycat.php?cat_id=<?=$row_dpt['cat_id'] ?>">
               <img src="images/department/<?= $row_dpt['cat_image'] ?>" alt="image" style="display: block; margin-left: auto; margin-right: auto; ">
                  <p style="text-align: center; font-size: 18px;"><?= $row_dpt['cat_title'] ?></p>
               </a>
               </div>
            <?php
            }
            ?>

         </div>
         <!-- box Ends -->
      </div>
      <br />

      <div class="box ">
      <div class="container">
         <div class="row">
            <h2 style="color: green;">More for You</h2>
            <div class="col-md-3" style="border-right: solid 1px rgba(0, 0, 0, 0.2);">
               <img src="images/1.png" style="display: block; margin-left: auto; margin-right: auto;" />
               <h4 style="text-align: center;">Connect with verified sellers</h4>
               <p style="text-align: center;">Tell us your requirement & let our experts find verified sellers for you</p>
               <br />
               <button class="btn btn-success" style="border-radius: 20px; display: block; margin-left: auto; margin-right: auto;">Get Verified Seller</button>
            </div>
            <div class="col-md-3" style="border-right: solid 1px rgba(0, 0, 0, 0.2);">
               <img src="images/1.png" style="display: block; margin-left: auto; margin-right: auto;" />
               <h4 style="text-align: center;">Pay with UK </h4>
               <p style="text-align: center;">Protect your payments for FREE. Pay sellers online via multiple options</p>
               <!-- <br />  -->
               <button class="btn btn-success" style="border-radius: 20px; display: block; margin-left: auto; margin-right: auto;">Know More</button>
            </div>
            <div class="col-md-3" style="border-right: solid 1px rgba(0, 0, 0, 0.2);">
               <img src="images/1.png" style="display: block; margin-left: auto; margin-right: auto;" />
               <h4 style="text-align: center;">Sell on UK Mart</h4>
               <p style="text-align: center;">Reach out to more than 2 Lac buyers. Sell with us.</p>
               <br />
               <button class="btn btn-success" style="border-radius: 20px; display: block; margin-left: auto; margin-right: auto;">Start Selling</button>
            </div>
            <div class="col-md-3">
               <img src="images/1.png" style="display: block; margin-left: auto; margin-right: auto;" />
               <h4 style="text-align: center;">Download Our App</h4>
               <p style="text-align: center;">Get instant notifications on the go. Download our App Now</p>
               <br />
               <button class="btn btn-success" style="border-radius: 20px; display: block; margin-left: auto; margin-right: auto;">Download Now</button>
               <br />
            </div>
         </div>
      </div>
      </div>
      <!-- container Ends -->
      <!-- <div class="container"> -->
      <div class="box">
         <div class="row">
            <h2>Top Selling Brands</h2>
            <div class="col-md-12">
               <div id="Carousel" class="carousel slide">

                  <!-- <ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                    <li data-target="#Carousel" data-slide-to="3"></li>
                    <li data-target="#Carousel" data-slide-to="4"></li>
                    <li data-target="#Carousel" data-slide-to="5"></li>
                </ol>
                 -->
                  <!-- Carousel items -->
                  <div class="carousel-inner">

                     <div class="item active">
                        <div class="row">
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/1.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/2.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/3.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/4.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/5.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/6.png" alt="Image" style="max-width:100%;"></a></div>
                        </div>
                        <!--.row-->
                     </div>
                     <!--.item-->

                     <div class="item">
                        <div class="row">
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/7.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/8.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/9.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/10.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/11.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/12.png" alt="Image" style="max-width:100%;"></a></div>
                        </div>
                        <!--.row-->
                     </div>
                     <!--.item-->

                     <div class="item">
                        <div class="row">
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/13.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/14.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/15.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/16.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/17.png" alt="Image" style="max-width:100%;"></a></div>
                           <div class="col-md-2"><a href="#" class="img-thumbnail"><img src="images/brands/18.png" alt="Image" style="max-width:100%;"></a></div>
                        </div>
                        <!--.row-->
                     </div>
                     <!--.item-->

                  </div>
                  <!--.carousel-inner-->
                  <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                  <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
               </div>
               <!--.Carousel-->

            </div>
         </div>
      </div>
   </div>


   <?php
   include("includes/footer.php");

   ?>
   <script src="js/jquery.min.js"> </script>
   <script src="js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#Carousel').carousel({
            interval: 5000
         })
      });
   </script>
   <script src="js/jquery-2.1.1.js"></script>
   <script src="js/jquery.menu-aim.js"></script> <!-- menu aim -->
   <script src="js/main.js"></script> <!-- Resource jQuery -->
</body>

</html>