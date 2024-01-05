
<?php
session_start();

include_once('connection.php');
$_SESSION['carprice']=0;
$_SESSION['packageprice']=0;
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Template Stylesheets -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/packagestyle.css" rel="stylesheet">
    <style>
    /* Apply styles when hovering over the card */
.car-card:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transform: scale(1.02); /* Scale up the card slightly on hover */
}

/* Apply styles when the card is clicked or selected */
.car-card:active {
  background-color: #007BFF; /* Change the background color on click */
  color: #fff; /* Change text color on click */
}

/* Optionally, apply styles for selected cards that are not active (clicked) */
.car-card.selected {
  background-color: #007BFF; /* Change the background color for selected cards */
  color: #fff; /* Change text color for selected cards */
}
</style>
     </head>

<body>
    <!-- Rest of your HTML content -->
    <!-- Top Bar Start -->
    <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.html">
                            <h1>AUTO<span>Wash</span></h1>
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
                            <a href="about1.php" class="nav-item nav-link active">About</a>
                            <a href="service.php" class="nav-item nav-link">Service</a>
                            <a href="package.php" class="nav-item nav-link">Package</a>
                            <a href="location.php" class="nav-item nav-link">Washing Points</a>
                          <!--  <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu">
                                    <a href="blog.php" class="dropdown-item">Blog Grid</a>
                                    <a href="single.php" class="dropdown-item">Detail Page</a>
                                    <a href="team.php" class="dropdown-item">Team Member</a>
                                    <a href="packagebooking.php" class="dropdown-item">Schedule Booking</a>
                                </div>
                            </div>-->
                            <a href="contact1.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-custom" href="User.php"><?php echo $_SESSION['customername'] ; ?></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Washing Plan</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Price</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Price Start -->

        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Washing Plan</p>
                    <h2>Choose Your Car Type</h2>
                </div>
                
                
                <div class="container">
    <h1>Vehicle Type</h1>
    <div class="car-card-container">
        <?php
        $sql = "SELECT * FROM tbl_car";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="car-card">
                <div class="image-container">
                    <a href='#' class="setcartype" data-id="<?php echo $row['car_id']; ?>">
                        <img src="image/<?php echo $row['image']; ?>">
                    </a>
                    <div class="card-body">
                        <h3><?php echo $row['type']; ?></h3>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

      
    
          
    <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Washing Plan</p>
                    <h2>Choose Your Package</h2>
                </div>
                <div class="row">
                <?php
        $sql="select * from  tbl_package";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
            $packageid=$row['p_id'];
           
        ?>
                    <div class="col-md-4" style="padding:10px;">
                        <div class="price-item featured-item h-100">
                            <div class="price-header">
                                <h3><?php echo $row['name'];?></h3>
                                <h2><span>Rs</span><strong><?php echo $row['price'];?></strong><span></span></h2>
                            </div>
                            <div class="price-body">
                                <ul>
                                <?php 
                                    $sql="select p.* , t.name  from packagetypes p join tbl_type t  on p.type_id = t.t_id  where p.package_id='".$packageid."'";
                                    $pack= mysqli_query($conn,$sql);
                                    while($rowp=mysqli_fetch_array($pack)){
                                    ?>
                                    <li><i class="far fa-check-circle"></i><?php echo $rowp['name'];?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="price-footer">
                            <!-- <a href='#' class="btn btn-custom"  class="setpackagetype" id="btnbooking1" data-id="<?php echo $row['p_id']; ?>">BookNOw</a> -->
                            <button id="myButton" data-id="<?php echo $row['p_id']; ?>">Book now</button>
                                          <!-- <a class="btn btn-custom" id="book" href="packagebooking.php?id=<?php echo $row['p_id'];?> ">Booking Now </a>
                            -->
                                </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Price End -->



        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    
                    <h2>Choose Your Date</h2>
                </div>
                <div class="row">
            
                <?php 
//include('connection.php');
//echo "jjjjjjjjjjjjjjjjjj";
$sql = "SELECT pkgbook_date FROM packagebooking";
$result = mysqli_query($conn, $sql);
$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row['pkgbook_date'];
   // echo $row['bookdate']; echo "<br />";
   // echo $data;// Output the start_date field
}
?>
<div class="container">
    
    <input type="text" name="date" class="form-control datepicker" autocomplete="off" value="Click here for choose day" required>
    
</div>


                </div>
            </div>
        </div>
        
     

