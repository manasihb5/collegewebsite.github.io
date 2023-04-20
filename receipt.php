<?php
include("conn.php");
session_start();

$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email ='{$email}'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);

$fetch = "SELECT * FROM user_detail WHERE uid ='{$row['id']}' ";
$result = mysqli_query($conn, $fetch);
$data = mysqli_fetch_assoc($result);

$uid = $data['uid'];
$year = $_GET['year'];



$bill = "SELECT * FROM fees_paid where uid = '{$uid}' AND syear = '{$year}'";
$bring = mysqli_query($conn, $bill);
$count = mysqli_num_rows($bring);
if ($count != 0) {
    $get_bill = mysqli_fetch_assoc($bring);

    if ($get_bill['syear'] == 'First Year') {
        $displayAmount = 135000;
    } else if ($get_bill['syear'] == 'Second Year') {
        $displayAmount = 125000;
    } else if ($get_bill['syear'] == 'Third Year') {
        $displayAmount = 129000;
    } else {
        $displayAmount = 115000;
    }

?>

<html>

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

    <style>
    body {
        margin-top: 20px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .invoice-container {
        padding: 1rem;
    }

    .invoice-container .invoice-header .invoice-logo {
        margin: 0.8rem 0 0 0;
        display: inline-block;
        font-size: 1.6rem;
        font-weight: 700;
        color: #2e323c;
    }

    .invoice-container .invoice-header .invoice-logo img {
        max-width: 130px;
    }

    .invoice-container .invoice-header address {
        font-size: 0.8rem;
        color: #9fa8b9;
        margin: 0;
    }

    .invoice-container .invoice-details {
        margin: 1rem 0 0 0;
        padding: 1rem;
        line-height: 180%;
        background: #f5f6fa;
    }

    .invoice-container .invoice-details .invoice-num {
        text-align: right;
        font-size: 0.8rem;
    }

    .invoice-container .invoice-body {
        padding: 1rem 0 0 0;
    }

    .invoice-container .invoice-footer {
        text-align: center;
        font-size: 0.7rem;
        margin: 5px 0 0 0;
    }

    .invoice-status {
        text-align: center;
        padding: 1rem;
        background: #ffffff;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        margin-bottom: 1rem;
    }

    .invoice-status h2.status {
        margin: 0 0 0.8rem 0;
    }

    .invoice-status h5.status-title {
        margin: 0 0 0.8rem 0;
        color: #9fa8b9;
    }

    .invoice-status p.status-type {
        margin: 0.5rem 0 0 0;
        padding: 0;
        line-height: 150%;
    }

    .invoice-status i {
        font-size: 1.5rem;
        margin: 0 0 1rem 0;
        display: inline-block;
        padding: 1rem;
        background: #f5f6fa;
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
    }

    .invoice-status .badge {
        text-transform: uppercase;
    }

    @media (max-width: 767px) {
        .invoice-container {
            padding: 1rem;
        }
    }


    .custom-table {
        border: 1px solid #e0e3ec;
    }

    .custom-table thead {
        background: #007ae1;
    }

    .custom-table thead th {
        border: 0;
        color: #ffffff;
    }

    .custom-table>tbody tr:hover {
        background: #fafafa;
    }

    .custom-table>tbody tr:nth-of-type(even) {
        background-color: #ffffff;
    }

    .custom-table>tbody td {
        border: 1px solid #e6e9f0;
    }


    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }

    .text-success {
        color: #00bb42 !important;
    }

    .text-muted {
        color: #9fa8b9 !important;
    }

    .custom-actions-btns {
        margin: auto;
        display: flex;
        justify-content: flex-end;
    }

    .custom-actions-btns .btn {
        margin: .3rem 0 .3rem .3rem;
    }
    </style>


    <body>


        <div class="container">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="invoice-container">
                                <div class="invoice-header">
                                    <!-- Row end -->
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <a href="index.html" class="invoice-logo">
                                                Lokmanya Tilak Engineering College
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <address class="text-right">
                                                Maxwell admin Inc, 45 NorthWest Street.<br>
                                                Sunrise Blvd, San Francisco.<br>
                                                00000 00000
                                            </address>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                            <div class="invoice-details">
                                                <div class="invoice-num">
                                                    <div>Invoice - #<?php echo $get_bill['id']; ?></div>
                                                    <div>
                                                        <?php echo date('M j Y g:i A', strtotime($get_bill['createdAt'])); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                                <div class="invoice-body">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table custom-table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Course</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Transaction Id</th>
                                                            <th>Year</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?php echo $data['course']; ?>
                                                            </td>
                                                            <td><?php echo $row['uname']; ?></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo $get_bill['txn_id']; ?></td>
                                                            <td><?php echo $get_bill['syear']; ?></td>
                                                            <td><?php echo number_format($displayAmount); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                                <div class="invoice-footer">
                                    This is computer generated Receipt
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
<?php
} else {
    echo "No Bill Found";
}

?>