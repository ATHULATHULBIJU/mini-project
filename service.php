<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>

<?php
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
        <link href="css/packagestyle.css" rel="stylesheet">
   
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
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
                            <a href="customerdashboard.php" class="nav-item nav-link">Home</a>
                            <a href="about.php" class="nav-item nav-link active">About</a>
                            <a href="service.php" class="nav-item nav-link">Service</a>
                            <a href="package.php" class="nav-item nav-link">Package</a>
                            <a href="location.php" class="nav-item nav-link">Washing Points</a>
                          <!--  <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu">
                                    <a href="blog.php" class="dropdown-item">Blog Grid</a>
                                    <a href="single.php" class="dropdown-item">Detail Page</a>
                                    <a href="team.php" class="dropdown-item">Team Member</a>
                                    <a href="booking.php" class="dropdown-item">Schedule Booking</a>
                                </div>
                            </div>-->
                            <a href="contact1.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-custom" href="booking.php" id ="btnbooking">Booking</a>
                        </div>
                   </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        
        <!-- Page Header Start -->
       <div class="page-header">
            <div class="container">
                
                    <div class="col-12">
                        <h2>Service</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End--> 
        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Washing Methods</p>
                    <h2>Choose one</h2>
                </div>
           </div>
           
        </div> 
        <div class="container">
                <h1 class="text-center">Vehicle Type</h1>
     
    <div class="car-card-container">
 
        <?php
        $sql = "SELECT * FROM tbl_car";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="car-card-column">
        <a href='#' class="setcartype" data-id="<?php echo $row['car_id']; ?>">
            <div class="car-card">
            
                <div class="image-container">
                    
                        <img src="image/<?php echo $row['image']; ?>">
                   
                    <div class="card-body">
                        <h3><?php echo $row['type']; ?></h3>
                    </div>
                    
                </div>
                </a>
            </div>
        </div>
        <?php
        }
        ?>
      </div>
  </div>
    </div>


<div class="container my-5">
    <h1 class="text-center">Wash Type</h1>
    <div class="car-card-container">
        <?php
        $sql = "SELECT * FROM tbl_type";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="car-card">
            <a href='#' class="setwashtype" data-id="<?php echo $row['t_id']; ?>">
                <div class="image-container">
                    
                        <img src="image/<?php echo $row['image']; ?>">
                   
                    <div class="card-body">
                        <h3><?php echo $row['name']; ?></h3>
                        <h3>Duration: <?php echo $row['duration']; ?></h3>
                        <h3>Price: <?php echo $row['price']; ?></h3>
                    </div>
                </div>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
    <div>
      
    </div>
</div>


