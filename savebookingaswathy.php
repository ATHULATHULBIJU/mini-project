<html>

<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>

<body>

</html>

<?php
session_start();


include_once('connection.php');
$cartype = $_SESSION['cartypeID'];
echo "<br />";
$washtype = $_SESSION['washtypeID'];
echo "<br />";
$slot = $_SESSION['slottypeID'];
echo "<br />";
$date = $_SESSION['bookDate'];
echo "<br />";
echo $_SESSION['cartypeID'];
echo "<br />";
echo $_SESSION['washtypeID'];
echo "<br />";
echo $_SESSION['slottypeID'];
echo "<br />";
echo $_SESSION['bookDate'];
echo "<br />";
$custid = $_SESSION['customerid'];

if (isset($_POST['addcategory'])) {



    $sql1 = "SELECT * FROM tbl_type WHERE t_id = " . $washtype;
    $rslt = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($rslt); // Use mysqli_fetch_assoc to get an associative array

    if ($row) {
        $duration = intval($row['duration']);
        //$duration = (int)$row['duration'];
        if ($duration + $slot <= 4) {
            for ($i = 1; $i <= $duration; $i++) {
                $regno = $_POST['regno'];
                echo $regno;
                $sql = "INSERT into booking(cust_id,car_id,wash_id,bookdate,slot_id,regno) values('$custid','$cartype','$washtype','$date','$slot','$regno')";
                $slot = $slot + 1;
                $result = mysqli_query($conn, $sql);
            } ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: ' Booked successfully ',
                    didClose: () => {
                        window.location.href = "service.php";
                    }
                });
            </script>
<?php
        } else {
            echo "<script>alert('Time duration exceed closing time. Choose another slot');</script>";
        }
    }
}
// Now you have the values, and you can use them as needed for further processing.
?>