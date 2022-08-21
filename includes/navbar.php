<style>
*{
   margin: 0;
   padding: 0;
}
.header {
  background-color: #007BFF;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  padding: 0px 25px;
  height: 80px;
  align-items: center;
  text-align: center;
  position: relative;
}

.logo img {
  height: 40px;
}

.search input{
  height: 35px;
  width: 100%;
  border: none;
  outline: none;
  border-radius: 10px;
  padding: 10px;
  font-size: 16px;
}

.icons{
   text-align: right;
}
.icons .fa{
   color: white;
   text-decoration: none;
   font-size: 22px;
   padding: 0px 10px;
   transition: 0.6s;
}
.fa:hover{
   color: black;
}
.links{
   background-color: #007BFF;
   /* display: none; */
   height: 0;
   transition: 0.6s;
}
.links a{
   color: white;
   text-decoration: none;
   display: block;
   padding: 15px;
   font-size: 18px;
}
.showmylinks {
   /* display: block; */
   height: 50vh;
}

@media only screen and (max-width: 600px){
   .header{
      grid-template-columns: auto auto;
      padding: 10px 7px;
      height: auto;
   }
   .logo img {
      width: 90px;
      height: auto;
   }
   .search{
      grid-column: 2;
      grid-row: 2;
      grid-column: 1/span 2;
      padding-top: 10px;
   }
   .icons .fa{
      padding: 5px;
   }
}
</style>
<div class="header">
   <div class="logo">
      <a href="#">
         <img src="images/E-Store.png" alt="">
      </a>
   </div>
   <div class="search">
      <form>
         <input type="text" placeholder="Search here...">
      </form>
   </div>
   <div class="icons">
      <a href="#" class="fa fa-heart"></a>
      <a href="#" class="fa fa-shopping-bag"></a>
      <a href="#" class="fa fa-user"></a>
      <a href="#" class="fa fa-bars"></a>
   </div>
   <div class="links">
      <a href="#">Womens Garments</a>
      <a href="#">Mens Garments</a>
      <a href="#">Boys Shoes</a>
      <a href="#">Girls Shoes</a>
      <a href="#">Gifts</a>
      <a href="#">Child Cloths</a>
   </div>
</div>
<script>
   document.getElementsByClassName("fa") [3]. addEventListener (
      "click", function() {
         document.getElementsByClassName("links") [0].classList.toggle("showmylinks");
      }
   )
</script>



<!-- <div class="navbar navbar-default" id="navbar" >
   <div class="container">

      <div class="col-md-12 col-sm-12"  >
         <div class="navbar-header">
            <a class="navbar-brand home" href="index.php">
               <img src="images/E-Store.png" alt="computerfever logo" class="hidden-xs">
               <img src="images/E-Store-small.png" alt="computerfever logo" class="visible-xs">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
               <span class="sr-only">Toggle Navigation </span>
               <i class="fa fa-align-justify"></i>
            </button>
         </div>

         <div class=" col-md-6 navbar-collapse collapse" id="navigation">
            <div class="padding-nav">
               <ul class="nav navbar-nav navbar-left text-muted">
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
            </div>
         </div>
         <div class="col-md-2">
            <a class="btn btn-primary navbar-btn right" style="height: 50px;width: 100%;float: right; padding-top: 15px" href="cart.php">
               <i class="fa fa-shopping-cart "></i>
               <span> <?php items(); ?> items in cart </span>
            </a>
         </div>
      </div>
   </div>
</div> -->