<?php
// Start the session if you haven't already
//session_start();
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the entered OTP from the form
    $user_entered_otp = $_POST['otp'];

    // Get the user's email (from the session or your authentication system)
    $user_email = $_SESSION['emailforpwdchange']; // Replace with your logic for getting the user's email
    
    // Connect to the database and validate the OTP
    require 'connection.php'; // Include your database connection code

    // Query the database to check if the OTP is valid and not expired
    $sql = "SELECT * FROM otp_table WHERE email ='".$user_email."' AND otp = '".$user_entered_otp."' AND status = 'unused' AND TIMESTAMPDIFF(MINUTE, timestamp, NOW()) <= 30";
    $result=mysqli_query($conn,$sql);


    if (mysqli_num_rows($result) == 1) {
        // OTP is valid and hasn't expired
        // Mark the OTP as used in the database
        $updateSql = "UPDATE otp_table SET status = 'used' WHERE email ='".$user_email."' AND otp = '".$user_entered_otp."'";
        $rslt=mysqli_query($conn,$updateSql);
        // Redirect the user to a page where they can change their password
        header("Location: passwordchange.php");
        exit();
    } else {
        // Invalid or expired OTP
        // Show an error message to the user
        $error_message = "Invalid or expired OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p.error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <h1>Enter the OTP</h1><br>
    <form method="post" action="verifyotp.php">
        <label for="otp">Enter OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <br>
        <input type="submit" value="Verify OTP">
    </form>

    <?php
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>
</body>
</html>