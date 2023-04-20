<?php
session_start();
include("conn.php");
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$res = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($res);
if ($rows == 0) {
    echo "Email ID Not registered or Invalid Credentials";
} else {
    if ($rows['is_verified'] == 0) {
        $query = "SELECT * from otps where email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        echo "OTP has been sent to your email for Verification please verify <a href = 'otp.php?uid=" . $rows['id'] . "&pd=" . base64_encode($row['otp']) . "'>here</a>";
    } else if ($rows['is_verified'] == 1) {
        $_SESSION['email'] = $rows['email'];
        header('location:profile.php');
    } else {
        $_SESSION['email'] = $rows['email'];
        header("location:index.php");
    }
}