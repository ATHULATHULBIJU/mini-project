
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
if($_SERVER['REQUEST_METHOD']=='POST')
{ echo "inside the post";
   $cardnumber=$_POST['cardNumber'];
   $cardname=$_POST['cardName'];
   $cardmonth=$_POST['cardMonth'];
   $cardyear=$_POST['cardYear'];
   $cardCvv=$_POST['cardCvv'];
   echo "$cardnumber";
   echo "$cardname";
   echo "$cardmonth";
   echo "$cardyear";
   echo "$cardCvv";
   
}

include_once('connection.php');
$cartype = $_SESSION['cartypeID'];
echo "<br />";
$packagetype = $_SESSION['packageID'];
echo "<br />";

$date = $_SESSION['bookdate'];
echo "<br />";

$custid = $_SESSION['customerid'];
echo "$custid";
   
$regno=$_SESSION['vehicleno'];

   
$total=$_SESSION['totamount']  ;
echo "$total";
   
$advamt=$total*10/100;




    $sql1 = "SELECT * FROM tbl_package WHERE p_id = " . $packagetype;
    $rslt = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($rslt); // Use mysqli_fetch_assoc to get an associative array

               // $regno = $_POST['regno'];
                echo $regno;
                $sql = "INSERT into packagebooking(cust_id,car_id,package_id,pkgbook_date,reg_no) values('$custid','$cartype','$packagetype','$date','$regno')";
                
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // Get the last inserted ID
                    $last_id = mysqli_insert_id($conn);
                    echo "last inserted id".$last_id;
                }
                $sql="INSERT INTO tbl_payment(c_id,booking_id,cardnumber,cardholdername,month,year,cvv,totalamt,advamt) values('$custid',' $last_id','$cardnumber','$cardname','$cardmonth','$cardyear','$cardCvv','$total','$advamt')";
                $result=mysqli_query($conn,$sql);

             ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: ' Booked successfully ',
                    didClose: () => {
                        window.location.href = "package.php";
                    }
                });
            </script>
<?php
        
    
// Now you have the values, and you can use them as needed for further processing.
?>