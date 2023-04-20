<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="icon" href="assets/images/fave.png" type="image/x-icon" />


        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <meta http-equiv="content-language" content="en-us">
        <meta http-equiv="content-type" content="text/HTML" charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description"
            content=" LTCE is a theme which is well organised and easy to understand. The templates layout are easy to modify or customize for your web pages. Templates are used various purpose such as website, business, corporate, portfolio, etc. Browse for unique HTML/CSS  Themes. Powerful site template design in a clean and minimalistic style. LTCE theme templates by Crescent Theme exclusive on themeforest.">
        <meta property="og:description"
            content="Best education html Theme for educational, training center, education center, university, college, kindergarten, courses hub and academy." />
        <meta name="keywords"
            content="education theme, education, best education, html, html templates, css templates, css, website templates, blogger template, studypoint, study-point, study, LTCE, school, teaching, Responsive, Landing, Bootstrap, Bootstrap 4,Template, school layout, school template ">
        <meta property="og:title" content="LTCE - Creative Multi-Purpose Education Theme" />
        <meta name="author" content="Crescent-Theme">
        <meta name="copyright" content="copyright 2019 Crescent Theme">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <link href="assets/css/font-awesome.css" rel="stylesheet" />

        <link href="assets/css/custom-font.css" rel="stylesheet" />

        <link
            href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
            rel="stylesheet">

        <link href="assets/plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" />
        <link href="assets/plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" />

        <link href="assets/css/navigation.css" rel="stylesheet" />
        <link href="assets/css/preloader.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />

        <link href="assets/css/responsive.css" rel="stylesheet" />
    </head>

    <body>
        <?php
    include('header.php');
    include("conn.php");

    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email ='{$email}'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);

    $fetch = "SELECT * FROM user_detail WHERE uid ='{$row['id']}' ";
    $result = mysqli_query($conn, $fetch);
    $data = mysqli_fetch_assoc($result);

    $uid = $data['uid'];
    $year = $data['year'];

    if ($data['year'] == 'First Year') {
        $displayAmount = 135000;
    } else if ($data['year'] == 'Second Year') {
        $displayAmount = 125000;
    } else if ($data['year'] == 'Third Year') {
        $displayAmount = 129000;
    } else if ($data['year'] == "Exam") {
        $displayAmount = 1600;
    } else {
        $displayAmount = 115000;
    }
    ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page_tital">
                        <h2>Fees Details</h2>
                        <hr class="tital_border m-l-0">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="event_text">
                        <h4><a href="#">First Year</a></h4>
                        <p>Fees For First year is 135000 for all the branches.</p>
                        <a href="receipt.php?uid=<?php echo $uid; ?>&&year=First Year"><button
                                class="btn btn-primary">View receipt</button></a>
                        <?php
                    $sql = "SELECT * FROM fees_paid WHERE uid = '{$uid}' AND syear = '{$year}'";
                    $res = mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($res);
                    if ($rows === 0 && $data['year'] == 'First Year') {
                    ?>
                        <button class="btn btn-primary" id="rzp-button1">Pay</button>
                        <?php
                    } else {
                        while ($ft = mysqli_fetch_assoc($res)) {
                            if ($ft['syear'] != 'First Year') {
                            } else {
                        ?>
                        <button class="btn btn-primary">Paid</button>
                        <?php
                            }
                        }
                    }
                    ?>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="event_text">
                        <h4><a href="#">Second Year</a></h4>
                        <p>Fees For Second year is 125000 for all the branches.</p>
                        <a href="receipt.php?uid=<?php echo $uid; ?>&&year=Second Year"><button
                                class="btn btn-primary">View receipt</button></a>
                        <?php
                    $sql = "SELECT * FROM fees_paid WHERE uid = '{$uid}' AND syear = '{$year}'";
                    $res = mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($res);

                    if ($rows === 0 && $data['year'] == 'Second Year') {
                    ?>
                        <button class="btn btn-primary" id="rzp-button1">Pay</button>
                        <?php
                    } else {
                        while ($ft = mysqli_fetch_assoc($res)) {
                            if ($ft['syear'] != 'Second Year') {
                            } else {
                        ?>
                        <button class="btn btn-primary">Paid</button>
                        <?php
                            }
                        }
                    }
                    ?>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="event_text">
                        <h4><a href="#">Third Year</a></h4>
                        <p>Fees For Third year is 129000 for all the branches.</p>
                        <a href="receipt.php?uid=<?php echo $uid; ?>&&year=Third Year"><button
                                class="btn btn-primary">View receipt</button></a>
                        <?php
                    $sql = "SELECT * FROM fees_paid WHERE uid = '{$uid}' AND syear = '{$year}'";
                    $res = mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($res);
                    if ($rows === 0 && $data['year'] == 'Third Year') {
                    ?>
                        <button class="btn btn-primary" id="rzp-button1">Pay</button>
                        <?php
                    } else {
                        while ($ft = mysqli_fetch_assoc($res)) {
                            if ($ft['syear'] != 'Third Year') {
                            } else {
                        ?>
                        <button class="btn btn-primary">Paid</button>
                        <?php
                            }
                        }
                    }
                    ?>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="event_text">
                        <h4><a href="#">Final Year</a></h4>
                        <p>Fees For Final year is 115000 for all the branches.</p>
                        <a href="receipt.php?uid=<?php echo $uid; ?>&&year=Final Year"><button
                                class="btn btn-primary">View receipt</button></a>
                        <?php
                    $sql = "SELECT * FROM fees_paid WHERE uid = '{$uid}' AND syear = '{$year}'";
                    $res = mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($res);
                    if ($rows === 0 && $data['year'] == 'Final Year') {
                    ?>
                        <button class="btn btn-primary" id="rzp-button1">Pay</button>
                        <?php
                    } else {
                        while ($ft = mysqli_fetch_assoc($res)) {
                            if ($ft['syear'] != 'Final Year') {
                            } else {
                        ?>
                        <button class="btn btn-primary">Paid</button>
                        <?php
                            }
                        }
                    }
                    ?>

                    </div>
                </div>
                <br />
                <div class="col-sm-4 col-md-3 mt-5">
                    <div class="event_text">
                        <h4><a href="#">Exam Fees</a></h4>
                        <p>Fees For Exam Fees is 1600 for all the branches.</p>
                        <a href="receipt.php?uid=<?php echo $uid; ?>&&year=Exam"><button class="btn btn-primary">View
                                receipt</button></a>
                        <?php
                    $sql = "SELECT * FROM fees_paid WHERE uid = '{$uid}' AND syear = '{$year}'";
                    $res = mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($res);
                    if ($rows === 0 && $data['year'] == 'Final Year') {
                    ?>
                        <button class="btn btn-primary" id="rzp-button1">Pay</button>
                        <?php
                    } else {
                        while ($ft = mysqli_fetch_assoc($res)) {
                            if ($ft['syear'] != 'Final Year') {
                            } else {
                        ?>
                        <button class="btn btn-primary">Paid</button>
                        <?php
                            }
                        }
                    }
                    ?>

                    </div>
                </div>

                <div class="col-sm-4 col-md-3 mt-5">
                    <div class="event_text">
                        <h4><a href="#">Miscellaneous Fees</a></h4>
                        <p>penalty fees for any damage you do to the college property </p>
                        <a href="receipt.php?uid=<?php echo $uid; ?>&&year=Final Year"><button
                                class="btn btn-primary">View receipt</button></a>
                        <!-- <button class="btn btn-primary" id="rzp-button1">Pay</button> -->

                    </div>
                </div>
            </div>
        </div>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <form name='razorpayform' action="verify.php" method="POST">
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <input type="hidden" name="razorpay_signature" id="razorpay_signature">
        </form>
        <script>
        var options = <?php echo $json ?>;
        options.handler = function(response) {
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('razorpay_signature').value = response.razorpay_signature;
            document.razorpayform.submit();
        };
        options.theme.image_padding = false;
        options.modal = {
            ondismiss: function() {},
            escape: true,
            backdropclose: false
        };
        var rzp = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp.open();
            e.preventDefault();
        }
        </script>
        <a class="btn btn-lg  scrollup"><i class="fa fa-arrow-up"></i></a>

        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>

        <script src="assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>

        <script src="assets/js/jquery.magnific-popup.min.js"></script>

        <script src="assets/js/mobilemenu.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
    </body>

</html>