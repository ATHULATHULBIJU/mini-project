<?php
session_start();
include_once 'connection.php';
error_reporting(E_ALL);

$name = "";
$Email = "";
$phonenumber = "";
$password = "";
$user = "";
$nameErr = "";
$EmailErr = "";
$phoneErr = "";
$passwordErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $Email = test_input($_POST["email"]);
    $phonenumber = test_input($_POST["phonenumber"]);
    $password = test_input($_POST["password"]);
    $confpassword = test_input($_POST["confpassword"]);
    $flag = 1;

    // Validate name
    if (empty($name)) {
        $nameErr = "Name is required";
        $flag = 0;
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
        $flag = 0;
    }

    // Validate email
    if (empty($Email)) {
        $EmailErr = "Email is required";
        $flag = 0;
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $EmailErr = "Invalid email format";
        $flag = 0;
    }

    // Validate phone number
    if (empty($phonenumber)) {
        $phoneErr = "Phone number is required";
        $flag = 0;
    } elseif (!preg_match('/^\d{10}$/', $phonenumber)) {
        $phoneErr = "Invalid phone number";
        $flag = 0;
    }

    // Validate password
    if (empty($password)) {
        $passwordErr = "Password is required";
        $flag = 0;
    } elseif ($password != $confpassword) {
        $passwordErr = "Passwords do not match";
        $flag = 0;
    }

    if ($flag == 1) {
        // Hash the password before inserting it into the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tbl_customers (c_username, email, c_password, c_phone) VALUES ('$name', '$Email', '$hashedPassword', '$phonenumber')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Successful registration
            session_start();
            $_SESSION['customerid'] = $conn->insert_id;
            $_SESSION['customername'] = $name;
            $type = "customer";
            $sql = "INSERT INTO tbl_login (email, password, usertype) VALUES ('$Email', '$hashedPassword', '$type')";
            $result = mysqli_query($conn, $sql);
            header("location: customerdashboard.php");
        } else {
            // Database error
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
