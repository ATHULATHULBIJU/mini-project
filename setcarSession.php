<?php
session_start();
include ('connection.php');

if (isset($_GET['cartypeID'])) {
    $_SESSION['cartypeID'] = $_GET['cartypeID'];
    $id=$_GET['cartypeID'];
    $sql="select * from tbl_car where car_id='".$id."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['carprice'] = $row['addpay'];
}
?>
<div id="cartype">
                    <span><?php echo $row['type'];?></span>
</div>








