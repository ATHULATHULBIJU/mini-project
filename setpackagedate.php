
<?php
session_start();
echo "<script>alert('inside date set');</script>";
$_SESSION['bookdate']=$_POST['bookdate'];?>

                    <div id="packagedate">
                    <span><?php echo $_POST['bookdate']?></span></div>







