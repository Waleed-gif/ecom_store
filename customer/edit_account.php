<?php

@session_start();

if(!isset($_SESSION['customer_email'])){

echo "<script>window.open('../checkout.php','_self')</script>";

}

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_contact = $row_customer['customer_contact'];

$customer_image = $row_customer['customer_image'];

?>

<h3 class="text-muted" align="center" > Edit Your Account </h3>

<br>

<form action="" style="padding: 35px" method="post" enctype="multipart/form-data" ><!--- form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="text-muted"> Customer Name: </label>

<input type="text" name="c_name" style="height: 50px" class="form-control" required value="<?php echo $customer_name; ?>">

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="text-muted"> Customer Email: </label>

<input type="email" name="c_email" style="height: 50px" class="form-control" required value="<?php echo $customer_email; ?>">


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="text-muted"> Customer Contact: </label>

<input type="text" name="c_contact" style="height: 50px" class="form-control" required value="<?php echo $customer_contact; ?>">

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="text-muted"> Customer Image: </label>

<input type="file" style="height: 50px ; padding-top: 15px" name="c_image" class="form-control"> <br>

<div class="col-md-12">
	<div class="col-md-4" style="margin-left: -25px">
		<label class="text-muted"> Profile Image: </label>
	</div>
	<div class="col-md-2" style=" text-align: center; margin-left: -50px">
		<img src="customer_images/<?php echo $customer_image; ?>"  width="120" height="100"   class="img-responsive" alt = "Loading">

	</div>
</div>

</div><!-- form-group Ends -->

<div class="text-center" ><!-- text-center Starts -->

<button  style="height: 50px; margin-top: 50px;width: 50% ; background-color: blue; border: none; color: white" class="text-muted" name="update" class="btn btn-primary" >

<i class="fa fa-user-md" ></i> Update Now

</button>


</div><!-- text-center Ends -->


</form><!--- form Ends -->

<?php

if(isset($_POST['update'])){

$update_id = $customer_id;

$c_name = mysqli_real_escape_string($con, $_POST['c_name']);

$c_email = mysqli_real_escape_string($con, $_POST['c_email']);

$c_contact = mysqli_real_escape_string($con, $_POST['c_contact']);

$c_image = $_FILES['c_image']['name'];

$c_image_tmp = $_FILES['c_image']['tmp_name'];

if(!filter_var($c_email, FILTER_VALIDATE_EMAIL)){
	
echo "<script>alert('Your Email is not a valid email address.')</script>";
	
exit();

}

if(empty($c_image)){
	
$c_image = $customer_image;

}else{

$allowed = array('jpeg','jpg','gif','png','tif','avi');

$file_extension = pathinfo($c_image, PATHINFO_EXTENSION);

if(!in_array($file_extension,$allowed)){
 
echo "<script>alert('Your File Format,Extension Is Not Supported.')</script>";

exit();

}else{

move_uploaded_file($c_image_tmp,"customer_images/$c_image");

}    

}

$update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id'";

$run_customer = mysqli_query($con,$update_customer);

if($run_customer){

echo "<script> alert('Your Account Has Been Updated Successfully.'); </script>";

echo "<script> window.open('my_account.php?edit_account','_self');  </script>";

}

}


?>