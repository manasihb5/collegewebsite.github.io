<?php
require('razorpay-php/Razorpay.php');
session_start();

include("conn.php");

$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email ='{$email}'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);

$fetch = "SELECT * FROM user_detail WHERE uid ='{$row['id']}' ";
$result = mysqli_query($conn, $fetch);
$data = mysqli_fetch_assoc($result);

if ($data['year'] == 'First Year') {
    $displayAmount = 135000;
} else if ($data['year'] == 'Second Year') {
    $displayAmount = 125000;
} else if ($data['year'] == 'Third Year') {
    $displayAmount = 129000;
} else {
    $displayAmount = 115000;
}

use Razorpay\Api\Api;

$displayCurrency = "INR";

$api = new Api("rzp_test_Fm9TmWnebBwyI5", 'p9EcOR7uPD2JhEJE2ywI5xD0');
$orderData = [
    'receipt'         => 3456,
    'amount'          => $displayAmount * 100,
    'currency'        => 'INR',
    'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];
if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$data = [
    "key"               => "rzp_test_Fm9TmWnebBwyI5",
    "amount"            => $amount,
    "name"              => $row['uname'],
    "description"       => 'Fees Payment',
    "image"             => "",
    "prefill"           => [
        "name"              => $row['uname'],
        "email"             => $email,
        "contact"           => $data['phno'],
    ],
    "notes"             => [
        "address"           => $data['address'],
        "merchant_order_id" => "12312321",
    ],
    "theme"             => [
        "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require('checkout/manual.php');