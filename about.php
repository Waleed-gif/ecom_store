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

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">

	<link href="styles/bootstrap.min.css" rel="stylesheet">

	<link href="styles/style.css" rel="stylesheet">

	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body class="text-muted" style="text-align: justify;background-color: #fbfbfb">

<?php include"includes/header.php"; ?>
<?php include"includes/navbar.php"?>


	<div id="content">
		<!-- content Starts -->
		<div class="container">
			<!-- container Starts -->

		    <section>
                <div class="col-xs-12 col-md-12 col-sm-12" 
                    style="background-image: url(images/about.png); height: 250px;margin-top: -20px">
            
                </div>
            </section>

			<section>
				<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px">
				<!--- col-md-12 Starts -->

				<ul class="breadcrumb">
					<!-- breadcrumb Starts -->

					<li>
						<a href="index.php">Home</a>
					</li>

					<li>About Us</li>

				</ul><!-- breadcrumb Ends -->
			</div>
			</section>
			<div class="col-md-12" style="margin-bottom: 30px;height: 450px;background-color: white">

			 	<div class="col-sm-6 col-xs-12 col-md-6" style="padding-top: 10%">
			 		<center>
			 			<img src="images/about.jpg" height="280px">
			 		</center>
			 	</div>

		 		<div class="col-sm-6 col-xs-12 col-md-6">
		 	 
					<div style="padding-top: 40px;">
	           		<p style="font-size: 28px;font-weight: bold;">Who
		               <span style="color: red;font-size: 28px;font-weight: bold">We Are</p>
		               </span>
		               <img src="images/line.png" style="margin-bottom: 30px;">

	            	</div> 
		        <p style="text-align: justify;">
		           	
						It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,

		        </p>

		        <p>
		           	Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
		        </p>
		         

			 	</div>
			 </div>

				<div class="col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 30px;padding-bottom: 30px;background-color: white">
					<!-- col-md-12 Starts -->


					<center>
						 <div style="margin-left: 30px;padding-top: 40px;">
		           		<p style="font-size: 28px;font-weight: bold;">Our
			               <span style="color: red;font-size: 28px;font-weight: bold">Foundation</p>
			               </span>
			             
			         
			               <img src="images/line.png" style="margin-bottom: 30px;">
		           </div>
					</center>

					<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 15px">

						<div class="card" style="padding-bottom: 25px;border: solid 1px #e7e4e4;width: 100%;border-radius: 5px;">

							<img src="images/pay.gif" alt="Avatar" width="100%" height="300px">

							<div class="container" style="margin-top: 10px;padding-right: 20px">
								<h4><b>Our Mission</b></h4>
								<p style="width: 25%;padding-right: 15px;">Our mission is to provide a plateform to user to build stor</p>
							</div>

						</div><!-- box Ends -->

					</div>
					<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 15px">

						<div class="card" style="padding-bottom: 25px;border: solid 1px #e7e4e4;width: 100%;border-radius: 5px;">

							<img src="images/pay.gif" alt="Avatar" width="100%" height="300px">

							<div class="container" style="margin-top: 10px;padding-right: 20px">
								<h4><b>Our Mission</b></h4>
								<p style="width: 25%;padding-right: 15px;">Our mission is to provide a plateform to user to build stor</p>
							</div>

						</div><!-- box Ends -->

					</div>
					<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 15px">

						<div class="card" style="padding-bottom: 25px;border: solid 1px #e7e4e4;width: 100%;border-radius: 5px;">

							<img src="images/pay.gif" alt="Avatar" width="100%" height="300px">

							<div class="container" style="margin-top: 10px;padding-right: 20px">
								<h4><b>Our Mission</b></h4>
								<p style="width: 25%;padding-right: 15px;">Our mission is to provide a plateform to user to build stor</p>
							</div>

						</div><!-- box Ends -->

					</div>

				 
				</div>

			<section>
			
				<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: white;margin-bottom: 30px;padding-bottom: 30px">
					 
		           <div style="margin-left: 30px;padding-top: 40px;">
		           		<p style="font-size: 28px;font-weight: bold;">Meet our
			               <span style="color: red;font-size: 28px;font-weight: bold">Team</p>
			               </span>
			               <p>We are passionate about our work, we work hard</p>
			         
			               <img src="images/line.png" style="margin-bottom: 30px;">
		           </div>

		           <div class="col-md-12 col-sm-12 col-xs-12">
			         
			         	<div class="col-md-4"></div>
				        <img class="col-md-4" src="images/adnan.png">
				        <div class="col-md-4"></div>
			           
		           </div>

		           <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px">
		           		<div class="col-md-2"></div>
			           	<img class="col-md-4" src="images/shehrozz.png">
			           	<img class="col-md-4" src="images/waleed.png">
			           	<div class="col-md-2"></div>

		           </div>
		           <div class="col-md-12 col-sm-12 col-xs-12"  style="margin-top: 20px">
		           	
			           	<img class="col-md-4" src="images/sumaira.png">
			           	<img class="col-md-4" src="images/rana.png">
			           	<img class="col-md-4" src="images/rana.png">

		           </div> 
				</div>

			</section>

		</div><!-- container Ends -->#

		
	</div><!-- content Ends -->



	<?php

	include("includes/footer.php");

	?>

	<script src="js/jquery.min.js"> </script>

	<script src="js/bootstrap.min.js"></script>

</body>

</html>