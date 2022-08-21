<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

$include_page = "shop"

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

<body  class="  text-muted">
<?php  include "includes/header.php" ?>
<?php  include "includes/navbar.php" ?>

   


    <div id="content">
        <!-- content Starts -->
        <div class="container">
            <!-- container Starts -->

      
		    <section>
                <div class="col-xs-12 col-md-12 col-sm-12" 
                    style="background-image: url(images/shop.png); height: 250px;margin-top: -20px">
            
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

                    <li>Shop</li>

                </ul><!-- breadcrumb Ends -->
                </div>
            </section>

            <div class="col-md-12 col-xs-12 col-sm-12" style="background-color: white;padding: 30px;margin-bottom: 50px">
                <div class="col-md-3">
                <!-- col-md-3 Starts -->

                <?php include("includes/sidebar.php"); ?>

            </div><!-- col-md-3 Ends -->

            <div class="col-md-9">
                <!-- col-md-9 Starts --->

                

                <div class="row flex-wrap" id="Products">
                    <!-- row Starts -->

                    <?php getProducts(""); ?>

                </div><!-- row Ends -->

                <div style="float: right;">
                    <!-- center Starts -->

                    <ul class="pagination pager" style="height: 50px">
                        <!-- pagination Starts -->

                        <?php getPaginator(""); ?>

                    </ul><!-- pagination Ends -->

                </div><!-- center Ends -->

            </div><!-- col-md-9 Ends --->
            </div>

            <div id="wait" style="position:absolute;top:40%;left:45%;padding:100px;padding-top:200px;">
                <!--- wait Starts -->

            </div>
            <!--- wait Ends -->

        </div><!-- container Ends -->
    </div><!-- content Ends -->



    <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery.min.js"> </script>

    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            /// Hide And Show Code Starts ///

            $('.nav-toggle').click(function() {

                $(".panel-collapse,.collapse-data").slideToggle(700, function() {

                    if ($(this).css('display') == 'none') {

                        $(".hide-show").html('Show');

                    } else {

                        $(".hide-show").html('Hide');

                    }

                });

            });

            /// Hide And Show Code Ends ///

            /// Search Filters code Starts /// 

            $(function() {

                $.fn.extend({

                    filterTable: function() {

                        return this.each(function() {

                            $(this).on('keyup', function() {

                                var $this = $(this),

                                    search = $this.val().toLowerCase(),

                                    target = $this.attr('data-filters'),

                                    handle = $(target),

                                    rows = handle.find('li a');

                                if (search == '') {

                                    rows.show();

                                } else {

                                    rows.each(function() {

                                        var $this = $(this);

                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

                                    });

                                }

                            });

                        });

                    }

                });

                $('[data-action="filter"][id="dev-table-filter"]').filterTable();

            });

            /// Search Filters code Ends /// 

        });
    </script>


    <script>
        $(document).ready(function() {

            // getProducts Function Code Starts 

            function getProducts() {

                // Manufacturers Code Starts 

                var sPath = '';

                var aInputs = $('li').find('.get_manufacturer');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput) {

                    if (oInput.checked) {

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if (aKeys.length > 0) {

                    var sPath = '';

                    for (var i = 0; i < aKeys.length; i++) {

                        sPath = sPath + 'man[]=' + aKeys[i] + '&';

                    }

                }

                // Manufacturers Code ENDS 

                // Products Categories Code Starts 

                var aInputs = Array();

                var aInputs = $('li').find('.get_p_cat');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput) {

                    if (oInput.checked) {

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if (aKeys.length > 0) {

                    for (var i = 0; i < aKeys.length; i++) {

                        sPath = sPath + 'p_cat[]=' + aKeys[i] + '&';

                    }

                }

                // Products Categories Code ENDS 

                // Categories Code Starts 

                var aInputs = Array();

                var aInputs = $('li').find('.get_cat');

                var aKeys = Array();

                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput) {

                    if (oInput.checked) {

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if (aKeys.length > 0) {

                    for (var i = 0; i < aKeys.length; i++) {

                        sPath = sPath + 'cat[]=' + aKeys[i] + '&';

                    }

                }

                // Categories Code ENDS 

                // Loader Code Starts 

                $('#wait').html('<img src="images/load.gif">');

                // Loader Code ENDS

                // ajax Code Starts 

                $.ajax({

                    url: "load.php",

                    method: "POST",

                    data: sPath + 'sAction=getProducts&vendor_id=',

                    success: function(data) {

                        $('#Products').html('');

                        $('#Products').html(data);

                        $("#wait").empty();

                    }

                });

                $.ajax({
                    url: "load.php",
                    method: "POST",
                    data: sPath + 'sAction=getPaginator&vendor_id=',
                    success: function(data) {
                        $('.pagination').html('');
                        $('.pagination').html(data);
                    }

                });

                // ajax Code Ends 

            }

            // getProducts Function Code Ends    

            $('.get_manufacturer').click(function() {

                getProducts();

            });


            $('.get_p_cat').click(function() {

                getProducts();

            });

            $('.get_cat').click(function() {

                getProducts();

            });


        });
    </script>

</body>

</html>