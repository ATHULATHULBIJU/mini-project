<?php
include('connection.php');
{

// Function to get publisher payment details
//function getCustomerPaymentDetails($conn, $customerId)//
/*{
    $sql = "SELECT cust_bankName, cust_bankBranch, cust_cardNumber, cust_expiryDate, cust_ifscCode FROM tbl_cust WHERE cust_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    
    $result = $stmt->get_result();

    return ($result->num_rows == 1) ? $result->fetch_assoc() : null;
}*/

// Function to get publisher profile details//
function getCustomerProfileDetails($conn, $customerId)
{
    $sql = "SELECT c_username, email, c_mobile,c_password  FROM tbl_customers WHERE c_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    
    $result = $stmt->get_result();

    return ($result->num_rows == 1) ? $result->fetch_assoc() : null;
}

// Function for updating publisher payment details
/*function updateCustomerPaymentDetails($conn, $customerId, $cardNumber, $ifscCode, $expiryDate, $bankName, $bankBranch)
{
    $sql = "UPDATE tbl_customers SET
            cust_cardNumber = ?,
            cust_ifscCode = ?,
            cust_expiryDate = ?,
            cust_bankName = ?,
            cust_bankBranch = ?
            WHERE cust_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $cardNumber, $ifscCode, $expiryDate, $bankName, $bankBranch, $customerId);

    return ($stmt->execute()) ? ["success" => true] : ["success" => false, "message" => "Error: " . $conn->error];
}*/

// Function for updating publisher profile
function updateCustomerProfile($conn, $customerId,  $username, $email, $mobileNumber, $password)
{
    $sql = "UPDATE tbl_customers SET
            c_username = ?,
            
            email = ?,
            c_mobile= ?,
            c_password = ?
            WHERE c_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi",  $username, $email, $mobileNumber, $password, $customerId);
    
    return ($stmt->execute()) ? ["success" => true] : ["success" => false, "message" => "Error: " . $conn->error];
}

// Function to change the publisher's password without hashing
function changeCustomerPasswordWithoutHash($conn, $customerId, $currentPassword, $newPassword)
{
    $passwordQuery = "SELECT c_password FROM tbl_customer WHERE c_id = ?";
    $stmt = $conn->prepare($passwordQuery);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['c_password'];

        // Verify the current password (without hashing)
        if ($currentPassword === $storedPassword) {
            // Update the password in the database
            $updateQuery = "UPDATE tbl_customers SET c_password = ? WHERE c_id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("si", $newPassword, $customerId);

            return ($stmt->execute()) ? ["success" => true] : ["success" => false, "message" => "Error updating the password: " . $conn->error];
        } else {
            return ["success" => false, "message" => "Password is incorrect."];
        }
    } else {
        return ["success" => false, "message" => "User not found."];
    }
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerId = $_POST['editCustomerId']; // Get the publisher ID from the URL parameter.

   /* if (isset($_POST["update_payment"])) {
        $cardNumber = $_POST['cardNumber'];
        $ifscCode = $_POST['ifscCode'];
        $expiryDate = $_POST['expiryDate'];
        $bankName = $_POST['bankName'];
        $bankBranch = $_POST['bankBranch'];

        $result = updateCustomerPaymentDetails($conn, $customerId, $cardNumber, $ifscCode, $expiryDate, $bankName, $bankBranch);*/
    } elseif (isset($_POST["edit_profile"])) {
      
      $username = $_POST['username'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $dob = $_POST['dob'];

        $result = updateCustomerProfile($conn, $customerId, $fullName, $username, $email, $mobileNumber, $dob);
    } elseif (isset($_POST["change_password"])) {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];

        $result = changeCustomerPasswordWithoutHash($conn, $customerId, $currentPassword, $newPassword);
    }

    if ($result["success"]) {
        $_SESSION['success_message'] = "Changes saved successfully.";
    } else {
        $_SESSION['error_message'] = $result["message"];
    }

    header("Location: CustomerEdit.php?data-customer-id=$customerId");
    exit();
}

// Fetch publisher details for pre-display
$customerId = $_GET['data-customer-id']; // Get the publisher ID from the URL parameter.
/*$custPaymentDetails = getCustomerPaymentDetails($conn, $customerId);*/
$custProfileDetails = getCustomerProfileDetails($conn, $customerId);
?>






