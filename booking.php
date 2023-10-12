<?php
include('connection.php');
session_start(); // Start the session
if(isset($_GET['id'])){
    $_SESSION['typeid']=$_GET['id'];
    $typeid = $_GET['id'];
    echo  $typeid;
}

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
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu">
                                    <a href="blog.php" class="dropdown-item">Blog Grid</a>
                                    <a href="single.php" class="dropdown-item">Detail Page</a>
                                    <a href="team.php" class="dropdown-item">Team Member</a>
                                    <a href="booking.php" class="dropdown-item">Schedule Booking</a>
                                </div>
                            </div>
                            <a href="contact1.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-custom" href="booking.php">Booking</a>
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
                        <h2>Booking</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Booking</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-header text-left">
                            <p></p>
                            <h2></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <i class=""></i>
                                    <div class="">
                                        <h3></h3>
                                        <p></p>
                                        <p><strong></strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <i class=""></i>
                                    <div class="">
                                        <h3></h3>
                                        <p></p>
                                        <p><strong></strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <i class=""></i>
                                    <div class="">
                                        <h3></h3>
                                        <p></p>
                                        <p><strong></strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <i class=""></i>
                                    <div class="">
                                        <h3></h3>
                                        <p></p>
                                        <p><strong></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="location-form">
                            <h3>Request for a car wash</h3>
                         
<?php
 $_SESSION['typeid']=$_GET['id'];
 $typeid = $_SESSION['typeid'];
 $sql = "SELECT * FROM tbl_type where t_id='".$typeid."'";
$result = mysqli_query($conn,$sql);
$srow=mysqli_fetch_array($result)
 ?>



                            <form action="typebook.php" method="POST">
                            <div class="control-group">
                                    <input type="text" id="type" name="type" class="form-control" value=<?php echo $srow['name']; ?> required="required" />
                                </div>
                                <div class="control-group">
                                    <input type="text" id="duration" name="duration" class="form-control" value=<?php echo $srow['duration']; ?> required="required" />
                                </div>
                                <div class="control-group">
                                    <input type="text" id="vechicleno" name="vechicleno" class="form-control" placeholder="vechicleno" required="required" />
                                </div>
                                <div class="control-group">
                                    <input type="date" id="bookingdate" name="bookingdate" class="form-control" placeholder="date" required="required" />
                                </div>
                                <div class="control-group">
                                <div class="control-group">
                                    <input type="time" id="bookingtime" name="bookingtime" class="form-control" placeholder="time" required="required" />
                                </div>
                                <div class="control-group">
                                    
                                    
  <b> select Car-type: </b><?php
  
  $sql = "SELECT * FROM tbl_car";
$result = mysqli_query($conn,$sql);
echo "<select name='tbl_car' id='tbl_car'>";?>
<option value="" disabled selected>- Select car-</option>;
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['car_id'] . "'>" . $row['type'] . "</option>";
}
echo "</select>";
?>
  


                                </div>
                                <input type="text" id="samount" name="samount" class="form-control" value=<?php echo $srow['price']; ?>  required="required" />
                                <?php $_SESSION['serviceamount'] = $srow['price'];   ?>
                               
                                <div class="control-group"  id="amount">
                                  
                                    <input type="text" id="camount" name="camount" class="form-control"  required="required" />
                                    <input type="text" id="tamount" name="tamount"  value=<?php echo $srow['price']; ?> class="form-control"  required="required" />
                                  
                                                              
                                </div> 
                            
                                  <div>

        <button class="btn btn-custom" type="submit">Send Request</button>
   
   
   
                             </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->
        
        
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
                
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"  src="jquery.main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tbl_car").change(function(){
            var carid = $(this).val();
           
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {carID: carid },
                success: function(data){
                    $("#amount").html(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>




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
