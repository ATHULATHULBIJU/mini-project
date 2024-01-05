<?php
session_start();
include('connection.php');
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows <= 0) {
        session_start();
        $_SESSION['loginErr'] = "Invalid Email or Password";
        header("location:signup.php");
    } else {
        $row = mysqli_fetch_assoc($result);



        if ($row["usertype"] == "customer") {
            $sql = "select * from tbl_customers where email='" . $email . "'";
            $result = mysqli_query($conn, $sql);

            //echo $result;
            $row = mysqli_fetch_array($result);

            session_start();
            $_SESSION['customerid'] = $row['c_id'];
            $_SESSION['customername'] = $row['c_username'];
            $_SESSION['customeremail'] = $row['email'];
            header("location:customerdashboard.php");
        } elseif ($row["usertype"] == "admin") {
            echo "hai";
            //  $_SESSION['username']=$name;
            header("location:admin2.php");
        } else {
            session_start();
            //echo "invalid usernme or password";
            $message = "Invalid username or password";
            $_SESSION['loginMessage'] = $message;
            header("location:signup.php");
        }
    }
} else {
    echo "post failed";
}