<!-- Booking summary --> <div class="cbs-main-list-item">
                    <h4 class="cbs-main-list-item-section-header-header">
                        Booking Summary
                    </h4>
                    <small>Please provide us with your contact information.</small>
                </div>

                <div class="col-lg-12">
                    <div>
                        <div class="d-flex justify-content-between">
                            <div class="card col-lg-6 my-1 mx-2">
                                <div>
                                    <span><i class="bi bi-car-front mr-1"></i>Car Type</span>
                                    <h5>
                                        <span></span>
                                        <div id="cartype">
                                            <!-- Content for the car type -->
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="card col-lg-6 my-1 mx-2">
                                <div>
                                    <span>Your basic price for selected car type</span>
                                    <h5>
                                        <span></span>
                                        <div id="price">
                                            <span></span>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="card col-lg-6 my-1 mx-2">
                                <div>
                                    <span>package choose</span>
                                    <h5>
                                        <span></span>
                                        <div id="packagetype">
                                            <?php if (isset($wash_name)) {
                                                echo $wash_name;
                                            } ?>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="card col-lg-6 my-1 mx-2">
                                <div>
                                    <span>Your basic price for selected package type</span>
                                    <h5>
                                        <span></span>
                                        <div id="packageprice"></div>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="card col-lg-6 my-1 mx-2">
                                <div>
                                    <span><i class="bi bi-calendar mr-1" required></i>Appointment Date</span>
                                    <h5>
                                        <div id="packagedate">
                                            <span></span>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="card col-lg-6 my-1 mx-2">
                                <div>
                                    <span><i class="bi bi-stopwatch mr-1"></i>Duration</span>
                                    <h5>
                                        <div id="washduration">
                                            <span>1day</span>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card col-lg-12 my-1 mx-2">
                            <div>
                                <h1 class="d-flex justify-content-between">
                                    <span><i class="bi bi-cart mr-1"></i>Total Price:</span>
                                    <span>
                                        <div id="totalamount"></div>
                                    </span>
                                </h1>
                            </div>
                        </div>



            
                <button type="button" id="modalBtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Enter vehicle number</button>
            </li>
            
            <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
    
      <!-- Modal content-->
         <div class="modal-content">
         <div class="modal-header">
              <button type="button" class="close ml-1" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Please Enter Your Vehicle Registration Number</h5>
         </div>
              <div class="modal-body">
        
                  <form action="payment.php" method="POST" enctype="multipart/form-data">
                  <label class="form-label">Registration Number</label>
                  <input type = "text" name="regno" class="form-control" required>
                   <div class="d-flex justify-content-center">
                 
                  <input type="submit" class="btn btn-outline-primary mt-2" value="procced to Advance Pay" name="addcategory">
                   </div>
                 </form>
             </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
  </div>
</div>
</div>
</div>
</div>
        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                            <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
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
                <p>&copy; <a href="#"></a> <a href="https://htmlcodex.com"></a></p>
            </div>
        </div>
        <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    
    var disableDates = <?php
        // Format dates consistently with leading zeros
        echo json_encode(array_map(function($date) {
            return date('Y-m-d', strtotime($date));
        }, $data));
    ?>;
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd', // Match the date format with your database
        beforeShowDay: function(date){
            var dmy = date.getFullYear() + "-" +
                ("0" + (date.getMonth() + 1)).slice(-2) + "-" + // Ensure two-digit month
                ("0" + date.getDate()).slice(-2); // Ensure two-digit day
                content: '<div>' + date.getDate() + '</div>' 
            if(disableDates.indexOf(dmy) != -1){
                return {
                    classes: 'disabled-date',
            tooltip: 'This date is already booked'
                }
            }
            else{
                return true;
            }
        }
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
                url: "setpackagetot2.php",
                data: { cartypeID: id },
                success: function(data) {
                
                    // Update the displayed session value without refreshing
                    $('#totalamount').html(data);
                }
            });


        });
    });
            </script>

<script>
   /*  var links = document.querySelectorAll('.setpackagetype');
    links.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            links.forEach(function (link) {
                link.classList.remove('selected');
            });

            this.classList.add('selected'); */
            $(document).ready(function() {
            // Attach the click event listener for the button
            $(document).on('click', '#myButton', function() {
                // This will work for dynamically generated buttons as well
                alert("Button clicked");
                var id = $(this).data('id');

                // Perform your AJAX actions here
                $.ajax({
                    url: "setpackageSession.php",
                    data: { packageID: id },
                    success: function(data) {
                        $('#packagetype').html(data);
                    }
                });

            $.ajax({
                url: "setpackageprice.php",
                data: { packageID: id },
                success: function(data) {
                
                    // Update the displayed session value without refreshing
                    $('#packageprice').html(data);
                }
            });
            $.ajax({
                url: "setpackagetot.php",
                data: { packageID: id },
                success: function(data) {
                
                    // Update the displayed session value without refreshing
                    $('#totalamount').html(data);
                }
            });
        });
    });
            </script>

<script>
    $(document).ready(function() {
    // Disable the button initially
    $('#modalBtn').prop('disabled', true);
    $('#packagedate').html('<span style="color: red;">Select a date to proceed.</span>');

    // Datepicker initialization
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        todayHighlight: true
    });

    // Event handler for date selection
    $('.datepicker').on('changeDate', function() {
        var selectedDate = $(this).val();

        // Check if a date is selected
        if (selectedDate) {
            // Enable the button
            $('#modalBtn').prop('disabled', false);

            // Perform AJAX request
            $.ajax({
                url: "setpackagedate.php",
                method: "POST",
                data: { bookdate: selectedDate },
                success: function(data) {
                    $('#packagedate').html(data);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + xhr.status + " - " + error);
                }
            });
        } else {
            // If no date is selected, disable the button and display a message
            $('#modalBtn').prop('disabled', true);
            $('#packagedate').html('<span>Select a date to proceed.</span>');
        }
    });

    // Handle button click
    $('#modalBtn').on('click', function() {
        if ($('#modalBtn').prop('disabled')) {
            alert('Please select a date before proceeding.');
        }
    });
});

</script>

     <script>
        var cards = document.querySelectorAll('.car-card');

        // Add a click event listener to each 'card'
        cards.forEach(function(card) {
            card.addEventListener('click', function() {
                // Remove the 'selected' class from all cards
                cards.forEach(function(c) {
                    c.classList.remove('selected');
                });
                // Toggle the 'selected' class for the clicked card
                card.classList.toggle('selected');
            });
        });
    </script>
    <!--<script>
        var 
        documnet.getElementById("modalBtn").addEventListener('click', function(event){

        }
    </script>-->


</body>
</html>
