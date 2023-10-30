<?php
include_once 'connection.php';
session_start();

if (isset($_POST['slotId'], $_POST['date'])) {
    $slotId = $_POST['slotId'];
    $date = $_POST['date'];
    $cid=35;

    // Perform the booking process and insert the record into tbl_bookslot
    // You can use the session variables ($_SESSION['car_type_id'], $_SESSION['wash_type_id']) here as well
    // Example: $carTypeId = $_SESSION['car_type_id'];

    // Insert the booking record into the database
    $sql = "INSERT INTO tbl_bookslot (slot_id, date, cartype, t_id,c_id) VALUES ('$slotId', '$date', '$carTypeId', '$washTypeId','$cid')";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
