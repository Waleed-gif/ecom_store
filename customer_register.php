<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

if (isset($_SESSION['customer_email'])) {

    echo "<script> window.open('index.php','_self'); </script>";
}

$select_general_settings = "select * from general_settings";

$run_general_settings = mysqli_query($con, $select_general_settings);

$row_general_settings = mysqli_fetch_array($run_general_settings);

$enable_vendor = $row_general_settings["enable_vendor"];

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

    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>

    <?php include "includes/header.php" ?>

    <?php include "includes/navbar.php" ?>
    </div><!-- container Ends -->
    </div><!-- navbar navbar-default Ends -->



    <section class="container">
        <div class="col-xs-12" style="background-image: url(images/app.png); height: 180px">
    
        </div>
    </section>

    <div id="content">
        <!-- content Starts -->
        <div class="container">
            <!-- container Starts -->

            <div class="col-md-12">
                <!--- col-md-12 Starts -->

                <ul class="breadcrumb">
                    <!-- breadcrumb Starts -->

                    <li>
                        <a href="index.php">Home</a>
                    </li>

                    <li>Register</li>

                </ul><!-- breadcrumb Ends -->

            </div>
            <!--- col-md-12 Ends -->

            <div class="col-md-12 col-xs-12 col-sm-12" style="background-color:  white;padding:0px 0px 0px  20px;margin-bottom: 30px">


               
                <p style="padding-left: 30px;font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;font-variant-numeric: white;">Register a
                 <span style="color: red;font-size: 28px;font-weight: bold;padding-top: 40px;margin-bottom: 10px;font-variant-numeric: white;">new account</p>
             </span>
             
             <div style="padding-left: 30px;margin-bottom: 10px">
                   <img src="images/line.png">
             </div>

                        

                <div class="col-md-6 col-xs-12 col-sm-12" style="background-image: url(images/app.png);height: 660px; margin-top: 3%">
                    
                </div>
                
                <div class="col-md-6 col-xs-12 col-sm-12">
                <!-- col-md-12 Starts -->

                    <div style="background-color: white;padding: 0px 30px 30px  30px">
                        <!-- box Starts -->

                        <div class="box-header">
                            <!-- box-header Starts -->

                       

                        </div><!-- box-header Ends -->

                        <form style="padding: 20px" action="customer_register.php" method="post" enctype="multipart/form-data">
                            <!-- form Starts -->

                            <div class="form-group" >
                                <!-- form-group Starts -->

                                <label class="text-muted">Customer Name</label>

                                <input type="text" class="form-control" style="height: 50px" name="c_name" value="<?php echo @$_POST["c_name"]; ?>" required>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="text-muted"> Customer Email</label>

                                <input type="email" class="form-control" style="height: 50px" name="c_email" value="<?php echo @$_POST["c_email"]; ?>" required>

                            </div><!-- form-group Ends -->



                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="text-muted"> Customer Username </label>

                                <input type="text" class="form-control" style="height: 50px" name="c_username" value="<?php echo @$_POST["c_username"]; ?>" required>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="text-muted"> Customer Password </label>

                                <div class="input-group">
                                    <!-- input-group Starts -->

                                    <span class="input-group-addon">
                                        <!-- input-group-addon Starts -->

                                        <i class="fa fa-check tick1"> </i>

                                        <i class="fa fa-times cross1"> </i>

                                    </span><!-- input-group-addon Ends -->

                                    <input type="password" class="form-control" style="height: 50px" id="pass" name="c_pass" required>

                                    <span class="input-group-addon">
                                        <!-- input-group-addon Starts -->

                                        <div id="meter_wrapper">
                                            <!-- meter_wrapper Starts -->

                                            <span id="pass_type"> </span>

                                            <div id="meter"> </div>

                                        </div><!-- meter_wrapper Ends -->

                                    </span><!-- input-group-addon Ends -->

                                </div><!-- input-group Ends -->

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="text-muted"> Confirm Password </label>

                                <div class="input-group">
                                    <!-- input-group Starts -->

                                    <span class="input-group-addon">
                                        <!-- input-group-addon Starts -->

                                        <i class="fa fa-check tick2"> </i>

                                        <i class="fa fa-times cross2"> </i>

                                    </span><!-- input-group-addon Ends -->

                                    <input type="password" class="form-control confirm" style="height: 50px" id="con_pass" required>

                                </div><!-- input-group Ends -->

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="text-muted"> Customer Contact </label>

                                <input type="text" class="form-control" style="height: 50px" name="c_contact" value="<?php echo @$_POST["c_contact"]; ?>" required>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <label class="text-muted"> Profile Image </label>

                                <input type="file" class="form-control" style="height: 50px; padding-top: 15px" name="c_image" value="<?php echo @$_POST["c_image"]; ?>" required>

                            </div><!-- form-group Ends -->

                            <?php if ($enable_vendor == "yes") { ?>

                                <div class="form-group">
                                    <!-- form-group Starts -->

                                    <label class="text-muted" style="margin-top: 20px;margin-right: 60px"> Customer Role </label>
 

                                    <input type="radio" name="c_role" value="customer" required> I am a customer

                                    <input type="radio" style="margin-left: 30px" name="c_role" value="vendor" required> I am a vendor

                                </div><!-- form-group Ends -->

                            <?php } elseif ($enable_vendor == "no") { ?>

                                <input type="hidden" name="c_role" value="customer">

                            <?php } ?>

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <center>

                                    <label class="text-muted"> Captcha Verification </label>

                                    <div class="g-recaptcha" data-sitekey="6Lc-WxYUAAAAAFUhTFfBEzLGmEgRXHHdsD4ECvIC" required></div>

                                </center>

                            </div><!-- form-group Ends -->


                            <div class="text-center">
                                <!-- text-center Starts -->

                                <button type="submit" style="margin-top: 20px;height: 50px ; width: 100%;font-size: 18px" name="register" class="btn btn-primary">

                                    <i class="fa fa-user-md"></i> Register

                                </button>

                            </div><!-- text-center Ends -->

                        </form><!-- form Ends -->

                    </div><!-- box Ends -->

                </div><!-- col-md-12 Ends -->

            </div>

        </div><!-- container Ends -->

    </div><!-- content Ends -->

    <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.tick1').hide();
            $('.cross1').hide();

            $('.tick2').hide();
            $('.cross2').hide();


            $('.confirm').focusout(function() {

                var password = $('#pass').val();

                var confirmPassword = $('#con_pass').val();

                if (password == confirmPassword) {

                    $('.tick1').show();
                    $('.cross1').hide();

                    $('.tick2').show();
                    $('.cross2').hide();



                } else {

                    $('.tick1').hide();
                    $('.cross1').show();

                    $('.tick2').hide();
                    $('.cross2').show();


                }


            });


        });
    </script>

    <script>
        $(document).ready(function() {

            $("#pass").keyup(function() {

                check_pass();

            });

        });

        function check_pass() {
            var val = document.getElementById("pass").value;
            var meter = document.getElementById("meter");
            var no = 0;
            if (val != "") {
                // If the password length is less than or equal to 6
                if (val.length <= 6) no = 1;

                // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
                if (val.length > 6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) no = 2;

                // If the password length is greater than 6 and contain alphabet,number,special character respectively
                if (val.length > 6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))) no = 3;

                // If the password length is greater than 6 and must contain alphabets,numbers and special characters
                if (val.length > 6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) no = 4;

                if (no == 1) {
                    $("#meter").animate({
                        width: '50px'
                    }, 300);
                    meter.style.backgroundColor = "red";
                    document.getElementById("pass_type").innerHTML = "Very Weak";
                }

                if (no == 2) {
                    $("#meter").animate({
                        width: '100px'
                    }, 300);
                    meter.style.backgroundColor = "#F5BCA9";
                    document.getElementById("pass_type").innerHTML = "Weak";
                }

                if (no == 3) {
                    $("#meter").animate({
                        width: '150px'
                    }, 300);
                    meter.style.backgroundColor = "#FF8000";
                    document.getElementById("pass_type").innerHTML = "Good";
                }

                if (no == 4) {
                    $("#meter").animate({
                        width: '200px'
                    }, 300);
                    meter.style.backgroundColor = "#00FF40";
                    document.getElementById("pass_type").innerHTML = "Strong";
                }
            } else {
                meter.style.backgroundColor = "";
                document.getElementById("pass_type").innerHTML = "";
            }
        }
    </script>

