<?php
session_start();
include_once 'connection.php';
//error_reporting(E_ALL);
$name = "";
$Email = "";
$phonenumber = "";
$password = "";
$user = "";
$nameErr = "";
$EmailErr = "";
$phoneErr = "";
function test_input($data)
{
  //echo "text input test data";
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  $name = test_input($_POST["name"]);
  $Email = test_input($_POST["email"]);
  $phonenumber = test_input($_POST["phonenumber"]);
  $password = test_input($_POST["password"]);
  $flag = 1;
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $flag = 0;
    echo "print";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
      $flag = 0;
    }
  }
  if (empty($_POST["email"])) {
    $EmailErr = "Email is required";
    $flag = 0;
  } else {
    echo "";
    $Email = test_input($_POST["email"]);
    // check if e-mail address is well-formed

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {

      $EmailErr = "Invalid email format";
      $flag = 0;
    }
  }
  if (empty($_POST["phonenumber"])) {
    $phoneErr = "phone number is required";
    $flag = 0;
  } else {
    $phonenumber = test_input($_POST["phonenumber"]);
    $pattern = '/^\d{10}$/'; // Regular expression pattern for 10-digit phone number  
    if (preg_match($pattern, $phonenumber)) {
      $phonenumber = test_input($_POST["phonenumber"]);
    } else {
      $phoneErr = "Invalid phone number";
      $flag = 0;
    }
  }







  
  if ($password == $_POST['confpassword']) {
    $dsql = "SELECT * FROM tbl_customers WHERE email = '$Email'";
    $dresult = mysqli_query($conn, $dsql);
    if ($dresult->num_rows > 0) {
      $_SESSION['emailErr'] = "Email already exists";
    } else {
    $sql = "INSERT INTO tbl_customers (c_username,email,c_password,c_phone) VALUES ('$name', '$Email', '$password','$phonenumber')";
    $result = mysqli_query($conn, $sql);
    session_start();
    $_SESSION['customerid'] = $conn->insert_id;
    $_SESSION['customername'] = $name;
    $type = "customer";
    $sql = "insert into tbl_login (email,password,usertype) values ('$Email','$password','$type')";

    //email senting code
    require 'vendor/autoload.php';
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Use SMT
    $mail->isSMTP();

    // SMTP settings
    $mail->SMTPDebug = 3;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'athulbijuupm03@gmail.com';
    $mail->Password = 'upil hknz xnao lwzm';

    // Set 'from' email address and name
    $mail->setFrom('athulbijuupm03@gmail.com', 'Athul Biju');

    // Add a recipient email address
    $mail->addAddress($Email);

    // Email subject and body
    $mail->Subject = 'AutoWash car washing center';
    $mail->Body = 'REgistration successfullllllllllllllllllllll';

    // Send email
    if (!$mail->send()) {
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message sent!';
    }
    $result = mysqli_query($conn, $sql);
    header("location:customerdashboard.php");
  }   
} else {
  $_SESSION['passMatch'] = "password dosent match";
}

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" Today in this blog you will learn how to create a responsive Login & Registration Form in HTML CSS & JavaScript. The blog will cover everything from the basics of creating a Login & Registration in HTML, to styling it with CSS and adding with JavaScript." />
  <meta name="keywords" content=" 
 Animated Login & Registration Form,Form Design,HTML and CSS,HTML CSS JavaScript,login & registration form,login & signup form,Login Form Design,registration form,Signup Form,HTML,CSS,JavaScript,
" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Login & Signup Form HTML CSS | CodingNepal</title>
  <link rel="stylesheet" href="CSS.css" />
  <script src="../custom-scripts.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
  <style>
    body {
      background-image: url("img/bc.jpg");
    }
  </style>
  <section class="wrapper">

    <div class="form signup">
      <header>Signup</header>
      <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="name" placeholder="Full name" required>
        <span class="error"><?php if (isset($nameErr)) {
                              echo $nameErr;
                            } ?> </span>
        <input type="text" name="email" placeholder="Email address" required>
        <span class="error"><?php if (isset($EmailErr)) {
                              echo $EmailErr;
                            } ?> </span>
        <input class="far fa-eye" id="togglePassword" type="password" name="password" placeholder="Password" required>
        <span class="error"><?php if (isset($passwordErr)) {
                              echo $passwordErr;
                            } ?> </span>
        <input type="password" name="confpassword" placeholder="confirm Password" required>
        <span class="error"><?php if (isset($confpasswordErr)) {
                              echo $confpasswordErr;
                            } ?> </span>
                              <?php
        if (isset($_SESSION['passMatch'])) {
        ?>
          <small class="error" style="background-color: #ffcccc; border: 1px solid #ff0000; color: #ff0000; padding: 10px; border-radius: 5px; margin-bottom: 5px;">
            <span>
              <?php
              echo $_SESSION['passMatch'];
              unset($_SESSION['passMatch']);
              ?>
            </span>
          </small>
        <?php
        }
        ?>
        <input type="number" name="phonenumber" placeholder="phonenumber" maxlenght="10" required="" id="numericInput" oninput="limitTo10Digits(this)">
        <span class="error"><?php if (isset($phoneErr)) {
                              echo $phoneErr;
                            } ?> </span>


        <input type="submit" name="signup" value="Signup" />
        <?php
        if (isset($_SESSION['emailErr'])) {
        ?>
          <small class="error" style="background-color: #ffcccc; border: 1px solid #ff0000; color: #ff0000; padding: 10px; border-radius: 5px; margin-bottom: 5px;">
            <span>
              <?php
              echo $_SESSION['emailErr'];
              unset($_SESSION['emailErr']);
              ?>
            </span>
          </small>
        <?php
        }
        ?>
       
      </form>
    </div>


    <div class="form login">
      <header>Login</header>
      <form action="api.php" method="post">
        <input type="text" placeholder="Email address" name="email" required />

        <input type="password" placeholder="Password" name="password" required />
        <a href="forgotpassword.php">Forgot password?</a>
        <input type="submit" name="login" value="Login" />
        <?php
        if (isset($_SESSION['loginErr'])) {
        ?>
          <small class="error" style="background-color: #ffcccc; border: 1px solid #ff0000; color: #ff0000; padding: 10px; border-radius: 5px; margin-bottom: 5px;">
            <span>
              <?php
              echo $_SESSION['loginErr'];
              unset($_SESSION['loginErr']);
              ?>
            </span>
          </small>
        <?php
        }
        ?>
      </form>
    </div>

    <script>
      const wrapper = document.querySelector(".wrapper"),
        signupHeader = document.querySelector(".signup header"),
        loginHeader = document.querySelector(".login header");

      loginHeader.addEventListener("click", () => {
        wrapper.classList.add("active");
      });
      signupHeader.addEventListener("click", () => {
        wrapper.classList.remove("active");
      });

      function limitTo10Digits(input) {
        // Remove any non-digit characters
        input.value = input.value.replace(/\D/g, '');

        // Limit the input to 10 digits
        if (input.value.length > 10) {
          input.value = input.value.slice(0, 10);
        }
      }
    </script>
  </section>
</body>

</html>