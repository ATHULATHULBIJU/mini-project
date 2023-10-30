<?php
session_start();
include ('connection.php');

if (isset($_GET['packageID'])) {
    $_SESSION['packageID'] = $_GET['packageID'];
    $id=$_GET['packageID'];
    $sql="select * from tbl_package where p_id='".$id."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['packageprice'] = $row['price'];
}
?>
<div id="packageprice">
                    <span><?php echo $row['price'];?></span>
</div>








