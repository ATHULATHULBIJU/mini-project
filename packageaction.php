<?php
session_start();
include_once "connection.php";
$output='';
$sql="select * from tbl_car where car_id='".$_POST['carID']."' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$stot=$_SESSION['packageamount'];
echo $stot;
$cartot=$row['addpay'] ;
echo $cartot;
$tot=$stot+$cartot; 
echo $tot;?>
<div class="control-group" id="amount">
                                    <input type="text" id="camount" name="camount" value=<?php echo $row['addpay'] ?> class="form-control"  required="required" />
                                    <input type="text" id="tamount" name="tamount"  value=<?php echo $tot ?> class="form-control"  required="required" />
                                   </div> 

<?php
echo $output;
?>