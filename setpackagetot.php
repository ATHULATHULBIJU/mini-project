<?php
session_start();
include ('connection.php');
$disc=0;
$cust_id=$_SESSION['customerid'];
if (isset($_GET['packageID'])) {
    $_SESSION['packageID'] = $_GET['packageID'];
    $id=$_GET['packageID'];
    $sql="select * from tbl_package where p_id='".$id."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$_SESSION['packageprice'] = $row['price'];
$price=$row['price'];
if($_SESSION['carprice']!=0)
{
    $total=$price+$_SESSION['carprice'];
}
else{
    $total=$price;
}
$sql="select * from tbl_payment where c_id='".$cust_id."'";
$rslt=mysqli_query($conn,$sql);
if(mysqli_num_rows($rslt)>=4)
{
    $total=$total-($total*8/100);
    $dics=$total;
    $_SESSION['discount']=$total*8/100 ;
}
$_SESSION['totamount'] = $total;
}
?>
<div id="totalamount">
                    <span><?php echo $total;?></span>
                    <?php if($disc>0){?>
                        <span><?php echo $disc;?></span>
                    <?php
                }?>
</div>