<!-- Rest of your code remains the same -->
<div class="container">
<table border="1">
    <tr>
        <?php
        // Get today's date
        $today = date("Y-m-d");
       
        $datearray = array();

        // Loop to display dates for the next three days
        for ($i = 1; $i <= 5; $i++) {
            $nextDate = date("Y-m-d", strtotime("+$i day"));
            $datearray[$i] = $nextDate;
            $nextDay = date("d", strtotime($nextDate));
            $nextDayName = date("l", strtotime($nextDate));
            echo "<th style='width:200px;'>$nextDay $nextDayName</th>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $sql = "SELECT * FROM tbl_slots";
        $result = mysqli_query($conn, $sql);

        
        while ($row = mysqli_fetch_array($result)) {
            for ($i = 1; $i <= 5; $i++) {
                echo "<td>";
                $start = $row['start'];
                $end = $row['end'];
                $slotId = $row['slot_id'];
        
                // Check if the slot is already booked for the specific date
                $queryToCheckDisable = "SELECT COUNT(*) AS count FROM booking WHERE slot_id = $slotId AND bookdate = '$datearray[$i]'";
                $resultDisable = mysqli_query($conn, $queryToCheckDisable);
                $rowDisable = mysqli_fetch_assoc($resultDisable);
        
                if ($rowDisable['count'] > 0) {
                    // If the slot should be disabled for the specific date
                    echo "<span style='color: gray;'>$start-$end</span>";
                } else {
                    // If the slot should be enabled for the specific date
                    $bookdate = date("Y-m-d", strtotime("+$i day"));
                    echo "<a href='' class='setslottype' data-id=$slotId data-bookdate=$bookdate> $start-$end </a>";
                    //<a href='' class="setwashtype" data-id="<?php echo $row['t_id'];
                
                
                }
        
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
        
        
    </tr>
</table>
<div>
       
    </div>
<!-- hidden division -->
<div id="myDiv" style="display: none;">
<p>Session Value:
<div>
        <p>Session Value: <span id="cartypeValue">
            <input type="hidden" id="cartypeValue" value="<?php echo $_SESSION['cartypeID']; ?>">
            <?php echo $_SESSION['cartypeID']; ?>
        </span></p>
    </div> <?php

       
    ?>
</div>




<?php
include('connection.php');


?>
<!-- Booking summary -->
<li class="cbs-main-list-item cbs-clear-fix cbs-main-list-item-booking">
    <div class="cbs-main-list-item-section-header cbs-clear-fix">
        <h4 class="cbs-main-list-item-section-header-header">
            <span>Booking summary</span>
        </h4>
        <h5 class="cbs-main-list-item-section-header-subheader">
            <span>Please provide us with your contact information.</span>
        </h5>
    </div>
    <div class="cbs-main-list-item-section-content cbs-clear-fix">
        <ul class="cbs-booking-summary cbs-list-reset cbs-clear-fix">
        <li class="cbs-booking-summary-date">
                <div class="cbs-meta-icon cbs-meta-icon-date"></div>
 
                <span>Your Selected Car Type</span>
                <h5>
                    <span></span>
                    <div id="cartype">
                    
                </h5>
            </li>
            <li class="cbs-booking-summary-date">
                <div class="cbs-meta-icon cbs-meta-icon-date"></div>
 
                <span>Your basic price for selected car type</span>
                <h5>
                    <span></span>
                    <div id="price">
                    <span></span></div>
                </h5>
            </li>
            <li class="cbs-booking-summary-date">
                <div class="cbs-meta-icon cbs-meta-icon-date"></div> <span>Your Selected Wash type</span>
              <h5>
                <span></span>
                    <div id="washtype">
                    <span><?php if(isset($wash_name)){echo $wash_name;} ?></span></div>
                </h5>
            </li>
            <li class="cbs-booking-summary-date">
                <div class="cbs-meta-icon cbs-meta-icon-date"></div>
 
                <span>Your basic price for selected wash type</span>
                <h5>
                    <span></span>
                    <div id="washprice">
                    
                </h5>
            </li>
            <li class="cbs-booking-summary-date">
                <div class="cbs-meta-icon cbs-meta-icon-date"></div>
               
                <span>Your Appointment Date</span>
               <h5> <div id="slotdate">
                    <span></span></div>
                </h5>
            </li>
            <li class="cbs-booking-summary-time">
                <div class="cbs-meta-icon cbs-meta-icon-time"></div>
                <span></span>
                   
                <span>Your Appointment Time</span>
                <h5> <div id="slottype">
                    <span></span></div>
                </h5>
            </li>
            <li class="cbs-booking-summary-time">
                <div class="cbs-meta-icon cbs-meta-icon-time"></div>
                <span></span>
                   
                <span> time Duration for the wash process</span>
                <h5> <div id="washduration">
                    <span></span></div>
                </h5>
            </li>
            <li class="cbs-booking-summary-time">
                <div class="cbs-meta-icon cbs-meta-icon-time"></div>
                <span></span>
                   
                <span> T<h1>total Price</span>
                <h5> <div id="totalamount"></h1>
                    <span></span></div>
                </h5>
            </li>
            <li class="cbs-booking-summary-time">
                <div class="cbs-meta-icon cbs-meta-icon-time"></div>
                <span></span>
                   
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Confirm booking</button>
            </li>
            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
         <div class="modal-content">
         <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Please enter your vehicle registration number</h5>
         </div>
              <div class="modal-body">
        
                  <form action="savebookingaswathy.php" method="POST" enctype="multipart/form-data">
                   Registration Number<input type = "text" name="regno" required><br>
                 
                  <input type="submit" class="button" value="save" name="addcategory">
                 </form>
             </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
  </div>
</div>
           
          
          

           

            

           </ul>
    </div>
</li>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function() {
    $("#btnbooking").click(function(){
        alert("button");
    }); 
});
</script>
<script>
    var links = document.querySelectorAll('.setcartype');
    links.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            links.forEach(function (link) {
                link.classList.remove('selected');
            });

            this.classList.add('selected');
            var id = this.getAttribute('data-id');

            $.ajax({
                url: "setcarSession.php",
                data: { cartypeID: id },
                success: function(data){
                
                    // Update the displayed session value without refreshing
                    $('#cartype').html(data);
                }
            });


            $.ajax({
                url: "setprice.php",
                data: { cartypeID: id },
                success: function(data) {
                
                    // Update the displayed session value without refreshing
                    $('#price').html(data);
                }
            });
            $.ajax({
                url: "settotal.php",
                data: { cartypeID: id },
                success: function(data) {
                
                    // Update the displayed session value without refreshing
                    $('#totalamount').html(data);
                }
            });


        });
    });

    var washLinks = document.querySelectorAll('.setwashtype');
    washLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            washLinks.forEach(function (link) {
                link.classList.remove('selected');
            });

            this.classList.add('selected');
            var id = this.getAttribute('data-id');
          
            $.ajax({
                url: "setwashSession.php",
                data: { washtypeID: id },
                success: function(data) {
                    //console.log(data);
                    // Update the displayed session value without refreshing
                    $('#washtype').html(data);
                }
            });
            $.ajax({
                url: "setwashduration.php",
                data: { washtypeID: id },
                success: function(data) {
                    //console.log(data);
                    // Update the displayed session value without refreshing
                    $('#washduration').html(data);
                }
            });
            $.ajax({
                url: "setwashprice.php",
                data: { washtypeID: id },
                success: function(data) {
                    //console.log(data);
                    // Update the displayed session value without refreshing
                    $('#washprice').html(data);
                }
            });

            $.ajax({
                url: "settotal2.php",
                data: { washtypeID: id },
                success: function(data) {
                    //console.log(data);
                    // Update the displayed session value without refreshing
                    $('#totalamount').html(data);
                }
            });
        });
    });
