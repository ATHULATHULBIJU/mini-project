<?php
include_once('connection.php');
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{ echo "inside the post";
    $cust_id=$_SESSION['customerid'];
   $cardnumber=$_POST['cardNumber'];
   $cardname=$_POST['cardName'];
   $cardmonth=$_POST['cardMonth'];
   $cardyear=$_POST['cardYear'];
   $cardCvv=$_POST['cardCvv'];
   $amount=$_POST['amount'];
   $last_id=$_SESSION['book_id'];
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

$sql="select * from tbl_payment where booking_id='".$last_id."'";
$rslt=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rslt);
//$total=$_SESSION['totamountservice']*10/100;
$tobepaid=$row['totalamt']-$row['advamt'];
   $total=$row['totalamt'];
   //$tobepaid=$_SESSION['pending'] ;
   $sql="INSERT INTO tbl_payment(c_id,booking_id,cardnumber,cardholdername,month,year,cvv,totalamt,advamt)
    values('$cust_id',' $last_id','$cardnumber','$cardname','$cardmonth','$cardyear','$cardCvv','$total','$tobepaid')";
                $result=mysqli_query($conn,$sql);
header("Location:mypkgbook.php");
echo "total amount".$total;
}