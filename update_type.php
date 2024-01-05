<?php
include_once('connection.php');
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $pid=$_POST['car_id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
  //  $duration=$_POST['duration'];
    $sql="update tbl_car set type='$name', addpay='$price' where car_id='$pid'";
    $result=mysqli_query($conn,$sql);
    header("location:viewcar.php");
}
?>