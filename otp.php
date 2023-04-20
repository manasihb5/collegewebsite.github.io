<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-us">

    <!-- Mirrored from listingthemes.com/studypoint/v1.2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jul 2022 15:32:08 GMT -->

    <head>
        <title>LTCE - Creative Multi-Purpose Education Theme</title>
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

    <body data-spy="scroll" data-target=".navbar" data-offset="50" class="home">
        <?php
    include('header.php');
    include('conn.php');
    ?> <section>
            <?php
        $uid = $_GET['uid'];
        $otp = base64_decode($_GET['pd']);
        $sql = "SELECT * FROM users WHERE id = '$uid'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        ?>
            <div class="text-center">
                <h2>Enter The OTP sent on, <?php echo $row['email']; ?></h2>
            </div>
            <div class="contact_form1 w-100 ml-auto mr-auto m-t-30">

                <div class="row">
                    <div class="col-sm-12 col-sm-offset-1">
                        <div class="form-group">
                            <input type="number" placeholder="Enter the OTP" id="otp" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-default profile_btn col-lg-12" id="activate">
                            Activate Account
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <script>
        $("#activate").on("click", function(e) {
            e.preventDefault();
            const otp = <?php echo $otp; ?>;
            var e_otp = $("#otp").val();
            if (otp == e_otp) {
                <?php
                $sql = "UPDATE users set is_verified = 1  where id = '$uid'";
                $res = mysqli_query($conn, $sql);
                if ($res == true) {
                    $query = "DELETE from otps WHERE uid = '$uid'";
                    $result = mysqli_query($conn, $query);
                    if ($result == true) {
                ?>
                alert("Profile Activated Successfully, Please Login Now");
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 1000)
                <?php
                    }
                }
                ?>
            } else {
                alert("Entered OTP is Incorrect");
            }
        })
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

</html>