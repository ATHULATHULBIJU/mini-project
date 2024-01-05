<?php
session_start();
include_once('connection.php');
$cartype = $_SESSION['cartypeID'];
echo "<br />";
echo "car type id".$cartype;
$washtype = $_SESSION['washtypeID'];
echo "<br />";
echo "wash type id".$washtype;
$slot = $_SESSION['slottypeID'];
echo "<br />";
echo "slot type id".$slot;
$date = $_SESSION['bookDate'];
echo "<br />";
echo "bookdate id".$date;
$regno = $_SESSION['vehicleno'];


$custid = $_SESSION['customerid'];
$Email =  $_SESSION['customeremail'];
echo $Email;



?>

<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>


<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{ echo "inside the post";
   $cardnumber=$_POST['cardNumber'];
   $cardname=$_POST['cardName'];
   $cardmonth=$_POST['cardMonth'];
   $cardyear=$_POST['cardYear'];
   $cardCvv=$_POST['cardCvv'];
   $amount=$_POST['amount'];
//    echo "<br />";
//    echo "cardNumber".$cardnumber;
//    echo "<br />";
//    echo "cardName".$cardname;
//    echo "<br />";
//    echo "cardMonth".$cardmonth;
//    echo "<br />";
//    echo "cardYear".$cardyear;
//    echo "<br />";
//    echo "cardCvv".$cardCvv;
//    echo "<br />";
   $total=$_SESSION['totamountservice']  ;
echo "total amount".$total;
   
// $advamt=$total*10/100;
//    echo "advanceamt".$advamt;
}



echo "dfassssssssssssssssssssssssssssssss";
//$_SESSION['pending']=0;
if($_SESSION['pending']!=1){
    $advamt=$_SESSION['totamountservice'] *10/100 ;
    $sql = "INSERT into booking(cust_id,car_id,wash_id,bookdate,regno,totalamount) values('$custid','$cartype','$washtype','$date','$regno','$total')";
    
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo mysqli_error($conn);
    }
    $book_id= mysqli_insert_id($conn);
    $sql1 = "SELECT * FROM tbl_type WHERE t_id = " . $washtype;
    $rslt = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($rslt); // Use mysqli_fetch_assoc to get an associative array

    if ($row) {
        $duration = intval($row['duration']);
        //$duration = (int)$row['duration'];
        if ($duration + $slot <= 9) {
            for ($i = 1; $i <= $duration; $i++) {
              
                
                $sql = "INSERT into slot_booking(book_id,slot_id,bookdate) values('$book_id','$slot','$date')";
                $slot = $slot + 1;
                $result = mysqli_query($conn, $sql);
                //$last_id = mysqli_insert_id($conn);
                
            } 
         }
         else {
            
            echo "<script>alert('Time duration exceed closing time. Choose another slot');</script>";
        }
         }
         
         $sql="INSERT INTO tbl_spayment(c_id,booking_id,cardnumber,cardholdername,month,year,cvv,amount) values('$custid',' $book_id','$cardnumber','$cardname','$cardmonth','$cardyear','$cardCvv','$advamt')";
            $result=mysqli_query($conn,$sql);
         } 
         else{
            //booking id
            if(isset($_SESSION['book_id'])){
                $book_id=$_SESSION['book_id'];
               
$sqlpending="select * from booking where book_id='".$_SESSION['book_id']."'";
$rsltpending=mysqli_query($conn,$sqlpending);
$row=mysqli_fetch_array($rsltpending);
$pending=$row['totalamount']-$row['totalamount']*10/100;

            $sql="INSERT INTO tbl_spayment(c_id,booking_id,cardnumber,cardholdername,month,year,cvv,amount) values('$custid',' $book_id','$cardnumber','$cardname','$cardmonth','$cardyear','$cardCvv','$pending')";
            $_SESSION['pending=']=0;
            $_SESSION['book_id']="";
            $result=mysqli_query($conn,$sql);
           

            }
         }
        
//email senting code
require 'vendor/autoload.php';
$emailsql = "SELECT * FROM tbl_customers WHERE c_id = '$custid'";
$emailresult = $conn->query($emailsql);
$email = $emailresult->fetch_assoc()['email'];
echo $email;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Use SMT
$mail->isSMTP();

// SMTP settings
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'athulbijuupm03@gmail.com';
$mail->Password = 'upil hknz xnao lwzm';                 

// Set 'from' email address and name
$mail->setFrom('athulbijuupm03@gmail.com', 'Athul Biju');

// Add a recipient email address
$mail->addAddress($email);

// Email subject and body
$mail->Subject = 'AutoWash car washing center';
$mail->Body = 'BOOKED successfullllllllllllllllllllll';
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}


// Send email?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: ' Booked successfully ',
                    didClose: () => {
                        window.location.href = "service.php";
                    }
                });
            </script>
<?php
   
    
// Now you have the values, and you can use them as needed for further processing.
?>