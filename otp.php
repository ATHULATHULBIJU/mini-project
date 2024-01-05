<?php

include_once('connection.php');
session_start();

$otp = rand(100000, 999999);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email=$_POST['email'];
echo "EMAIL".$email;
$usertype=$_POST['usertype'];
$_SESSION['usertypeforpwdchange']=$usertype;
$_SESSION['emailforpwdchange']=$email;
echo "EMAIL in session".$_SESSION['emailforpwdchange'];
//$email="aswathyashokmanalil@gmail.com";
 // Generate a 6-digit OTP
 $sql1="select * from tbl_login where email='".$email."'";
 $rslt1=mysqli_query($conn,$sql1);
 if(mysqli_num_rows($rslt1)){

 
 $sql = "INSERT INTO otp_table (email, otp, timestamp, status) VALUES ('$email', '$otp', NOW(), 'unused')";
$rslt=mysqli_query($conn,$sql);

 













				
require 'vendor/autoload.php';
    //Create an instance; passing true enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    // Use SMT
    $mail->isSMTP();
    
    // SMTP settings
    $mail->SMTPDebug = 3;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'athulbijuupm03@gmail.com';
    $mail->Password = 'upil hknz xnao lwzm';                 
    
    // Set 'from' email address and name
    $mail->setFrom('athulbijuupm03@gmail.com', 'AUTOwash');
    
    // Add a recipient email address
    $mail->addAddress($email);
    
    // Email subject and body
    $mail->Subject = 'Welcome To AUTOwash';
    $mail->Body = $otp;
    
    // Send email
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
    
            header('Location: verifyotp.php');
            exit();
}
}
?>