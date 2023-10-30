<?php
//  database connection
session_start();

if (isset($_POST['tbl_slot'])) {
    $user_id = $_SESSION['c_id']; // Get the logged-in user's ID
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Check if the slot is available
    if (checkSlotAvailability($date, $start_time, $end_time)) {
        // Insert the booking into the database
        $sql = "INSERT INTO tbl_booking (user_id, date, start_time, end_time) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $date, $start_time, $end_time]);

       
        header("Location: slots.php");
        exit();
    } else {
        // Slot is not available, display an error message
        echo "Slot is already booked. Please choose another slot.";
    }
}

// Function to check if the slot is available
function checkSlotAvailability($date, $start_time, $end_time) {
    global $pdo;

    // Convert input strings to DateTime objects for easy comparison
    $start_datetime = new DateTime("$date $start_time");
    $end_datetime = new DateTime("$date $end_time");

    // Query the database to check for conflicting bookings
    $sql = "SELECT COUNT(*) FROM tbl_booking WHERE date = ? AND ((start_time <= ? AND end_time >= ?) OR (start_time <= ? AND end_time >= ?))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$date, $start_time, $start_time, $end_time, $end_time]);
    $conflictingBookings = $stmt->fetchColumn();

    // If there are conflicting bookings, return false; otherwise, return true
    return $conflictingBookings === 0;
}
?>