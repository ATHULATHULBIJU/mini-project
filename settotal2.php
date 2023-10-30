<?php
session_start();
include ('connection.php');

if (isset($_GET['washtypeID'])) {
    $_SESSION['washtypeID'] = $_GET['washtypeID'];
    $id=$_GET['washtypeID'];
    $sql="select * from tbl_type where t_id='".$id."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
   
    if($_SESSION['carprice']!=0)
    {
        $total=$row['price']+$_SESSION['carprice'];
    }
    else{
        $total=$row['price'];
    }
}
?>
<div id="totalamount">

                    <span><?php echo $total?></span>
</div>