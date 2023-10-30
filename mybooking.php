<?php
session_start();
include ('connection.php');
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .booking-details {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .booking-details p {
            margin: 5px 0;
        }
        
    .booking-details {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }
    
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    



    /* You can further style as needed for other classes */


    /* Add more styling as needed for other classes */

 
    </style>
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

<h1>Washtype</h1>
<?php
$custid=$_SESSION['customerid'];
echo $custid;
$sql = "SELECT b.*,c.*, t.*, car.*, slot.*
        FROM booking b 
        JOIN tbl_customers c ON b.cust_id = c.c_id
        JOIN tbl_car car ON b.car_id = car.car_id
        JOIN tbl_slots slot ON b.slot_id = slot.slot_id
        JOIN tbl_type t ON b.wash_id = t.t_id
        WHERE b.cust_id = '" . $custid . "'";

//$sql="select * from booking where cust_id='".$custid."'";
$result=mysqli_query($conn,$sql);?>
<table class="table">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Start</th>
        <th>End</th>
        <th>Booking Date</th>
        <th>Wash Type</th>
        <th>Car Type</th>
        <th>Duration</th>
    </tr>
<?php
 
while ($row=mysqli_fetch_array($result)){
    echo "<tr>";
    
    echo "<td>".$row['c_username']."</td>" ; 
    

    echo "<td>".$row['email']."</td>" ;
    

    echo "<td>".$row['start']."</td>" ;
    

    echo "<td>".$row['end']."</td>" ;
    

    echo "<td>".$row['bookdate']."</td>" ;
    

    echo "<td>".$row['name']."</td>" ;
    

    echo "<td>".$row['type']."</td>" ;
    

    echo "<td>".$row['duration']."</td>" ;
    
    echo "</tr>";
}

    ?>

</table>



<?php

?>
<h1>Packages</h1>
<?php
//$sql="select * from packagebooking where cust_id='".$custid."'";
//$result=mysqli_query($conn,$sql);
//while ($row=mysqli_fetch_array($result)){
    ?>