</body>

</html>

<?php

if (isset($_POST['register'])) {

    $secret = "6Lc-WxYUAAAAAN5j2OdDsryWwGfREg5eeuZFpKMv";

    $response = $_POST['g-recaptcha-response'];

    $remoteip = $_SERVER['REMOTE_ADDR'];

    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

    $result = json_decode($url, TRUE);

    $c_name = mysqli_real_escape_string($con, $_POST['c_name']);

    $c_email = mysqli_real_escape_string($con, $_POST['c_email']);

    $c_pass = mysqli_real_escape_string($con, $_POST['c_pass']);

    $encrypted_password = password_hash($c_pass, PASSWORD_DEFAULT);

    $c_username = mysqli_real_escape_string($con, $_POST['c_username']);

    $c_contact = mysqli_real_escape_string($con, $_POST['c_contact']);

    $c_role = mysqli_real_escape_string($con, $_POST['c_role']);

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    $c_ip = getRealUserIp();

    if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {

        echo "<script>alert('Your Email is not a valid email address.');</script>";

        exit();
    }

    $allowed = array('jpeg', 'jpg', 'gif', 'png', 'tif', 'avi');

    $file_extension = pathinfo($c_image, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed)) {

        echo "<script>alert('Your File Format,Extension Is Not Supported.');</script>";

        exit();
    } else {

        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
    }

    $get_email = "select * from customers where customer_email='$c_email'";

    $run_email = mysqli_query($con, $get_email);

    $check_email = mysqli_num_rows($run_email);

    if ($check_email == 1) {

        echo "<script>alert('This email is already registered, try another one')</script>";

        exit();
    }

    $get_name = "select * from customers where customer_name='$c_name'";

    $run_name = mysqli_query($con, $get_name);

    $check_name = mysqli_num_rows($run_name);

    if ($check_name == 1) {

        echo "<script>alert('This name is already registered, please try another one')</script>";

        exit();
    }

    $select_customer_username = "select * from customers where customer_username='$c_username'";

    $run_customer_username = mysqli_query($con, $select_customer_username);

    $count_customer_username = mysqli_num_rows($run_customer_username);

    if ($count_customer_username == 1) {

        echo "<script> alert(' Your Enter User Username Is Already Registered, Please Try Another One. '); </script>";

        exit();
    } else {

        $select_admin_username = "select * from admins where admin_username='$c_username'";

        $run_admin_username = mysqli_query($con, $select_admin_username);

        $count_admin_username = mysqli_num_rows($run_admin_username);

        if ($count_admin_username == 1) {

            echo "<script> alert(' Your Enter User Username Is Already Registered, Please Try Another One. '); </script>";

            exit();
        }
    }

    $customer_confirm_code = mt_rand();

    $subject = "Email Confirmation Message";

    $from = "sad.ahmed22224@gmail.com";

    $message = "

