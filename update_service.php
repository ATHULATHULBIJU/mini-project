<?php
include_once('connection.php');
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tid=$_POST['t_id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
   $duration=$_POST['duration'];
    $sql="update tbl_type set name='$name', price='$price',duration='$duration'  where t_id='$tid'";
    $result=mysqli_query($conn,$sql);
    header("location:viewtype.php");
}
?>