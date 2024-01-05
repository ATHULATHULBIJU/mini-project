<?php
include_once('connection.php');
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="delete from packagebooking where pkgbook_id='".$id."'";
    $rslt=mysqli_query($conn,$sql);
    header("location:mypkgbook.php");
}


?>