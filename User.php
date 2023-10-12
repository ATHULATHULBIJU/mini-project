<?php  
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Ink&Paper</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="ink&paper.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
        <!-- <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="#">Award Winners</a></li>
                           <li><a href="#">New Arrivals</a></li>
                           <li><a href="#">Today's Deals</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-0">
                     <div class="logo"><a href="home.php"><h2 class="banner_taital">OGBS</h2></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <h2>Hello Readers!</h2>
                     <a href="index.html">Home</a>
                     <a href="#">New Arrivals</a>
                     <a href="#">Best Sellers</a>
                     <a href="#">Featured Authors</a>
                     <a href="#">Today's deals</a>
                  </div>
                  
                  </div>
                  <div class="header_box">
                     <!--<div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
                           <a href="#" class="dropdown-item">
                           <img src="images/India_Flag .jpeg" class="mr-2" alt="flag">
                           India
                           </a>
                        </div>
                     </div>-->
                   
                        <ul>
                           <li><a href="#">
                           
                           </li><?php if(isset($_SESSION["name"])){?>
                              <li><i class="fa fa-user " aria-hidden="true"></i>
                              <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["name"];?>
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        
                     <a class="dropdown-item" href="UserDashboard.php">Your Account</a>
                     <a class="dropdown-item" href="#">Your Order</a>
                        <a class="dropdown-item" href="signout.php">Sign Out</a>
                        
                     </div>
                  </div>
                             </li>
                           <?php }else{ ?>
                              <li><a href="login_signup.php">
                             
                           <?php }?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
       
      <!-- book section start -->
      <div class="fashion_section">
  <main id="main" class="main">
    <div class="banner_taital">
      <h1>Your Account</h1>
      <nav>
       <!-- End Page Title -->
 <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="userdashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Your Account</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
        <!-- Order Card -->
<div class="col-xxl-4 col-md-4">
  <a href="#">
    <div class="card info-card sales-card mb-3">
      <div class="card-body">
        <div class="d-flex align-items-left">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-cart">
              <img src="images/myoder.jpg" alt="Order" style="max-width: 100%; max-height: 100%;">
            </i>
          </div>
          <div class="ps-1">
            <h5 class="card-title text-left">Your Order</h5>
            <span class="text-muted medium text-left pt-1 ps-1">Track and Cancel Orders</span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div><!-- End Order Card -->

<!-- Login Card -->
<div class="col-xxl-4 col-md-4">
  <a href="changepassword.php">
    <div class="card  revenue-card mb-3">
      <div class="card-body">
        <div class="d-flex align-items-left">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-currency-dollar">
              <img src="images/loginlock.jpg" alt="Login & Security" style="max-width: 100%; max-height: 100%;">
            </i>
          </div>
          <div class="ps-1">
            <h5 class="card-title text-left">Login & Security</h5>
            <span class="text-muted medium text-left pt-1 ps-1"> Edit Payment Details and Change Password</span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div><!-- End Login Card -->

<!-- Addresses Card -->
<div class="col-xxl-4 col-md-4">
  <a href="Addresses.php">
    <div class="card info-card customers-card mb-3">
      <div class="card-body">
        <div class="d-flex align-items-left">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <img src="img/bg1.jpg" alt="Addresses" style="max-width: 100%; max-height: 100%;">
          </div>
          <div class="ps-1">
            <h5 class="card-title text-left">Your Addresses</h5>
            <span class="text-muted medium text-left pt-1 ps-1">Add and Edit Addresses</span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div><!-- End Addresses Card -->

<!-- Contact Card -->
<div class="col-xxl-4 col-md-4">
  <a href="contactus.html">
    <div class="card info-card custom-card mb-3">
      <div class="card-body">
        <div class="d-flex align-items-left">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <img src="images/headset.jpg" alt="Contact Us" style="max-width: 100%; max-height: 100%;">
          </div>
          <div class="ps-1">
            <h5 class="card-title text-left">Contact Us</h5>
            <span class="text-muted medium text-left pt-1 ps-1">Reach us directly</span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div><!-- End Contact Card -->

      </div>
    </section>
  </main>
</div>


               </div>
              
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><h2 class="banner_taital">OGBS</h2></a></div>
           <!-- <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>-->
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Award Winners</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+91 00000-00000</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2023 All Rights Reserved.</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="javascript/jquery.min.js"></script>
      <script src="javascript/popper.min.js"></script>
      <script src="javascript/bootstrap.bundle.min.js"></script>
      <script src="javascript/jquery-3.0.0.min.js"></script>
      <script src="javascript/plugin.js"></script>
      <!-- sidebar -->
      <script src="javascript/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="javascript/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>