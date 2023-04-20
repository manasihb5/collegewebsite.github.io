<!DOCTYPE html>
<html lang="zxx">

    <!-- Mirrored from demo.dashboardpack.com/marketing-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 14:45:18 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Marketing</title>
        <link rel="icon" href="img/logo.png" type="image/png">

        <link rel="stylesheet" href="css/bootstrap.min.css" />

        <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />

        <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />

        <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />

        <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />

        <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
        <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

        <link rel="stylesheet" href="vendors/datepicker/date-picker.css" />

        <link rel="stylesheet" href="vendors/scroll/scrollable.css" />

        <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />

        <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />

        <link rel="stylesheet" href="vendors/morris/morris.css">

        <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

        <link rel="stylesheet" href="css/metisMenu.css">

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
    </head>

    <body class="crm_body_bg">


        <?php
    include('header.php');
    include('../conn.php');
    ?>


        <section class="main_content dashboard_part large_header_bg">

            <?php
        include('header_top.php');
        ?>

            <div class="main_content_iner ">
                <div class="container-fluid p-0 ">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="single_element">
                                <div class="quick_activity">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="quick_activity_wrap">

                                                <div class="single_quick_activity">
                                                    <div class="count_content">
                                                        <p>Total Students</p>
                                                        <?php
                                                    $sql = "SELECT * FROM users";
                                                    $res = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($res);
                                                    ?>
                                                        <h3><span class="counter"><?php echo $rows; ?></span></h3>
                                                    </div>
                                                </div>

                                                <div class="single_quick_activity">
                                                    <div class="count_content">
                                                        <p>Completed Profile Users</p>
                                                        <?php
                                                    $sql = "SELECT * FROM user_detail";
                                                    $res = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($res);
                                                    ?>
                                                        <h3><span class="counter"><?php echo $rows; ?></span></h3>
                                                    </div>
                                                </div>

                                                <div class="single_quick_activity">
                                                    <div class="count_content">
                                                        <p>Number of Students who paid fees</p>
                                                        <?php
                                                    $sql = "SELECT * FROM fees_paid";
                                                    $res = mysqli_query($conn, $sql);
                                                    $rows = mysqli_num_rows($res);
                                                    ?>
                                                        <h3><span class="counter"><?php echo $rows; ?></span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="white_card card_height_100 mb_30 QA_section">
                                <div class="white_card_header">
                                    <div class="box_header m-0">
                                        <div class="main-title">
                                            <h3 class="m-0">Recent Students Registered</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="white_card_body">
                                    <div class="QA_table table-responsive ">

                                        <table class="table pt-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email Address</th>
                                                    <th scope="col">Is verified?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $sql = "SELECT * FROM users";
                                            $res = mysqli_query($conn, $sql);
                                            while ($rows = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $rows['uname']; ?>
                                                    </td>
                                                    <td><?php echo $rows['email']; ?></td>
                                                    <td class="nowrap"><?php
                                                                        if ($rows['is_verified'] == 1) {
                                                                        ?>
                                                        Not Verified
                                                        <?php
                                                                        } else {
                                                        ?>
                                                        Verified
                                                        <?php
                                                                        }
                                                        ?></td>
                                                </tr>
                                                <?php
                                            };
                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <div id="back-top" style="display: none;">
            <a title="Go to Top" href="#">
                <i class="ti-angle-up"></i>
            </a>
        </div>

        <script src="js/jquery-3.4.1.min.js"></script>

        <script src="js/popper.min.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script src="js/metisMenu.js"></script>

        <script src="vendors/count_up/jquery.waypoints.min.js"></script>

        <script src="vendors/chartlist/Chart.min.js"></script>

        <script src="vendors/count_up/jquery.counterup.min.js"></script>

        <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

        <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

        <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
        <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatable/js/buttons.flash.min.js"></script>
        <script src="vendors/datatable/js/jszip.min.js"></script>
        <script src="vendors/datatable/js/pdfmake.min.js"></script>
        <script src="vendors/datatable/js/vfs_fonts.js"></script>
        <script src="vendors/datatable/js/buttons.html5.min.js"></script>
        <script src="vendors/datatable/js/buttons.print.min.js"></script>
        <script src="js/chart.min.js"></script>

        <script src="vendors/progressbar/jquery.barfiller.js"></script>

        <script src="vendors/tagsinput/tagsinput.js"></script>

        <script src="vendors/text_editor/summernote-bs4.js"></script>
        <script src="vendors/am_chart/amcharts.js"></script>

        <script src="vendors/scroll/perfect-scrollbar.min.js"></script>
        <script src="vendors/scroll/scrollable-custom.js"></script>
        <script src="vendors/chart_am/core.js"></script>
        <script src="vendors/chart_am/charts.js"></script>
        <script src="vendors/chart_am/animated.js"></script>
        <script src="vendors/chart_am/kelly.js"></script>
        <script src="vendors/chart_am/chart-custom.js"></script>

        <script src="js/custom.js"></script>
    </body>

    <!-- Mirrored from demo.dashboardpack.com/marketing-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Mar 2022 14:46:08 GMT -->

</html>