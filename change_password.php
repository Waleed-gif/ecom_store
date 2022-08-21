<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

if (isset($_SESSION['customer_email'])) {

    echo " <script> window.open('checkout.php','_self'); </script> ";
}

if (!isset($_GET['change_password'])) {

    echo " <script> window.open('checkout.php','_self'); </script> ";
} else {

    $hash_password = mysqli_real_escape_string($con, $_GET['change_password']);

    $select_customer = "select * from customers where customer_pass='$hash_password'";

    $run_customer = mysqli_query($con, $select_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_name = $row_customer['customer_name'];

    $count_customer = mysqli_num_rows($run_customer);

    if ($count_customer == 0) {

        echo " <script> window.open('checkout.php','_self'); </script> ";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>E commerce Store </title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">

    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <link href="styles/style.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<?php include"includes/header.php"; ?>
<?php include"includes/navbar.php"?>

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

            <div class="col-md-12">
                <!-- col-md-12 Starts -->

                <div class="box">
                    <!-- box Starts -->

                    <div class="box-header">
                        <!-- box-header Starts -->

                        <center>

                            <h3> Dear <?php echo $customer_name; ?> , Reset/Change Password </h3>

                        </center>

                    </div><!-- box-header Ends -->

                    <div align="center">
                        <!-- center div Starts -->

                        <form action="" method="post">
                            <!-- form Starts -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <input type="password" class="form-control" name="customer_pass" placeholder="New Password" required>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <input type="password" class="form-control" name="confirm_customer_pass" placeholder="Confirm New Password" required>

                            </div><!-- form-group Ends -->

                            <div class="form-group">
                                <!-- form-group Starts -->

                                <input type="submit" name="reset_password" class="btn btn-primary" value="Reset Password">

                            </div><!-- form-group Ends -->

                        </form><!-- form Ends -->

                    </div><!-- center div Ends -->

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

<?php

if (isset($_POST['reset_password'])) {

    $hash_password = mysqli_real_escape_string($con, $_GET['change_password']);

    $customer_pass = mysqli_real_escape_string($con, $_POST['customer_pass']);

    $confirm_customer_pass = mysqli_real_escape_string($con, $_POST['confirm_customer_pass']);

    if ($customer_pass != $confirm_customer_pass) {

        echo "

<script>

alert('Your New Password Does Not Match, Please Try Again.');
 
</script>

";
    } else {

        $encrypted_password = password_hash($confirm_customer_pass, PASSWORD_DEFAULT);

        $upadte_customer_password = "update customers set customer_pass='$encrypted_password' where customer_pass='$hash_password'";

        $run_customer_password = mysqli_query($con, $upadte_customer_password);

        if ($run_customer_password) {

            echo "

<script>

alert('Your Customer Password Has Been Successfully Changed.');

window.open('checkout.php','_self');

</script>

";
        }
    }
}

?>