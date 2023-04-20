<?php

session_start();
require('conn.php');

require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api('rzp_test_Fm9TmWnebBwyI5', 'p9EcOR7uPD2JhEJE2ywI5xD0');

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature'],
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {

    $user_info = "SELECT * FROM users where email = '{$_SESSION['email']}'";
    $result = mysqli_query($conn, $user_info);
    $rows = mysqli_fetch_assoc($result);


    $details = "SELECT * FROM user_detail WHERE uid = '{$rows['id']}'";
    $res = mysqli_query($conn, $details);
    $data = mysqli_fetch_assoc($res);

    $check = "SELECT * FROM fees_paid WHERE uid = '{$rows['id']}' AND syear = '{$data['year']}'";
    $uid = $rows['id'];
    $year = $data['year'];
    $course = $data['course'];
    $txn = $_POST['razorpay_payment_id'];
    $cres = mysqli_query($conn, $check);
    $crow = mysqli_num_rows($cres);
    if ($crow == 0) {
        $sql = "INSERT INTO fees_paid(uid,txn_id,syear,course) VALUES ('$uid','$txn','$year','$course')";
        $put = mysqli_query($conn, $sql);
        if ($put == true) {
            echo "Fees successfully Paid";
        } else {
            echo "error" . $conn->error;
        }
    } else {
        echo "error";
    }
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}