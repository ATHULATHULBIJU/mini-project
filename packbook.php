<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
include('connection.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "inside post";
    $vechicleno = $_POST['vechicleno'];
    $bookingdate = $_POST['bookingdate'];
    $bookingtime = $_POST['bookingtime'];
    $cartype=$_POST['tbl_car'];
    // Retrieve the customer ID from the session
    $custid = $_SESSION['customerid'];

    $type = "package";
    $typeid =  $_SESSION['packageid'];

    echo $vechicleno;
    echo $bookingdate;
    echo $bookingtime;
    echo $cartype;

    // Update the SQL query to include the c_id
    $sql = "INSERT INTO tbl_booking (vechicleno,bookingdate,bookingtime,type,c_id,cartype) VALUES ('$vechicleno', '$bookingdate', '$bookingtime', '$type', '$custid','$cartype')";

    $result = mysqli_query($conn, $sql);
    $bookid=mysqli_insert_id($conn);
    echo $bookid;
    $_SESSION['bookingid']=$bookid;
    $sql = "INSERT INTO tbl_packagetype(b_id, p_id) VALUES ('$bookid', '$typeid')";
    $result = mysqli_query($conn, $sql);
    
    
    if ($result) {

        ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: ' Booking successfull ',
                        didClose: () => {
                            window.location.href = "package.php";
                        }
                    });
                </script>
                <?php

    } else {
        echo "Error inserting booking: " . mysqli_error($conn);
    }
} else {
    echo "post failed";
}
?>