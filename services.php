<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>

<html>

<head>

<title>E commerce Store </title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<?php include"includes/header.php" ?>

<?php include"includes/navbar.php"?>

</div><!-- container Ends -->
</div><!-- navbar navbar-default Ends -->


<div class="container" style="margin-bottom: 50px">
	
	<div id="content" style="padding: 0px 10px 0px 10px"><!-- content Starts -->
		
		<section>
	        <div class="col-xs-12 col-md-12 col-sm-12" 
	            style="background-image: url(images/services.png); height: 250px;margin-top: -20px;">
	    
	        </div>
	    </section>

		<section><!-- container Starts -->

			<div class="col-xs-12 col-md-12 col-sm-12"  style="padding: 0px" ><!--- col-md-12 Starts -->

				<ul class="breadcrumb" ><!-- breadcrumb Starts -->

				<li>
				<a href="index.php">Home</a>
				</li>

				<li>Services</li>

				</ul><!-- breadcrumb Ends -->

			</div><!--- col-md-12 Ends -->

		</section>


		<section>
			<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: white;padding: 30px" ><!-- col-md-12 Starts -->

				<div style="margin-left: 30px;padding-top: 30px;">
	           		<p style="font-size: 28px;font-weight: bold;">Our
		               <span style="color: red;font-size: 28px;font-weight: bold">Services</p>
		               </span>
		               <p>We offer many different services to our customers</p>
		               <img src="images/line.png" style="margin-bottom: 40px;">

	            	</div> 
				<div class="services row" ><!-- services row Starts -->

				<?php

				$get_services = "select * from services";

				$run_services = mysqli_query($con,$get_services);

				while($row_services = mysqli_fetch_array($run_services)){

				$service_id = $row_services['service_id'];

				$service_title = $row_services['service_title'];

				$service_image = $row_services['service_image'];

				$service_desc = $row_services['service_desc'];

				$service_button = $row_services['service_button'];

				$service_url = $row_services['service_url'];
				$color = $row_services['color'];

				?>



				<div class="col-md-4  col-sm-6 col-xs-12" style="border-radius: 5px;padding-top: 10px;padding-bottom: 10px;color: #303030;margin-bottom: 25px;background-color:<?php echo $color?>;height: 300px" ><!-- col-md-4 col-sm-6 box Starts -->

				<img height="120px" width="120px" src="admin_area/services_images/<?php echo $service_image; ?>"  class="img-responsive">

				<h2 style="font-size: 18px; font-weight: bold; margin-bottom: 10px; margin-top: 30px;"> <?php echo $service_title; ?> </h2>

				<p style="font-size: 15px; text-align: justify; " >
				<?php echo $service_desc; ?>
				</p>

				<a style="padding-left: 68%;color: red;margin-bottom: 20px" href="<?php echo $service_url; ?>">

				<?php echo $service_button; ?>

				</a>

				</div><!-- col-md-4 col-sm-6 box Ends -->

				<?php } ?>

				</div><!-- services row Ends -->

			</div><!-- col-md-12 Ends -->

		</section>


	</div><!-- container Ends -->



</div><!-- content Ends -->


<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>