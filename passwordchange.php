
<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>

<?php
session_start();
include_once('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_email = $_SESSION['emailforpwdchange'];
    $usertype=$_SESSION['usertypeforpwdchange'];
    $newpwd=$_POST['newpwd'];
    $confirmpwd=$_POST['confirmpwd'];
    if($newpwd==$confirmpwd){
    $sql="update tbl_login set password='".$newpwd."' where email='".$user_email."'"; 
    $result=mysqli_query($conn,$sql);
    if($usertype=='admin')
    {
        $sqlstaff="update owner set password='".$newpwd."' where email='".$user_email."'"; 
        $rsltstaff=mysqli_query($data,$sqlstaff);
    }
    else if($usertype=='customer'){
        $sqluser="update tbl_customers set c_password='".$newpwd."' where email='".$user_email."'";
        $rsltuser=mysqli_query($conn,$sqluser);
        ?>
        <script>
                Swal.fire({
                    icon: 'success',
                    text: ' passwored changed successfully ',
                    didClose: () => {
                        window.location.href = "changepassword.php";
                    }
                });
            </script>
            <?php
           
    }

    ?>
    <script>
                Swal.fire({
                    icon: 'success',
                    text: ' passwored changed successfully ',
                    didClose: () => {
                        window.location.href = "signup.php";
                    }
                });
            </script>
            <?php
           
    }
    else{
    echo "<script>alert('password does not match');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <input type="password" name="newpwd">
        <input type="password" name="confirmpwd">
        <input type="submit" name="save" value="change Password">
    </form>
</body>
</html>