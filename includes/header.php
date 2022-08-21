  <div id="top">
         <!-- top Starts -->
         <div class="container">
            <!-- container Starts -->
            <div class="col-md-6 offer">
               <!-- col-md-6 offer Starts -->
               <a href="#" class="btn btn-success btn-sm" >
               <?php
                  if(!isset($_SESSION['customer_email'])){
                  echo "Welcome :Guest";
                  }else{
                  echo "Welcome : " . $_SESSION['customer_email'] . "";
                  }
                  ?>
               </a>&nbsp
               <a href="#">
              Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?>
               </a>
            </div>
            <!-- col-md-6 offer Ends -->
            <div class="col-md-6">
               <!-- col-md-6 Starts -->
               <ul class="menu">
                  <!-- menu Starts -->
                  <?php if(!isset($_SESSION['customer_email'])){ ?>
                  <li>
                     <a href="customer_register.php"> Register </a>
                  </li>
                  <?php 
                     }else{
                     $customer_email = $_SESSION['customer_email'];
                     $select_customer = "select * from customers where customer_email='$customer_email'";
                     $run_customer = mysqli_query($con,$select_customer);
                     $row_customer = mysqli_fetch_array($run_customer);
                     $customer_role = $row_customer['customer_role'];
                     if($customer_role == "customer"){ 
                     ?>
                  <li>
                     <a href="shop.php"> Shop </a>
                  </li>
                  <?php }elseif($customer_role == "vendor"){ ?>
                  <li>
                     <a href="vendor_dashboard/index.php"> Vendor Dashboard </a>
                  </li>
                  <?php } } ?>
                  <li>
                     <?php
                        if(!isset($_SESSION['customer_email'])){
                        echo "<a href='checkout.php'> My Account </a>";
                        }else{
                        echo "<a href='customer/my_account.php?my_orders'> My Account </a>";
                        }
                        ?>
                  </li>
                  <li>
                     <a href="cart.php"> Go to Cart </a>
                  </li>
                  <li>
                     <?php
                        if(!isset($_SESSION['customer_email'])){
                        
                        echo "<a href='checkout.php'> Login </a>";
                        
                        }else {
                        
                        echo "<a href='logout.php'> Logout </a>";
                        
                        }
                        
                        ?>
                  </li>
               </ul>
               <!-- menu Ends -->
            </div>
            <!-- col-md-6 Ends -->
         </div>
         <!-- container Ends -->
      </div>