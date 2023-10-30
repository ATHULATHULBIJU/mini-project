<?php
session_start();
include ('connection.php');

if (isset($_GET['cartypeID'])) {
    $_SESSION['cartypeID'] = $_GET['cartypeID'];
    $id=$_GET['cartypeID'];
    $sql="select * from tbl_car where car_id='".$id."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$caramount=$row['addpay'];

if($_SESSION['washprice']!=0){
    $total=$caramount+$_SESSION['washprice'];
}
else{
    $total=$caramount;
}
}
?>
<div id="totalamount">
                    <span><?php echo $total?></span>
</div>
