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
   $amount=$_SESSION['pendingamt'];
   $last_id=$_SESSION['sbook_id'];
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

$sql="select * from tbl_spayment where booking_id='".$last_id."'";
$rslt=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rslt);
//$total=$_SESSION['totamountservice']*10/100;
$tobepaid=$row['amount']-$row['amount']*10/100;
   $total=$row['amount'];
   //$tobepaid=$_SESSION['pending'] ;
   $sql="INSERT INTO tbl_spayment(c_id,booking_id,cardnumber,cardholdername,month,year,cvv,amount)
    values('$cust_id',' $last_id','$cardnumber','$cardname','$cardmonth','$cardyear','$cardCvv','$amount')";
                $result=mysqli_query($conn,$sql);
                if(!$result){
                  echo "error: ".mysqli_error($conn);
                }
header("Location:mytypebooking.php");
echo "total amount".$amount;
}