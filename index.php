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
<!-- style="background-image: linear-gradient(to right, #A1C4FD ,  #C2E9FB)" -->

<body style="background-image: url(images/star.png)">
   <?php include "includes/header.php"; ?>
   <?php include "includes/navbar.php" ?>

  <div class="container col-md-12 col-xs-12 col-sm-12" style="background-color: white;margin-top: -22px;height: 60px;">
    
    <!-- <div class="row"> -->
    <form class="navbar-form" method="get" action="results.php">
       <center>
           <div class="col-md-4 col-xs-6">
          <div class="cd-dropdown-wrapper">
             <a class="cd-dropdown-trigger" href="#0" style="  display: flex;
                         -ms-transform: translateY(-50%);
                         transform: translateY(-50%);     
                         width: max-content; 
                         border-radius: 10px; 
                         background-color: rgb(79, 191, 168); 
                         text-decoration: none; 
                         font-size: 20px;">Shop by Department</a>
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
                   $result = mysqli_query($con, $query);
                   while ($row = mysqli_fetch_array($result)) {
                   ?>
                      <li class="has-children">
                         <a href="#"><?php echo $row["cat_title"]; ?></a>
                         <ul class="cd-dropdown-icons is-hidden">
                            <li class="go-back"><a href="#0">Menu</a></li>
                            <li class="see-all"><a href="#">Go to Shop</a></li>
                            <?php
                            $query1 = "SELECT * FROM sub_category WHERE cat_id = '" . $row["cat_id"] . "' ORDER BY sub_id ASC";
                            // echo $query1;
                            $result1 = mysqli_query($con, $query1);
                            while ($row1 = mysqli_fetch_array($result1)) {
                            ?>
                               <li>
                                  <a class="cd-dropdown-item" style="padding: 0;" href="shopbycat.php?cat_id=<?= $row['cat_id'] ?>&sub_id=<?= $row1['sub_id'] ?>">
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
       <div class="input-group col-md-8 col-xs-6" style="border: solid 0px;">
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
       </center>
       
    </form>

    
  </div>

  <div class="container" 
      >
    
    <!------ Slider -------->
    <center>
        <div class="col-md-12 col-xs-12 col-sm-12" style="border: solid 0px;height: auto; margin: 0 ; padding: 0; ">
           <div id="slider">
              <div id="myCarousel" data-ride="carousel">
                 <ol class="carousel-indicators" style="margin-bottom: 40px">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                 </ol>
                 <div class="carousel-inner">
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
                       <a href='$slide_url'><img src='admin_area/slides_images/$slide_image' style=`width: 100%`></a>
                       </div>
                       ";
                    }
                    ?>
                 </div>
              </div>
           </div>
        </div>
    </center>
    <!------ End Slider -------->


    <!------ Top Product -------->

    <!-- <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: -40px;padding: 0px;margin-bottom: 30px;height: 250px;background-color: white">
      
      <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px">
        <div class="col-md-6 col-sm-6 col-xs-12" 
              style="padding: 40px;height: 250px;background-color: #d1e9f1">
           <center><img src="images/top/1.png"></center>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" style="margin: 0px;padding: 0px">
            <div class="col-md-12 col-sm-6 col-xs-12" 
                  style="padding: 40px;height: 150px;background-color: #c8dbc8">
                <center><img src="images/top/2.png" height="100px" width="100px"></center>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12" 
                  style="padding: 0px;height: 100px;background-color: #5b5c5b5e">
                <div class="col-md-6" style="height: 100px">
                    <center><img src="images/top/3.png" height="90px" width="90px"></center>
                </div>
                <div class="col-md-6" style="height: 100px;background-color: #ffee88;padding-top: 10px">
                  <center><img src="images/top/4.png" height="80px" width="80px"></center>
                </div>
            </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px">
        
         <div class="col-md-7 col-sm-6 col-xs-12" 
              style="padding: 20px;height: 250px;background-color: #ef000012">
              <center><img src="images/top/5.png" height="200px" width="200px"></center>
        </div>
        <div class="col-md-5 col-sm-6 col-xs-12" style="padding: 0px;margin: 0px">
            <div class="col-md-12 col-sm-6 col-xs-12" 
                  style="padding: 20px;height: 125px;background-color: #babff3">
                 <center><img src="images/top/6.png" height="110px" width="110px"></center>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12" 
                  style="padding: 0px;height: 125px;background-color: #f2b7ff">
                 <center><img src="images/top/3.png" height="110px" width="110px"></center>
            </div>
        </div>
       
      </div>

    </div> -->

    <!------End Top Product -------->

    <!------  Shop by Activity -------->
    <div class="col-md-12 col-xs-12 col-sm-12" style="">

      <section>
          <div class="row">

            <!--  <div class="col-md-3 col-xs-12 col-sm-12" style="border: solid 0px; height: 400px;
                background-image: url(images/activity.png);
                background-repeat: no-repeat;
                background-position: center;
             ">
                   
             </div> -->
            <div class="col-sm-12 col-xs-12 col-sm-12" style="background-color: white; height: 530px;padding: 20px">
                  
                <p style="padding-left: 30px;font-size: 28px;font-weight: bold;padding-top: 30px;margin-bottom: 10px;color: darkblue;">Shop By
                     <span style="color: red;font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;font-variant-numeric: white;">Activity</p>
                 </span>
                 
                 <div style="padding-left: 30px;margin-bottom: 30px">
                    <img src="images/line.png">
                 </div>

                  <section class="product" style="padding-left: 20px;padding-right: 10px"> 
                   
                    <button class="pre-btn" style="height: 50px;width: 50px;border-radius: 24px;background-color: white;box-shadow: 0 1px 5px rgb(0 0 0 / 10%);margin-top: 14%">
                      <img src="images/arrow.png" alt="">
                    </button>
                    <button class="nxt-btn" style="height: 50px;width: 50px;border-radius: 24px;background-color: white;box-shadow: 0 1px 5px rgb(0 0 0 / 10%);margin-top: 14%">
                      <img src="images/arrow.png"  alt="" >
                    </button>

                    <div class="product-container">
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag"><center>Playing</center></span>
                                <img src="images/card3.jpg" class="product-thumb" alt="">
                              
                            </div>                       
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag"><center>Gardening</center></span>
                                <img src="images/card2.jpg" class="product-thumb" alt="">
                                
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag"><center>Drawing</center></span>
                                <img src="images/card4.jpg" class="product-thumb" alt="">
                              </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag"><center>Playing</center></span>
                                <img src="images/card2.jpg" class="product-thumb" alt="">
                              
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag"><center>Playing</center></span>
                                <img src="images/card3.jpg" class="product-thumb" alt="">
                               
                            </div>                       
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag"><center>Playing</center></span>
                                <img src="images/card2.jpg" class="product-thumb" alt="">
                              
                            </div>
                        </div>
                     
                    </div>
                  </section>
        
            </div>
          </div>
      </section>

    </div>
    <!------ End Shop by Activity -------->

 
    <!------  Shop by Department -------->
    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px; margin-bottom: 30px;">
      <center>
         <div class="row" style="background-color: white;">
      

             <p style="font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;color: darkblue">Shop By 
                 <span style="color: red;font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;font-variant-numeric: white;">Department</p>
             </span>
        
            
         <center>
            <img src="images/line.png" style="margin-bottom: 30px">
         </center>

         <?php
         $query_dpt = "SELECT * FROM categories";
         $sql_dpt = mysqli_query($con, $query_dpt);
         while ($row_dpt = mysqli_fetch_array($sql_dpt)) {
         ?>
            <div class="col-md-3 olcol-sm-4 col-xs-6" style="border: solid 4px #fbfbfb;height: 340px; background-color: white;padding: 15px;">
               <img style="background-position: center;" src="images/department/<?= $row_dpt['cat_image'] ?>" alt="image" style="display: block; margin-left: auto; margin-right: auto; "></img>
               <p style="text-align: center; font-size: 20px; margin-top: 15px;" class="text-muted"><?= $row_dpt['cat_title'] ?></p>
            </div>
         <?php
         }
         ?>

      </div>
      </center>
      <!-- box Ends -->
    </div>
    <!------ End Shop by Department -------->

  
    <!------  Mor For You -------->
    <section style="padding: 0px">
    
      <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: white" >
           
         <p style="padding-left: 30px;font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;color:darkblue;">More For
             <span style="color: red;font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;font-variant-numeric: white;">You</p>
         </span>
         
         <div style="padding-left: 30px;margin-bottom: 30px">
               <img src="images/line.png">
         </div>
              
          <div class="col-md-6 " style="margin-top: -30px;float: left;:">


               <div class="col-md-6 col-sm-6 col-xs-12" style="border-radius: 5px;padding-bottom: 30px;padding-top: 30px;
                  margin-bottom: 5px">

                  <div class="card" style="padding-bottom: 20px;width: 100%;">

                    <div style="border: solid 1px #e7e4e4;border-radius: 5px;">

                     <img src="images/pay.gif" style="display: block;height: 140px; margin-left: auto; padding-top: 20px;margin-right: auto;" />
                     <br>

                    <div style="padding-right: 10px;padding-left: 10px">
                        <h4 class="text-muted" style="font-weight: bold;text-align: center;margin-bottom: 20px">Verified sellers</h4>
                    
                     <p class="text-muted" style="line-height: 22px;margin-bottom: 20px;text-align: justify;padding-right: 10px;padding-left: 10px">Tell your requirement & let our experts find verified sellers
                     </p>
                    </div>

                     <button style="height: 40px;width: 90%;border: none;background-color:red; color: white;border-radius: 5px; display: block; margin-left: auto; margin-right: auto;margin-bottom: 20px">Get Verified Seller</button>

                    </div>
                  </div>

               </div>
       
               <div class="col-md-6 col-sm-6 col-xs-12" style="border-radius: 5px;padding-bottom: 30px;padding-top: 30px;
                  margin-bottom: 5px">

                  <div class="card" style="padding-bottom: 20px;width: 100%;">

                    <div style="border: solid 1px #e7e4e4;border-radius: 5px;">

                     <img src="images/pay.gif" style="display: block;height: 140px; margin-left: auto; padding-top: 20px;margin-right: auto;" />
                     <br>

                    <div style="padding-right: 10px;padding-left: 10px">
                        <h4 class="text-muted" style="font-weight: bold;text-align: center;margin-bottom: 20px">Pay With USA</h4>
                    
                     <p class="text-muted" style="line-height: 22px;margin-bottom: 20px;text-align: justify;padding-right: 10px;padding-left: 10px">Tell your requirement & let our experts find verified sellers
                     </p>
                    </div>

                     <button style="height: 40px;width: 90%;border: none;background-color:red; color: white;border-radius: 5px; display: block; margin-left: auto; margin-right: auto;margin-bottom: 20px">Get Info</button>

                    </div>
                  </div>

               </div>

               <div class="col-md-12" style=" padding-bottom: 30px;padding-top: 30px;margin-top: -70px; margin-bottom: 5px">
                  <img src="images/app_img.PNG" width="100%" height="60%" style="margin-top: 0%;display: block; " />
               </div>

          </div>

          <div class="col-md-6 col-sm-12">

              <div class="col-md-12" style="  margin-bottom: 5px">
                <img src="images/pic.PNG" width="100%" height="50%" style="margin-top: 0%;display: block; margin-left: auto; margin-right: auto" />

              </div>

          </div>

      </div>
    
    </section>
    <!------End  Mor For You -------->


      <!---  different design ---->
    <div id="advantages" class="col-md-12 col-xs-12 col-sm-12" style="margin-top: 30px;height: auto;padding-bottom: 20px;margin-bottom: 15px;padding-left: 0px;padding-right: 0px" >
      

         <div  style="padding-top: 65px;padding-bottom: 30px;padding-right: 30px;padding-left: 30px;background-color: white">

             <div style="height: 110px;border: solid 1px red; border-radius: 5px ;">
                
             </div>

              <div style="margin-top: -135px;margin-right: 30%;margin-left: 30%; padding-top: 15px;height: 50px;background-image: linear-gradient(to right,red , darkblue);border-radius: 10px">

               <p style="font-size: 18px;font-weight: bold;color: white">Why Choose Us</p>
             
               </div>

            <div class="same-height row" style="margin-right: 5px;margin-left: 5px;">
               <?php
               $get_boxes = "select * from boxes_section";
               $run_boxes = mysqli_query($con, $get_boxes);
               while ($run_boxes_section = mysqli_fetch_array($run_boxes)) {
                  $box_id = $run_boxes_section['box_id'];
                  $box_title = $run_boxes_section['box_title'];
                  $box_desc = $run_boxes_section['box_desc'];
               ?>
               <div class="col-md-4 col-sm-6" style="height: 100px;margin-top: 30px;margin-bottom: 10px" >

                      <div class="col-sm-12"  style="background-color: #fbfbfb;height: 90px;border-radius:   10px;padding-top: 8px;">

                            <div class="col-md-5 col-sm-5 col-xs-5">

                               <img style="margin-left: -70%;" src="images/pay.gif" width="90px" height="90px" />

                            </div>
                            <!-- <?php echo $box_title; ?>  -->
 
                           <div class="col-md-7 col-sm-7 col-xs-7" style="margin-top: 10px;">
                               <p style="margin-left: -70px;font-weight: bold;font-size: 20px;color: #000; text-align: justify;"><?php echo $box_title; ?>
                                 
                               </p>
                               <p style="margin-left: -70px;color: #000;margin-top: 5px; text-align: justify;"><?php echo $box_desc; ?>
                                 
                               </p>
                           </div>
                        
                      </div>
                  
               </div>
               <?php } ?>
            </div>
           

         </div>

    </div> 
   <!---  End different design ---->

    <!-- Brands container Ends -->
    <section  style="padding: 0px;margin-bottom: 20px">
       
      <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: white;margin-bottom: 30px">
       
          <div style="margin-top: 15px;margin-bottom: 30px; background-color: #ffffff">
         
                <center>
                   <p style="font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;
                      color: darkblue;">Our Top
                   <span style="color: red;font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 30px;font-variant-numeric: white;">Brands</p>
                   </span>
             
                   <img src="images/line.png" style="margin-bottom: 30px">
                </center>

                <div class="col-md-12">

                      <center>

                         <div class="col-md-12" style="border: solid 1px #e7e4e4;border-radius: 5px; padding: 20px;margin-bottom: 30px">
                            <br><br>
                            <div class="col-md-12" style="margin-bottom: 25px">
                               <div class="col-md-2"><a href="#" ><img src="images/brands/1.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/2.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/3.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/4.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/5.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/6.png" alt="Image" style="max-width:100%;"></a></div>
                            </div>
                            <!--.row-->

                            <div class="col-md-12" style="margin-bottom: 25px">
                               <div class="col-md-2"><a href="#" ><img src="images/brands/7.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/8.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/9.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/10.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/11.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/12.png" alt="Image" style="max-width:100%;"></a></div>
                            </div>
                            <!--.row-->
                            <div class="col-md-12" style="margin-bottom: 35px">
                               <div class="col-md-2"><a href="#" ><img src="images/brands/13.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/14.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/15.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/16.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/17.png" alt="Image" style="max-width:100%;"></a></div>
                               <div class="col-md-2"><a href="#" ><img src="images/brands/18.png" alt="Image" style="max-width:100%;"></a></div>
                            </div>
                            <!--.row-->

                         </div>
                      </center>
                </div>

          </div>
      </div>
    </section>
    <!---End Brands ---->

  </div>

   <?php
   include("includes/footer.php");

   ?>
   <script src="script.js"></script>
   <script src="js/activity.js"></script>
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