<?php

include("conn.php");

$uid = $_GET['uid'];
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$phno = mysqli_real_escape_string($conn, $_POST['phno']);
$fatname = mysqli_real_escape_string($conn, $_POST['fatname']);
$fatoccu = mysqli_real_escape_string($conn, $_POST['fatoccu']);
$fatnum = mysqli_real_escape_string($conn, $_POST['fatnum']);
$motname = mysqli_real_escape_string($conn, $_POST['motname']);
$motoccu = mysqli_real_escape_string($conn, $_POST['motoccu']);
$motnum = mysqli_real_escape_string($conn, $_POST['motnum']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$year = mysqli_real_escape_string($conn, $_POST['year']);
$course = mysqli_real_escape_string($conn, $_POST['course']);


$sqldata = 'SELECT * FROM user_detail where uid = ' . $uid;
$result = mysqli_query($conn, $sqldata);
$count = mysqli_num_rows($result);
if ($count == 0) {
    $sql = "INSERT INTO user_detail(uid,lname,phno,fatname,fatoccu,fatnum,motname,motoccu,motnum,address,year,course) VALUES ('$uid','$lname','$phno','$fatname','$fatoccu','$fatnum','$motname','$motoccu','$motnum','$address','$year','$course')";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $update_user = "UPDATE users set is_verified =2 WHERE id = $uid";
        $update = mysqli_query($conn, $update_user);
        if ($update == true) {
            echo "done2";
            header("location:index.php");
        } else {
            echo "Eccor";
        }
    } else {
    }
} else {
    $sql = "UPDATE user_detail set uid = '$uid', lname = '$lname',phno = '$phno',fatname = '$fatname',fatnum = '$fatnum',fatoccu ='$fatoccu',motname = '$motname',motnum = '$motnum',motoccu = '$motoccu',address='$address',year='$year',course='$course' WHERE uid = $uid";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        header("location:index.php");
    } else {
    }
}