</script>

<!-- Rest of your JavaScript code remains the same -->

<script>
  var links = document.querySelectorAll('.setslottype');
  links.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault(); // Prevent the link from navigating

      var id = this.getAttribute('data-id');
      var bookdate = this.getAttribute('data-bookdate');
      alert(bookdate); //
   
      
      // Use AJAX to send a request to setcarSession.php with the ID parameter
      $.ajax({
        url: "setslotSession.php",
        data: { slottypeID: id,bookDate:bookdate }, // Send the ID to the server
        success: function(data) {
          // The session variable is set on the server; you can handle the response if needed.
          // For example, you can update the UI to reflect that the session value has been set.
          $('#slottype').html(data); // Log the response from the server
        }
      });
      $.ajax({
        url: "setslotdate.php",
        data: { slottypeID: id,bookDate:bookdate }, // Send the ID to the server
        success: function(data) {
          // The session variable is set on the server; you can handle the response if needed.
          // For example, you can update the UI to reflect that the session value has been set.
          $('#slotdate').html(data); // Log the response from the server
        }
      });
    });
  });
</script>
<script>
    // Get references to the link and the div
    var showLink = document.getElementById("showDiv");
    var divToShow = document.getElementById("myDiv");

    // Add a click event listener to the link
    showLink.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default link behavior

        // Toggle the visibility of the div
        if (divToShow.style.display === "none") {
            divToShow.style.display = "block";
            var carhiddenFieldValue = document.getElementById('cartypeValue').value;
            var outputDiv = document.getElementById('outputDiv');
            outputDiv.innerHTML = "The value of the hidden field is: " + carhiddenFieldValue;
    

           
        } else {
            
            divToShow.style.display = "none";
        }
    });
</script>






                   

<!--minu.....-->

     
                    <?php
        
                ?>
    
    
     
        
        
    


        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <p><i class="fa fa-map-marker-alt"></i>piravom, kerala, india</p>
                            <p><i class="fa fa-phone-alt"></i>045673356544</p>
                            <p><i class="fa fa-envelope"></i>info@example.com</p>
                            <div class="footer-social">
                                <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="">About Us</a>
                            <a href="">Contact Us</a>
                            <a href="">Our Service</a>
                            <a href="">Service Points</a>
                            <a href="">Pricing Plan</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Useful Links</h2>
                            <a href="">Terms of use</a>
                            <a href="">Privacy policy</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-newsletter">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
             
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
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
