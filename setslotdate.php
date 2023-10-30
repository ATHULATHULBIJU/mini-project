<?php
session_start();
include ('connection.php');

if (isset($_GET['slottypeID'])) {
    $_SESSION['slottypeID'] = $_GET['slottypeID'];
    $_SESSION['bookDate'] = $_GET['bookDate'];
    $sql="select * from tbl_slots where slot_id='".$_GET['slottypeID']."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
   
} else {
    echo "Invalid or missing ID parameter.";
}
?>


                    <div id="slotdate">
                    <span><?php echo $_GET['bookDate']?></span></div>







