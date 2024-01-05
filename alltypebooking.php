<?php
session_start();
include('connection.php');
$date="";
if($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $date=$_POST['datepicker'];
    echo "datepicker";
    echo $date;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor1/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor1/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor1/quill/quill.snow.css" rel="stylesheet">
    <link href="vendor1/quill/quill.bubble.css" rel="stylesheet">
    <link href="vendor1/remixicon/remixicon.css" rel="stylesheet">
    <link href="vendor1/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="CSS/admin2.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
    #booking-container {
        display: flex;
        flex-wrap: wrap; /* Allow items to wrap onto the next line if needed */
        justify-content: space-between; /* Distribute items evenly along the row */
        margin: -10px; /* Compensate for negative margins on individual cards */
    }

    .card {
        flex: 0 0 calc(33.333% - 20px); /* Adjust the width of each card (33.333% for three cards in a row) */
        margin: 10px; /* Add margin to each card for spacing */
        /* Add any other styling you want for the individual cards */
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>



                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="ADMINPROFILE.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="admin2.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>pacakage Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="newaddedpackage.php">
          <i class="bi bi-circle"></i><span> Add package</span>
        </a>
      </li>
      <li>
        <a href="viewpackage1.php">
          <i class="bi bi-circle"></i><span>View package</span>
        </a>
      </li>
      <li>
        
      </li>
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>manage cartype</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="newaddedcartype.php">
          <i class="bi bi-circle"></i><span>Manage cartype</span>
        </a>
      </li>
      <li>
        
      </li>
    </ul>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="viewcar.php">
          <i class="bi bi-circle"></i><span>view cartype</span>
        </a>
      </li>
      <li>
        
      </li>
    </ul>
  
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Manage service</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="newaddedtype.php">
          <i class="bi bi-circle"></i><span>Add servicetype</span>
        </a>
      </li>
      <li>
        <a href="viewtype.php">
          <i class="bi bi-circle"></i><span>view servicetype</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="allpackagebooking.php">
          <i class="bi bi-circle"></i><span>package Booking</span>
        </a>
      </li>
      <li>
        <a href="alltypebooking.php">
          <i class="bi bi-circle"></i><span>service Booking</span>
        </a>
      </li>
      <li>
        <a href="charts-echarts.html">
          <i class="bi bi-circle"></i><span>ECharts</span>
        </a>
      </li>
    </ul>
  </li><!-- End Charts Nav -->

  <!-- End Icons Nav -->
  <!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="forms-elements.html">
          <i class="bi bi-circle"></i><span>view category</span>
        </a>
      </li>
      <li>
        
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>feedback</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="viewfeedbacks.php">
          <i class="bi bi-circle"></i><span>view feedback</span>
        </a>
      </li>
      <li>
        <a href="tables-data.html">
          <i class="bi bi-circle"></i><span>???</span>
        </a>
      </li>
    </ul>
  </li>


            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
          

    </aside><!-- End Sidebar-->
    <main class="main" id="main">
 
    </div>
    </div>
    <form action="alltypebooking.php" method='POST'><label for="datepicker">Select a Date:</label>
    <input type="date" id="datepicker" name="datepicker">
        <button type="submit" >submit</button>

</form>
    <h1>Washtype</h1>


    <div class="col-lg-12">
        

            <?php
           
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
 */ if($date!=""){
            $sql = "select b.*,t.*,c.*,cust.*  from booking b join tbl_type t on b.wash_id= t.t_id 
                                         join  tbl_car c on b.car_id = c.car_id
                                      
join tbl_customers cust on b.cust_id=cust.c_id where b.bookdate='".$date."'";
 }else{
    $sql = "select b.*,t.*,c.*,cust.*  from booking b join tbl_type t on b.wash_id= t.t_id 
    join  tbl_car c on b.car_id = c.car_id
 
    
join tbl_customers cust on b.cust_id=cust.c_id";
 }
            //$sql="select * from booking where cust_id='".$custid."'";
            $result = mysqli_query($conn, $sql); ?>
 
            <?php
            $id = 0;
            while ($row = mysqli_fetch_array($result)) {
                if ($id != $row['book_id']) { ?>
                    <div class="card mx-2 my-2">
                        <div class="row g-0">




                            <div class="col-md-4 mx-1">
                                
                                    <?php
$bookid=$row['book_id'] ;
                                    $sqlslot="SELECT * FROM tbl_slots WHERE slot_id = (SELECT MIN(slot_id) FROM slot_booking WHERE book_id = '" . $bookid . "')";
                                    $slotresult=mysqli_query($conn,$sqlslot);
                                    while($slotrow=mysqli_fetch_array($slotresult))
                                    {
                                    ?>


                                    <h5 class="font-weight-bold my-2 mx-1">Start Time: <span class="font-weight-normal"><?php echo $slotrow['start'] ?></span></h5> 
                                    <?php
                                    }
                                    ?>
                                    <h5 class="font-weight-bold my-2 mx-1">Booked On: <span class="font-weight-normal"><?php echo $row['bookdate'] ?></span></h5>
                                    
                                    <h5 class="font-weight-bold my-2 mx-1">Duration: <span class="font-weight-normal"><?php echo $row['duration'] ?></span></h5>
                                    <h5 class="font-weight-bold my-2 mx-1">CustomerName: <span class="font-weight-normal"><?php echo $row['c_username'] ?></span></h5>
                                    <h5 class="font-weight-bold my-2 mx-1">Booking ID: <span class="font-weight-normal"><?php echo $row['book_id'] ?></span></h5>
                                    
                            </div>
                            
                            <div class="col-md-4 mx-1">
                            <h4 class="font-weight-bold text-center my-1">Booking Details</h4>
                                <h5 class="font-weight-bold">Wash Type: <span class="font-weight-normal"><?php echo $row['name'] ?></span></h5>
                                <h5 class="font-weight-bold">Car Type: <span class="font-weight-normal"><?php echo $row['type'] ?></span></h5>
                            </div>
                            
                            <div class="col-md-3 mx-1">
                                <h4 class="font-weight-bold text-center my-1">Payment</h4>
                                <h5 class="font-weight-bold">Total:<?php echo $row['totalamount']; ?> </h5>
                                <h5 class="font-weight-bold">Advance: <?php $advamt = $row['totalamount'] * 10 / 100;
                                                                        echo $advamt; ?></h5>
                                <h5 class="font-weight-bold">Balance <?php $topay = $row['totalamount'] - $advamt;
                                                                        echo $topay; ?></h5>
                                <form method="post" action="paymentservice.php">
                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>" />
                                   





                                    <?php 
                                $sqlc="select * from tbl_spayment where booking_id='".$row['book_id']."'";
                                $rsltc=mysqli_query($conn,$sqlc);
                                $paidamount=0;
                                while($row1=mysqli_fetch_array($rsltc)){
                                    $paidamount=$paidamount+$row1['amount'];
                                 //   echo "paid amount".$paidamount;
                                    $totamt=$row['totalamount'];
                                }
                                ?> <h5 class="font-weight-bold"> <?php $topay = $totamt - $advamt;
                                  
                                $_SESSION['topay'] = $topay; ?></h5><?php
                                if($totamt>$paidamount){
                              echo '<h5><span class="badge badge-success" style="background-color: red; color: white;">Pending</span></h5>';
                                }
                                    else{
                                        echo '<h5><span class="badge badge-success" style="background-color: green; color: white;">Completed</span></h5>';
                                    }?>  













                                </form>

                            </div>
                        </div>
                    </div>


            <?php } else {
                    $id = $row['book_id'];
                }
            }

            ?>
       
    </div>
        </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>AUTOWASH</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
             <a href="https://bootstrapmade.com/"></a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="vendor1/apexcharts/apexcharts.min.js"></script>
    <script src="vendor1/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor1/chart.js/chart.umd.js"></script>
    <script src="vendor1/echarts/echarts.min.js"></script>
    <script src="vendor1/quill/quill.min.js"></script>
    <script src="vendor1/simple-datatables/simple-datatables.js"></script>
    <script src="vendor1/tinymce/tinymce.min.js"></script>
    <script src="vendor1/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="JS/admin2.js"></script>

</body>

</html>