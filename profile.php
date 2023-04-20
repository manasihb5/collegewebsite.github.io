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
    $userdata = "SELECT * from users where email = '{$_SESSION['email']}'";
    $sql = mysqli_query($conn, $userdata);
    $row = mysqli_fetch_assoc($sql);

    if ($row['is_verified'] == 2) {
        $get_user_data = "SELECT * FROM user_detail WHERE uid = {$row['id']}";
        $query = mysqli_query($conn, $get_user_data);
        $data = mysqli_fetch_assoc($query);
    ?>
        <section>
            <div class="text-center">
                <h2>Complete your profile Here</h2>
                <hr class="tital_border">
            </div>
            <div class="contact_form1 w-100 ml-auto mr-auto m-t-30">
                <form method="post" action="stud-details.php?uid=<?php echo $row['id']; ?>">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Name" id="name" name="name" class="form-control" required
                                value="<?php echo $row['uname']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" placeholder="Email" id="email" name="email" class="form-control"
                                required value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Last Name" id="surname" name="lname" class="form-control"
                                required value="<?php echo $data['lname']; ?>">
                        </div>
                        <div class="col-sm-6 ">
                            <input type="number" placeholder="Your Phone Number" id="phno" name="phno"
                                class="form-control" required value="<?php echo $data['phno']; ?>">
                        </div>
                    </div>
                    <br />
                    <h4>Family Details</h4>
                    <br />
                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Fathers Name" id="fatname" name="fatname"
                                class="form-control" required value="<?php echo $data['fatname']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Fathers Occupation" id="fatoccu" name="fatoccu"
                                class="form-control" required value="<?php echo $data['fatoccu']; ?>">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-12 ">
                            <input type="number" placeholder="Fathers Phone Number" name="fatnum" class="form-control"
                                required value="<?php echo $data['fatnum']; ?>">
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Mothers Name" name="motname" class="form-control" required
                                value="<?php echo $data['motname']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Mothers Occupation" name="motoccu" class="form-control"
                                required value="<?php echo $data['motoccu']; ?>">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-12 ">
                            <input type="number" placeholder="Mothers Phone Number" name="motnum" class="form-control"
                                required value="<?php echo $data['motnum']; ?>">
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-sm-12 col-sm-offset-1">
                            <div class="form-group">
                                <textarea placeholder="Your Living Address" name="address" rows="1"
                                    class="form-control form_message"
                                    required><?php echo $data['address']; ?></textarea>
                            </div>

                        </div>
                    </div>

                    <h4>Course Details</h4>
                    <br />
                    <div class="row">
                        <div class="col-sm-6 ">
                            <select class="form-select form-control" aria-label="Default select example"
                                style="height:35px" name="year" required placeholder=""
                                value="<?php echo $data['year']; ?>">
                                <option><?php echo $data['year']; ?></option>
                                <option value="" disabled hidden>-----Select Year------</option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Final Year">Final Year</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-select form-control" aria-label="Default select example"
                                style="height:35px" name="course" required placeholder=""
                                value="<?php echo $data['course']; ?>">
                                <option value="" disabled hidden>-----Select Course------</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Checmical Engineering">Checmical Engineering</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <select class="form-select form-control" aria-label="Default select example"
                                style="height:35px" name="year" required placeholder="">
                                <option value="" disabled selected hidden>-----Select Caste------</option>
                                <option value="First Year">OBC</option>
                                <option value="Second Year">General</option>
                                <option value="Third Year">SC / ST</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-default profile_btn col-lg-12">
                        Fill Profile
                    </button>
                    <br />
                </form>
            </div>
        </section>
        <?php
    } else {
    ?>
        <section>
            <div class="text-center">
                <h2>Complete your profile Here</h2>
                <hr class="tital_border">
            </div>
            <div class="contact_form1 w-100 ml-auto mr-auto m-t-30">
                <form method="post" action="stud-details.php?uid=<?php echo $row['id']; ?>">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Name" id="name" name="name" class="form-control" required
                                value="<?php echo $row['uname']; ?>">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" placeholder="Email" id="email" name="email" class="form-control"
                                required value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Last Name" id="surname" name="lname" class="form-control"
                                required>
                        </div>
                        <div class="col-sm-6 ">
                            <input type="number" placeholder="Your Phone Number" id="phno" name="phno"
                                class="form-control" required>
                        </div>
                    </div>
                    <br />
                    <h4>Family Details</h4>
                    <br />
                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Fathers Name" id="fatname" name="fatname"
                                class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Fathers Occupation" id="fatoccu" name="fatoccu"
                                class="form-control" required>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-12 ">
                            <input type="number" placeholder="Fathers Phone Number" name="fatnum" class="form-control"
                                required>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-sm-6 ">
                            <input type="text" placeholder="Mothers Name" name="motname" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Mothers Occupation" name="motoccu" class="form-control"
                                required>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-12 ">
                            <input type="number" placeholder="Mothers Phone Number" name="motnum" class="form-control"
                                required>
                        </div>
                    </div>
                    <br />

                    <div class="row">
                        <div class="col-sm-12 col-sm-offset-1">
                            <div class="form-group">
                                <textarea placeholder="Your Living Address" name="address" rows="1"
                                    class="form-control form_message" required></textarea>
                            </div>

                        </div>
                    </div>

                    <h4>Course Details</h4>
                    <br />
                    <div class="row">
                        <div class="col-sm-6 ">
                            <select class="form-select form-control" aria-label="Default select example"
                                style="height:35px" name="year" required placeholder="">
                                <option value="" disabled selected hidden>-----Select Year------</option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Final Year">Final Year</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-select form-control" aria-label="Default select example"
                                style="height:35px" name="course" required placeholder="">
                                <option value="" selected disabled hidden>-----Select Course------</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Checmical Engineering">Checmical Engineering</option>
                            </select>
                        </div>
                        <div class="col-sm-6 ">
                            <select class="form-select form-control" aria-label="Default select example"
                                style="height:35px" name="year" required placeholder="">
                                <option value="" disabled selected hidden>-----Select Caste------</option>
                                <option value="First Year">OBC</option>
                                <option value="Second Year">General</option>
                                <option value="Third Year">SC / ST</option>
                                <option value="Final Year">Final Year</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-default profile_btn col-lg-12">
                        Fill Profile
                    </button>
                    <br />
                </form>
            </div>
        </section>
        <?php
    }
    ?>
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