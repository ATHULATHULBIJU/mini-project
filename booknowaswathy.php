<?php
include_once 'connection.php';
session_start();
$_SESSION['carprice']=0;
$_SESSION['washprice']=0;
?>

<html>
<!DOCTYPE html>
<html lang="en">
    <head>
		<style>/* Add this CSS inside the <head> tag or in an external CSS file */

/* Style the form container */
form {
  margin: 20px auto;
  width: 50%;
  padding: 20px;
  background: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style the form elements */
form input[type="text"] {
  width: 100%;
  padding: 10px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Style the submit button */
form input[type="submit"] {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Style the submit button on hover */
form input[type="submit"]:hover {
  background-color: #0056b3;
}

/* Add some spacing to form rows */
form tr {
  margin: 10px 0;
}

/* Center the form */
form table {
  margin: 0 auto;
}

/* Style the top bar */
.top-bar {
  background: #007bff;
  color: white;
  padding: 10px 0;
}

/* Style the navigation bar */
.nav-bar {
  background: #333;
}

/* Style the navigation links */
.nav-bar a {
  color: white;
  margin: 0 10px;
  text-decoration: none;
  font-weight: 500;
}

/* Style the active link */
.nav-bar a.active {
  font-weight: 700;
}

/* Style the form section */
.fashion_section {
  padding: 20px 0;
  text-align: center;
}

/* Style the banner title */
.banner_taital h1 {
  font-size: 36px;
  font-weight: 700;
  color: #007bff;
}

/* Style the breadcrumbs */
.breadcrumb {
  background: transparent;
  font-size: 14px;
  margin: 0;
}

/* Style the breadcrumb items */
.breadcrumb-item {
  color: #007bff;
}

/* Style the form input on focus */
form input[type="text"]:focus {
  outline: none;
  border-color: #007bff;
}

/* Style the form table */
form table {
  width: 100%;
}

/* Style the form table cells */
form td {
  padding: 10px;
  text-align: center;
}

/* Add a border to form table cells */
form td {
  border: 1px solid #ccc;
}
.car-card-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr); /* Display 4 columns */
        gap: 20px; /* Adjust the gap between cards */
    }

    .car-card {
        border: 1px solid #ccc; /* Add a border for each card */
        padding: 10px;
    }

    .car-card:hover {
        background-color: #f0f0f0; /* Change to the desired color */
    }

    .car-card.selected {
        background-color: #007bff; /* Change to the desired color for selected cards */
        color: #fff; /* Change text color for selected cards */
    }
    .cbs-main-list-item {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            background-color: #f9f9f9;
        }

        .cbs-main-list-item-section-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 10px;
        }

        .cbs-main-list-item-section-header h4 {
            margin: 0;
        }

        .cbs-main-list-item-section-header h5 {
            font-size: 14px;
            margin: 0;
        }

        .cbs-booking-summary {
            list-style: none;
            padding: 0;
        }

        .cbs-booking-summary li {
            padding: 10px 0;
        }

        .cbs-meta-icon {
            width: 20px;
            height: 20px;
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 50%;
            margin-right: 10px;
        }

        .cbs-booking-summary h5 {
            margin: 0;
        }

        .cbs-booking-summary span {
            display: inline-block;
        }

        
    
    </style>

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
        
</style>

</head>

<body>
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
    <div>
       <!--  <p>Session Value: <span id="cartypeValue">
            <input type="hidden" id="cartypeValue" value="<?php echo $_SESSION['cartypeID']; ?>">
            <?php echo $_SESSION['cartypeID']; ?>
        </span></p> -->
    </div>
</div>


<div class="container">
    <h1>Wash Type</h1>
    <div class="car-card-container">
        <?php
        $sql = "SELECT * FROM tbl_type";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="car-card">
                <div class="image-container">
                    <a href='#' class="setwashtype" data-id="<?php echo $row['t_id']; ?>">
                        <img src="image/<?php echo $row['image']; ?>">
                    </a>
                    <div class="card-body">
                        <h3><?php echo $row['name']; ?></h3>
                        <h3>Duration: <?php echo $row['duration']; ?></h3>
                        <h3>Price: <?php echo $row['price']; ?></h3>
                    </div>
                </div>
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
           
          
          

           

            

            <li class="cbs-booking-summary-date">
                <div class="cbs-meta-icon cbs-meta-icon-date"></div>
 
                <span>totalprice</span></div>
                <h5>
                    <span></span>
                
                    <div >
                    
                </h5>
            </li>
        </ul>
    </div>
</li>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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