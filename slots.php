<?php
session_start();



$timeSlots = "";
include("connection.php");
function fetchTableData($conn, $tbl_booking)
{
    $sql = "SELECT * FROM $tbl_booking";
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

$doctors = fetchTableData($conn, "tbl_packages");
$services = fetchTableData($conn, "tbl_services");
function userData($user)
{
    global $conn;
    $sql = "SELECT email FROM tbl_customers WHERE c_username = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $email = $row['email'];
    }
    return $email;
}
function userId($user)
{
    global $conn;
    $sql = "SELECT c_id FROM tbl_customers WHERE c_username = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $id = $row['c_id'];
    }
    return $id;
}
//if user not logged in then 

if (isset($_SESSION['name'])) {
    global $userId;
    $User = $_SESSION['custname'];
    $email = userData($User);
    $userId = userId($User);

    $sql = "SELECT c_id
    FROM  tbl_booking WHERE c_id = $userId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $flag = true;
    } else {
        $flag = false;
        echo $flag;
    }
} else {
    echo '<script>
    if (confirm("User not logged in. Do you want to go to the signup page?")) {
        window.location.href = "signup.php";
    } else {
        window.location.href = "index.html"; // Redirect to index.php if Cancel is clicked
    }
</script>';
    exit; // Stop further PHP execution

    // Submit patient details
}
if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['details']))) {
    // Retrieve form data
    $name = $_POST["name"];
    $phoneNumber = $_POST["phoneNumber"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $allergy = $_POST["allergy"];
    $User = $_SESSION['name'];
    $email = userData($User);
    $userId = userId($User);

    $sql = "SELECT user_id
    FROM  tbl_booking WHERE c_id = $userId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>
    if (confirm("Useralready enter these Details")) {
        window.location.href = "slots.php";
    }</script>';
    } else {

        $sql = "INSERT INTO tbl_booking (vechicleno,bookingdate,bookingtime,type,c_id) VALUES ('$vechicleno', '$bookingdate', '$bookingtime', '$type', '$custid')";
 
    

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $vechicleno, $bookingdate, $bookingtime, $type, $custid);



        if ($stmt->execute()) {
            echo '<script>
var confirmed = confirm("Submit Your Details added successfully. Click OK to continue.");
if (confirmed) {
window.location.href = "user-appointment.php";
}
</script>';
        } else {
            echo "Error inserting data: " . $stmt->error;
        }


        $stmt->close();
        $conn->close();
    }
}
if ((isset($_POST['book_now']) && ($_SERVER['REQUEST_METHOD'] === 'POST'))) {
    $serviceId = $_POST['service_id'];
    $doctorId = $_POST['doctor_id'];
    $section = $_POST['section'];
    $appointmentDate = $_POST['appointmentDate'];

    $selectedTimeSlot = $_SESSION['selectedTimeSlot'];
    $user = $_SESSION['name'];

    $userId = userId($user);
    echo $userId;
    $sql = "SELECT * FROM tbl_patient WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If there are rows in the result, fetch and use the data here
        while ($row = $result->fetch_assoc()) {
            // Access data from the row
            $patient_id = $row['patient_id'];
            $email = $_SESSION['email'];
            $sql = "INSERT INTO tbl_appointments (patient_id, doctor_id,patient_email, service_id,section,appo_time, status, appointmentneed_date, created_at)
            VALUES (?, ?,?, ?,?,?, 'pending', ?, NOW())";
            $stmt2 = $conn->prepare($sql);
            $stmt2->bind_param("iisssss", $patient_id, $doctorId, $email, $serviceId, $section, $selectedTimeSlot, $appointmentDate);

            // You may need to determine the patient_id based on the email or other criteria.
            // For this example, I'm assuming you have a patients table with an email column.



            $stmt2->execute();

            $result = $stmt2->get_result();

            if ($result->num_rows > 0) {


                $response = "Appointment booked successfully!";
            } else {
                $response = "Error: Patient not found.";
            }

            // Close the database connection
            $stmt->close();
            $stmt2->close();
            $conn->close();
        }
    }

    // Perform any necessary validation on the data here






    // Prepare and execute the SQL INSERT query
}

$selectedTimeSlot = '';
if (isset($_POST['selectedTimeSlot'])) {
    // Handle the selected time slot if it's received from a previous form submission
    $selectedTimeSlot = $_POST['selectedTimeSlot'];
    echo $selectedTimeSlot;

    // You can perform server-side processing with the selectedTimeSlot here
    // For demonstration purposes, we'll simply store it in a variable
}

?>
