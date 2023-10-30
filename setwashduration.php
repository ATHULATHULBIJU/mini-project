<?php
session_start();
include ('connection.php');

if (isset($_GET['washtypeID'])) {
    $_SESSION['washtypeID'] = $_GET['washtypeID'];
    $id=$_GET['washtypeID'];
    $sql="select * from tbl_type where t_id='".$id."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    

 
    
}
?>

<div id="washduration">
                    <span><?php echo $row['duration'];?></span></div>






