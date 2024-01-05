<?php
session_start();
include('connection.php');
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

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
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
        margin: 0;
        /* Remove default margin for <ul> */
    }

    /* Use solid circle as the bullet point near the service name */
    .service-list li {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 15px;
        list-style-type: disc;
        margin-left: 20px;
        /* Adjust the margin to move the bullet point closer to the service name */
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
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="customerdashboard.php">Home</a></li>
            
            <li class="breadcrumb-item active"> <a href="User.php">Your Account</a></li>
            <li class="breadcrumb-item"><a href="mybooking.php">Your Booking</a></li>
         
        </ol>

    </div>
    </div>


    <h1>package</h1>


    <div class="col-lg-12">
        

            <?php
            $custid = $_SESSION['customerid'];
            
            /* $sql = "SELECT
b.*,
c.*,
t.*,
car.*,
slot.*,
py.*,
sb.book_id
FROM
booking b
JOIN tbl_customers c ON b.cust_id = c.c_id
JOIN tbl_car car ON b.car_id = car.car_id
JOIN slot_booking sb ON sb.book_id = b.book_id
JOIN tbl_slots slot ON slot.slot_id = sb.slot_id
JOIN tbl_type t ON b.wash_id = t.t_id
JOIN tbl_spayment py ON b.book_id = py.booking_id
WHERE
b.cust_id = '" . $custid . "'";
 */
            $sql = "select b.*,c.*,p.*  from packagebooking b join 
                                           tbl_car c on b.car_id = c.car_id
                                        join tbl_package p on b.package_id = p.p_id
            
                                         where b.cust_id='" . $custid . "'";
            //$sql="select * from booking where cust_id='".$custid."'";
            $result = mysqli_query($conn, $sql); 
            if(!$result){
                echo "Error".mysqli_error($conn);
            }?>

            <?php
            $id = 0;
            while ($row = mysqli_fetch_array($result)) {
                if ($id != $row['pkgbook_id']) { ?>
                    <div class="card mx-2 my-2">
                        <div class="row g-0">




                            <div class="col-md-2 mx-1">
                                
                                        
                                    <h5 class="font-weight-bold my-2 mx-1">Booked On: <span class="font-weight-normal"><?php echo $row['pkgbook_date'] ?></span></h5>
                                    
                                   
                            </div>
                            <hr>
                            <div class="col-md-4 mx-1">
                                <h4 class="font-weight-bold text-center my-1">Booking Details</h4>
                               <h5 class="font-weight-bold">Car Type: <span class="font-weight-normal"><?php echo $row['type'] ?></span></h5>
                               <h5 class="font-weight-bold">Package: <span class="font-weight-normal"><?php echo $row['name'] ?></span></h5>
                            </div>
                            <hr>
                            <div class="col-md-4 mx-1">



<!-- minu -->


<?php
$bookingid=$row['pkgbook_id'];
$sql="select * from tbl_payment where booking_id='".$bookingid."'";
$payresult=mysqli_query($conn,$sql);
$count=mysqli_num_rows($payresult);
while($payrow=mysqli_fetch_array($payresult))
{
    $totalamunt= $payrow['totalamt'];
}?>


<h4 class="font-weight-bold text-center my-1">Payment</h4>
                        <h5 class="font-weight-bold">Total: <?php echo $totalamunt ?> </h5>
                        <h5 class="font-weight-bold">Advance: <?php $advamt = $totalamunt * 10 / 100; echo $advamt; ?></h5>
                        <h5 class="font-weight-bold">Balance amount: <?php $blnc = $totalamunt - $advamt; echo $blnc; ?></h5> 



                        <?php
 if($count>1){

    
    echo '<h5><span class="badge badge-success" style="background-color: green; color: white;">Completed</span></h5>';
                           
 }
 else{ 
    ?>
       
       <form method="post" action="paymentpackage.php">
                                    <input type="hidden" name="book_id" value="<?php echo $row['pkgbook_id']; ?>" />
                      
        <a href="cancelpackagebooking.php?id=<?php echo $row['pkgbook_id'];?>" class="btn btn-outline-primary mb-2">Cancel</a>
                                
                                <input type="submit" class="btn btn-outline-primary mb-2" name="payNow" value="procced to pay <?php echo $blnc;?>" />
                                       </a>                
                       <?php }
                           

?>
 </form>
<!-- minu -->


                           
                            </div>
                        </div>
                    </div>


            <?php } else {
                    $id = $row['book_id'];
                }
            }

            ?>
       
    </div>