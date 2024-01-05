<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>

<?php
// Include the database connection file
include("connection.php");

// Start or resume the session
session_start();

if (!isset($_SESSION["customerid"])) {
    header("Location: signup.php"); // Redirect to the login page if not logged in
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the customer ID from the session
    if (isset($_SESSION["customerid"])) {
        // Sanitize and validate input data
        $custid = $_SESSION["customerid"];
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];

        // Perform password change if the new password and confirmation match
        if ($newPassword === $confirmPassword) {
            // First, check if the current password is correct for the given customer ID
            $sql = "SELECT * FROM tbl_customers WHERE c_id = '$custid' AND c_password = '$currentPassword'";
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);

            if ($rowcount > 0) {
                $sql="select * from tbl_customers where c_id ='".$custid."'";
                $result = mysqli_query($conn, $sql);
                $row=mysqli_fetch_array($result);
                $email=$row['email'];
                // The current password is correct; update the password
                $sql = "UPDATE tbl_customers SET c_password = '$newPassword' WHERE c_id = '$custid'";
                $result = mysqli_query($conn, $sql);

                $sql = "UPDATE tbl_login SET password = '$newPassword' WHERE email = '".$email."'";
                $result = mysqli_query($conn, $sql);?>
                <script>
                Swal.fire({
                    icon: 'success',
                    text: ' passwored changed successfully ',
                    didClose: () => {
                        window.location.href = "changepassword.php";
                    }
                });
            </script>
           

             <?php   echo "Password changed successfully!";
            } else {
                echo "Current password is incorrect.";
            }
        } else {
            echo "New password and confirm password do not match.";
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>AutoWash - Car Wash Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.php">
                                <h1>Auto<span>Wash</span></h1>
                                <!-- <img src="img/logo.jpg" alt="Logo"> -->
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Opening Hour</h3>
                                        <p>Mon - Fri, 8:00 - 9:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>info@example.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="customerdashboard.php" class="nav-item nav-link"></a>
                            <a href="about1.php" class="nav-item nav-link active"></a>
                            <a href="service.php" class="nav-item nav-link"></a>
                            <a href="package.php" class="nav-item nav-link"></a>
                            <a href="location.php" class="nav-item nav-link"></a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"></a>
                                <div class="dropdown-menu">
                                    <a href="blog.php" class="dropdown-item"></a>
                                    <a href="single.php" class="dropdown-item"></a>
                                    <a href="team.php" class="dropdown-item"></a>
                                    <a href="booking.php" class="dropdown-item"></a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link"></a>
                        </div>
                        <div class="ml-auto">
                           
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        
      
        <div class="fashion_section">
  <main id="main" class="main">
    <div class="banner_taital">
      <h1>Your Account</h1>
      <nav>
       <!-- End Page Title -->
 <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="customerdashboard.php">Home</a></li>
          <li class="breadcrumb-item active"> <a href="User.php">Your Account</a></li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">


        <!-- Team Start -->
       
            <!-- Team Start -->
<!-- Team Start -->
<div class="container">
    <h2>Password Change</h2>
    <form action="changepassword.php" method="POST">
        <div class="form-group">
            <label for="currentPassword">Current Password:</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password:</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="submit" class="btn btn-warning">Change Password</button>
    </form>
</div>

<!-- Team End -->

<!-- Team End -->
      




        
        <!-- Team End -->


        <!-- Footer Start -->
       
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class=""><i class=""></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>