<h2>
Email Confirmation By Computerfever.com $c_name
</h2>

<a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>

Click Here To Confirm Email

</a>

";

    $headers = "From: $from \r\n";

    $headers .= "Content-type: text/html\r\n";

    mail($c_email, $subject, $message, $headers);

    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_username,customer_contact,customer_image,customer_ip,customer_confirm_code,customer_role) values ('$c_name','$c_email','$encrypted_password','$c_username','$c_contact','$c_image','$c_ip','$customer_confirm_code','$c_role')";

    $run_customer = mysqli_query($con, $insert_customer);

    $last_customer_id = mysqli_insert_id($con);

    $insert_customers_addresses = "insert into customers_addresses (customer_id) values ('$last_customer_id')";

    $run_customers_addresses = mysqli_query($con, $insert_customers_addresses);

    if ($c_role == "vendor") {

        $insert_store_settings = "insert into store_settings (vendor_id) values ('$last_customer_id')";

        $run_store_settings = mysqli_query($con, $insert_store_settings);

        $insert_vendor_account = "insert into vendor_accounts (vendor_id) values ('$last_customer_id')";

        $run_vendor_account = mysqli_query($con, $insert_vendor_account);
    }

    $sel_cart = "select * from cart where ip_add='$c_ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart > 0) {

        if ($run_customer) {

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You have been Registered Successfully')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";
        }
    } else {

        $_SESSION['customer_email'] = $c_email;

        echo "<script>alert('You have been Registered Successfully')</script>";

        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>