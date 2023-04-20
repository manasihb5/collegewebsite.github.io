<?php

//Includes
include('conn.php');

use PHPMailer\PHPMailer\PHPMailer;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/autoload.php';
//

//Getting Data from frontend
$name = mysqli_real_escape_string($conn, $_POST['uname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$otp = random_int(100000, 999999);


$arr = array(
    "{{uname}}" => $name,
    "{email}" => $email,
    "{{OTP}}" => $otp,
);
$templatefile = "mail.php";

$message = file_get_contents($templatefile);
foreach (array_keys($arr) as $key) {
    $message = str_replace($key, $arr[$key], $message);
}
//Registering a user in Database;
$get_student = "SELECT * FROM users WHERE email = '$email'";
$get = mysqli_query($conn, $get_student);
$rows = mysqli_num_rows($get);
if ($rows > 0) {
    echo "Email Already Exist, Please Login";
} else {
    $query = "INSERT INTO users (uname,email,password,is_verified) VALUES ('$name','$email','$password',0)";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $uid = $conn->insert_id;
        $sql = "INSERT INTO otps (uid,email,otp) VALUES ('$uid','$email','$otp')";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {

            $mail = new PHPMailer(true);

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 2;           // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'ronaklala2010@gmail.com'; // your email id
            $mail->Password = 'gctmxllniflomvjn'; // your password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;     //587 is used for Outgoing Mail (SMTP) Server.
            $mail->setFrom('boltatebhai@gmail.com', 'Lokmanya Tilak College');
            $mail->addAddress($email);   // Add a recipient
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'OTP for Registration';
            $mail->Body    = $message;
            if (!$mail->send()) {
                echo 'Message was not sent.';
                echo 'Mailer error: ' . $mail->ErrorInfo;
            } else {
                $otp = base64_encode($otp);
                header("location:otp.php?uid=" . $uid . "&pd=" . $otp);
            }
        }
    }
}