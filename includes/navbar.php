



<div class="navbar navbar-default" id="navbar" >
   <!-- navbar navbar-default Starts -->
   <div class="container">

      <!-- navbar-header Ends -->
      <div class="col-md-12 col-sm-12"  >

         <!-- container Starts -->
         <div class="navbar-header">
            <!-- navbar-header Starts -->
            <a class="navbar-brand home" href="index.php">
               <!--- navbar navbar-brand home Starts -->
               <img src="images/E-Store.png" alt="computerfever logo" class="hidden-xs">
               <img src="images/E-Store-small.png" alt="computerfever logo" class="visible-xs">
            </a>
            <!--- navbar navbar-brand home Ends -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
               <span class="sr-only">Toggle Navigation </span>
               <i class="fa fa-align-justify"></i>
            </button>
         </div>

         <div class=" col-md-6 navbar-collapse collapse" id="navigation">
            <!-- navbar-collapse collapse Starts -->

            <div class="padding-nav">
               <!-- padding-nav Starts -->
               <ul class="nav navbar-nav navbar-left text-muted">
                  <!-- nav navbar-nav navbar-left Starts -->
                  <li class="active text-muted">
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
                     <a href="about.php"> About Us</a>
                  </li>
                  <li>
                     <a href="services.php"> Services </a>
                  </li>
                  <li>
                     <a href="contact.php"> Contact Us </a>
                  </li>
               </ul>
               <!-- nav navbar-nav navbar-left Ends -->
            </div>
         </div>
         <!-- padding-nav Ends -->
         <div class="col-md-2">
            <a class="btn btn-primary navbar-btn right" style="height: 50px;width: 100%;float: right; padding-top: 15px" href="cart.php">
               <!-- btn btn-primary navbar-btn right Starts -->
               <i class="fa fa-shopping-cart "></i>
               <span> <?php items(); ?> items in cart </span>
            </a>
         </div>
      </div>
      <!-- navbar-collapse collapse Ends -->
   </div>
   <!-- container Ends -->

</div>