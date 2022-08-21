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

<body>

	<!-- header include -->

<?php include"includes/header.php"; ?>
<?php include"includes/navbar.php"?>

	<div id="content">
		<!-- content Starts -->

		<div class="container">
			<!-- container Starts -->
			<section>
		        <div class="col-xs-12 col-md-12 col-sm-12" 
		            style="background-image: url(images/contact.png); height: 250px;margin-top: -20px;">
		    
		        </div>
	    	</section>
			
			<section>
				<div class="col-xs-12 col-md-12 col-sm-12" style="padding: 0px">
				<!--- col-md-12 Starts -->


				<ul class="breadcrumb">
					<!-- breadcrumb Starts -->

					<li>
						<a href="index.php">Home</a>
					</li>

					<li>Contact Us</li>

				</ul><!-- breadcrumb Ends -->
				</div>
			</section>

			<div class="col-md-12 col-xs-12 col-sm-12" style="padding: 0px">
				<!-- col-md-12 Starts -->

				<div class="col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 50px; background-color: white;padding: 30px">

					<div class="col-md-6  col-sm-12 col-xs-12">

						<!-- box Starts -->
						<div style="margin-left: 30px;padding-top: 40px;">
	           			<p style="font-size: 28px;font-weight: bold;">Contact With
		                <span style="color: red;font-size: 28px;font-weight: bold">Our Team</p>
		                </span>
		                <p>Feel free to write to us</p>
		         
		               <img src="images/line.png" style="margin-bottom: 30px;">
	           		</div>

						<img src="images/contect_detail.jpeg" width="100%" style="margin-top: 0%;display: block; margin-left: auto; margin-right: auto" />


					</div>



					<div class="col-md-6 col-sm-12  " style="padding: 40px;  ">

						<form action="contact.php" method="post">
							<!-- form Starts -->

							<div class="form-group">
								<!-- form-group Starts -->

								<label class="text-muted">Name</label>

								<input type="text" class="form-control" style="height: 50px" name="name" required>

							</div><!-- form-group Ends -->

							<div class="form-group">
								<!-- form-group Starts -->

								<label class="text-muted">Email</label>

								<input type="text" class="form-control" style="height: 50px" name="email" required>

							</div><!-- form-group Ends -->

							<div class="form-group">
								<!-- form-group Starts -->

								<label class="text-muted"> Subject </label>

								<input type="text" class="form-control" style="height: 50px" name="subject" required>

							</div><!-- form-group Ends -->

							<div class="form-group">
								<!-- form-group Starts -->

								<label class="text-muted"> Message </label>

								<textarea class="form-control" name="message" style="height: 110px"> </textarea>

							</div><!-- form-group Ends -->


							<div class="form-group">
								<!-- form-group Starts -->

								<!-- <label class="text-muted"> Select Enquiry Type </label> -->


								<select name="enquiry_type" class="form-control" style="height: 50px;margin-top: 20px">
									<!-- select Starts -->

									<option class="text-muted"> Select Enquiry Type </option>

									<?php

									$get_enquiry_types = "select * from enquiry_types";

									$run_enquiry_types = mysqli_query($con, $get_enquiry_types);

									while ($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)) {

										$enquiry_title = $row_enquiry_types['enquiry_title'];

										echo "<option> $enquiry_title </option>";
									}

									?>

								</select><!-- select Ends -->

							</div><!-- form-group Ends -->


							<div class="text-center">
								<!-- text-center Starts -->

								<button type="submit" name="submit" class="btn btn-primary" style="margin-top: 30px;width: 100%;height: 50px">

									<i class="fa fa-user-md"></i> Send Message

								</button>

							</div><!-- text-center Ends -->

						</form><!-- form Ends -->

					</div>

				</div>

				<?php

				if (isset($_POST['submit'])) {

					// Admin receives email through this code

					$sender_name = $_POST['name'];

					$sender_email = $_POST['email'];

					$sender_subject = $_POST['subject'];

					$sender_message = $_POST['message'];

					$enquiry_type = $_POST['enquiry_type'];

					$new_message = "

<h1> This Message Has Been Sent By $sender_name </h1>

<p> <b> Sender Email :  </b> <br> $sender_email </p>

<p> <b> Sender Subject :  </b> <br> $sender_subject </p>

<p> <b> Sender Enquiry Type :  </b> <br> $enquiry_type </p>

<p> <b> Sender Message :  </b> <br> $sender_message </p>

";

					$headers = "From: $sender_email \r\n";

					$headers .= "Content-type: text/html\r\n";

					mail($contact_email, $sender_subject, $new_message, $headers);

					// Send email to sender through this code

					$email = $_POST['email'];

					$subject = "Welcome to my website";

					$msg = "I shall get you soon, thanks for sending us email";

					$from = "sad.ahmed22224@gmail.com";

					mail($email, $subject, $msg, $from);

					echo "<h2 align='center'>Your message has been sent successfully</h2>";
				}


				?>

			</div><!-- box Ends -->

		</div><!-- col-md-12 Ends -->



	</div><!-- container Ends -->
	</div><!-- content Ends -->



	<?php

	include("includes/footer.php");

	?>

	<script src="js/jquery.min.js"> </script>

	<script src="js/bootstrap.min.js"></script>

</body>

</html>