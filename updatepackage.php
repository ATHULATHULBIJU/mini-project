<?php
include_once('connection.php');
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $pid=$_POST['p_id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $duration=$_POST['duration'];
    $sql="update tbl_package set name='$name', price='$price', duration='$duration' where p_id='$pid'";
    $result=mysqli_query($conn,$sql);
    header("location:viewpackage1.php");
}
?>