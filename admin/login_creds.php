<?php
session_start();
include('../conn.php');
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
if ($email == 'admin@gmail.com' && $pass == 'admin') {
    $_SESSION['admin'] = $email;
    header("location:index.php");
} else {
    echo "Invalid Creds";
}