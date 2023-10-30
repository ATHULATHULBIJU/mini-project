<?php
session_start();
include ('connection.php');

if (isset($_GET['cartypeID'])) {
    $_SESSION['cartypeID'] = $_GET['cartypeID'];
    $id=$_GET['cartypeID'];
    $sql="select * from tbl_car where car_id='".$id."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
}
?>
<div id="price">
                    <span><?php echo $row['addpay'];?></span>
</div>
