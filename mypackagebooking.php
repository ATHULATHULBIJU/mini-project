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
    
        
/* Main container for billing details */
.booking-card {
  background-color: #f5f5f5;
  border: 2px solid #d9d9d9;
  border-radius: 10px;
  padding: 20px;
  margin: 20px 0;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Booking Details */
.booking-details {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}

/* Booking Information */
.booking-info {
  flex: 1;
}

/* Heading for booking details */
.booking-info h3 {
  font-size: 1.5rem;
  margin-bottom: 15px;
  color: #333;
}

/* Remove bullet points from the service list */
.service-list {
  list-style: none;
  padding: 0;
  margin: 0; /* Remove default margin for <ul> */
}

/* Use solid circle as the bullet point near the service name */
.service-list li {
  font-size: 1.2rem;
  color: #555;
  margin-bottom: 15px;
  list-style-type: disc;
  margin-left: 20px; /* Adjust the margin to move the bullet point closer to the service name */
}


/* Actions for the booking */
.billing-actions {
  text-align: center;
  margin-top: 20px;
}

/* Cancel Button */
.cancel-booking {
  background-color: #e74c3c;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.cancel-booking:hover {
  background-color: #c0392b;
}

/* Canceled Label */
.canceled-label {
  color: #e74c3c;
  font-weight: bold;
}

/* Global Styling */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f9f9f9;
  margin: 0;
  padding: 0;
  color: #333;
}

h2 {
  font-size: 1.8rem;
  color: #e74c3c;
  margin-top: 20px;
}

h3.name {
  font-size: 1.8rem;
  color: #D5B981;
}

/* Horizontal line style */
.hr-line {
  border-top: 1px solid #e74c3c;
  margin: 15px 0;
}
package-box {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .package-box p {
            margin: 5px 0;
        }

        .package-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .package-box table,
        .package-box th,
        .package-box td {
            border: 1px solid black;
        }

        .package-box th,
        .package-box td {
            padding: 8px;
            text-align: left;
        }

        .package-box th {
            background-color: #f2f2f2;
        }
        package-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            color: #333;
        }

        .package-box h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #e74c3c;
        }

        .package-details {
            margin-bottom: 20px;
        }

        .package-details h4 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .package-details p {
            margin: 5px 0;
        }

        .billing-actions {
            text-align: center;
            margin-top: 20px;
        }

        .billing-actions button {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .billing-actions button:hover {
            background-color: #c0392b;
        }
        .package-box {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            color: #333;
        }

        .package-box h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #e74c3c;
        }

        .package-details {
            margin-bottom: 20px;
        }

        .package-details h4 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .package-details p {
            margin: 5px 0;
        }

        .billing-actions {
            text-align: center;
            margin-top: 20px;
        }

        .billing-actions button {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .billing-actions button:hover {
            background-color: #c0392b;
        }

        /* Additional styles for booking details */
        .booking-details {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .booking-details h2 {
            font-size: 1.8rem;
            color: #e74c3c;
            margin-top: 20px;
        }

        .booking-details .hr-line {
            border-top: 1px solid #e74c3c;
            margin: 15px 0;
        }

        .booking-details p {
            color: #333;
            margin: 10px 0;
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
                            
                    </div>
                </nav>
</div>
                <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="customerdashboard.php">Home</a></li>
          <li class="breadcrumb-item active"> <a href="User.php">Your Account</a></li>
        </ol>
 
            </div>
        </div>
       
        <div class="package-box">
    
<h1>Packagetype</h1> 

                   
<?php
$custid=$_SESSION['customerid'];
echo $custid;
$sql = "SELECT b.*,c.*, t.*, car.*, py.*
        FROM packagebooking b 
        JOIN tbl_customers c ON b.cust_id = c.c_id
        JOIN tbl_car car ON b.car_id = car.car_id
        
        JOIN tbl_package t ON b.package_id = t.p_id
        JOIN tbl_payment py ON b.pkgbook_id= py.booking_id
        WHERE b.cust_id = '" . $custid . "'";

//$sql="select * from booking where cust_id='".$custid."'";
$result=mysqli_query($conn,$sql);?>

<?php
 
while ($row=mysqli_fetch_array($result)){ ?>
        <div class="package-details">
        
    <div class="row">
        <div class="d-flex align-content-center justify-content-center">
            <div class="col-lg-8">
              <div class="card">
                  
                      
                          <div class="col mx-1">
                            <div class="d-flex justify-content-between">
                               <h5 class="font-weight-bold my-1">Booked On: <span class="font-weight-normal"><?php echo $row['pkgbook_date'] ?></span></h5>
                                        </div>
                          </div>
                          <hr>
                          <div class="col mx-1">
                            <h4 class="font-weight-bold text-center my-1">Booking Details</h4>
                            <h5 class="font-weight-bold">Wash Type: <span class="font-weight-normal"><?php echo $row['name'] ?></span></h5>
                            <h5 class="font-weight-bold">Car Type: <span class="font-weight-normal"><?php echo $row['type'] ?></span></h5>
                        </div>
                        <hr>
                        <div class="col mx-1">
                          <h4 class="font-weight-bold text-center my-1">Payment</h4>
                            <h5 class="font-weight-bold">Total:<?php echo $row['totalamt'];?> </h5>
                            <h5 class="font-weight-bold">Advance: <?php echo $row['advamt'];?></h5>
                            <h5 class="font-weight-bold">To Pay: <?php $topay=$row['totalamt']-$row['advamt'];echo $topay;?></h5>
</div>
                            <form method="post" action="pendingpayment.html">
                                <?php 
                                $sql="select * from tbl_payment where booking_id='".$row['pkgbook_id']."'";
                                $rslt=mysqli_query($conn,$result);
                                $paidamount=0;
                                while($row=mysqli_fetch_array($rslt)){
                                    $paidamount=$paidamout+$row['advamt'];
                                    echo "paid amount".$paidamount;
                                }
                                if($row['totalamt']>$paidamount){?>
                             <button class="card-form__button" type="submit"   name="payNow">procced to pay&#8377;
                                  <?php echo $topay; }?>  
                                         </button>
                                         
        
                                         <div class="package-details">
            <h4>package Type</h4>
            <p><?php echo $row['nam']; ?></p>
            <h4>Car Type</h4>
            <p><?php echo $carType; ?></p>
            <h4>Total Amount</h4>
            <p><?php echo $totalAmount; ?></p>
            <h4>Advance Payment</h4>
            <p><?php echo $advancePayment; ?></p>
            <h4>Remaining Payment</h4>
            <p><?php echo $remainingPayment; ?></p>
        </div>
        <div class="billing-actions">
            <button class="pay-now-button">Proceed to Payment</button>
        </div>
    </div>
    
    <?php
} ?>
</body>
</html>
