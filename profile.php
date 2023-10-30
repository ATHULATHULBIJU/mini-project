<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>

<?php
session_start(); // Start the session

include("connection.php");

if (isset($_POST['btn_update'])) {
    $username = $_POST["txt_name"]; // Change "c_username" to "txt_name"
    $useremail = $_POST["txt_email"]; // Change "email" to "txt_email"
    $usercontact = $_POST["txt_contact"]; // Change "c_phone" to "txt_contact"

    $upQry = "UPDATE tbl_customers SET c_username='$username', email='$useremail', c_phone='$usercontact'
             WHERE c_id='" . $_SESSION["customerid"] . "'";

    if ($conn->query($upQry)) {?>
        <script>
        Swal.fire({
            icon: 'success',
            text: ' Account changed successfully ',
            didClose: () => {
                window.location.href = "profile.php";
            }
        });
    </script>
   
        <?php
    } else {
        ?>
        <script>
            alert("Failed");
            window.location = "Profile.php";
        </script>
        <?php
    }
}

$userid = $_SESSION['customerid'];
$selQry = "SELECT * FROM tbl_customers WHERE c_id='$userid'";
$res = $conn->query($selQry);
$row = $res->fetch_assoc();
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
}</style>

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
  
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Name</td>
                <td><label for="txt_name"></label>
                    <input type="text" name="txt_name" id="txt_name" value="<?php echo $row["c_username"] ?>" />
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><label for="txt_email"></label>
                    <input type="text" name="txt_email" id="txt_email" value="<?php echo $row["email"] ?>" />
                </td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><label for="txt_contact"></label>
                    <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row["c_phone"] ?>" />
                </td>
            </tr>
            <tr>

                <td colspan="2" align="center"><input type="submit" name="btn_update" id="btn_update" value="Update"></td>
            </tr>
        </table>
    </form>
    <br><br><br><br><br><br><br><br>
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
</div>
</body>

</html>
