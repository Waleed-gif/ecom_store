<?php

if(!defined("customer_login")){
	
echo "<script> window.open('../checkout.php','_self'); </script>";	
	
}

?>

		
<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: white;padding: 30px;margin-bottom: 30px;">
	

	<div class="col-md-6 col-sm-12 col-xs-12">
	
		<div style="border: solid 1px #e7e4e4;border-radius: 5px;padding: 30px 30px  40px 40px"><!-- box Starts -->

			<div class="box-header" ><!-- box-header Starts -->

			<h3 class="text-muted" style="font-weight: bold;">Login Here</h3 >

			<img src="images/line.png" style="margin-bottom: 30px">


			</div><!-- box-header Ends -->

			<form action="checkout.php" method="post" ><!--form Starts -->

				<div class="form-group" ><!-- form-group Starts -->

				<label class="text-muted" style="margin-top: 10px">Email</label>

				<input type="text" class="form-control"  style="height: 50px; padding-top: 15px" name="c_email" required >

				</div><!-- form-group Ends -->

				<div class="form-group" ><!-- form-group Starts -->

				<label class="text-muted" style="margin-top: 10px">Password</label>

				<input type="password" class="form-control"  style="height: 50px; padding-top: 15px" name="c_pass" required >

				<h5 align="right" style="margin-top: 30px;">

				<a href="forgot_pass.php" class="text-muted"> Forgot Password </a>

				</h5>

				</div><!-- form-group Ends -->

				<div class="text-center" ><!-- text-center Starts -->

				<button name="login" value="Login" style="height: 50px; width: 100%; font-size: 18px;margin-top: 30px;margin-bottom: 20px" class="btn btn-primary" >

				<i class="fa fa-sign-in" ></i> Log in


				</button>

				</div><!-- text-center Ends -->

			</form><!--form Ends -->

			<center><!-- center Starts -->

				<a href="customer_register.php" >

				<h5><u style="color: #070#070">New ? Register Here</u></h5>

				</a>

				<br>

			</center><!-- center Ends -->

		</div><!-- box Ends -->

		

	</div> 

	<div class="col-md-6 col-sm-12 col-xs-12">
			<div style="background-image: url(images/login.jpg);height: 568px;border: solid 1px #e7e4e4;border-radius: 5px; background-repeat: no-repeat; background-position: center;">
				
			</div>
	</div>

</div>


<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email'";

$run_customer = mysqli_query($con,$select_customer);

$check_customer = mysqli_num_rows($run_customer);

$row_customer = mysqli_fetch_array($run_customer);

$hash_password = $row_customer["customer_pass"];

$customer_role = $row_customer["customer_role"];

$decryt_password = password_verify($customer_pass, $hash_password);

if($decryt_password == 0){
	
echo "<script>alert('your password or email is wrong')</script>";

exit();
	
}

$get_ip = getRealUserIp();

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

if($customer_role == "customer"){

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}elseif($customer_role == "vendor"){
	
echo "<script>window.open('vendor_dashboard/index.php','_self')</script>";

}

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

} 

}

?>