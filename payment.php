<?php
include('connection.php');
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "inside post";
    
    // Use the correct names based on your HTML form
    $custid =$_SESSION['customerid'];
    echo "custid";
    echo $custid;
    $bookingid = $_SESSION['bookingid'];
echo "booking";
echo $bookingid;
    $type= $_POST['paymentMethod'];
    echo $type;
    if($type=='card')
    {
      echo "inside if";
      $creditcard = $_POST['cardNumber'];  
      
      echo"creadtcard";
      echo $creditcard;  
      $expiry = $_POST['expiryDate'];
      echo "date";
      echo $expiry;
      $cvv = $_POST['cvv'];
      echo $cvv;
      $upi=0;
      $sql = "INSERT INTO tbl_payment(c_id,b_id,paymenttype,cardnumber,expirydate,cvv, upiid) VALUES ('$custid','$bookingid','$type','$creditcard',' $expiry','$cvv', '$upi')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
          echo "Booking successfully inserted!";
          header("location: payment.php");
      } else {
          echo "Error inserting booking: " . mysqli_error($conn);
      }
    }
    else if($type==' upi')
    {
      $upi = $_POST['upiId'];
      
      $creditcard=0;
      $expiry=0;
      $cvv=0;
      $sql = "INSERT INTO tbl_payment(c_id,b_id,paymenttype,cardnumber,expirydate,cvv, upiid) VALUES ('$custid','$bookingid','$type','$creditcard',' $expiry','$cvv', '$upi')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
          echo "Booking successfully inserted!";
          header("location: payment.php");
      } else {
          echo "Error inserting booking: " . mysqli_error($conn);
      }
    }
    

  
 
} else {
    echo "post failed";
}
    
    // Retrieve the customer ID from the session
  
    
   
   
?>




<!DOCTYPE html>
<html>
<head>
  <title>Payment Options</title>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      display: flex;
      align-items: center; /* Align content vertically */
      justify-content: center; /* Align content horizontally */
      height: 100vh; /* Make the content take the full height of the viewport */
    }

    #sidebar {
      width: 300px;
      background-color: #f0f0f0;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a shadow for a better visual */
      border-radius: 10px; /* Rounded corners */
    }

    #content {
      flex: 1;
      padding: 20px;
      background-color: #fff; /* Add a background color to content */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a shadow for a better visual */
      border-radius: 10px; /* Rounded corners */
    }

    h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    input[type="radio"] {
      margin-bottom: 10px;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      margin-top: 10px;
      display: block; /* Ensure the button is a block element */
      margin: 0 auto; /* Center the button within its parent */
    }

    #cardDetailsForm, #upiDetailsForm, #qrCodeScanner {
      text-align: center; /* Align form elements to the center */
      display: none; /* Initially hide all forms */
    }

    #qrCodeScanner {
      border: 1px solid #ccc;
      padding: 10px;
      margin-top: 10px;
    }

    #qrCodeScanner img {
      width: 100%;
      max-width: 200px; /* Limit the width of the QR code scanner image */
    }

    #cardDetailsForm {
      width: 500px; /* Set the desired width */
      margin: 0 auto; /* Center the form on the page */
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #f9f9f9;
    }

    #cardDetailsForm h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="text"]:focus {
      outline: none;
      border-color: #007BFF;
    }
  </style>
</head>
<body>
  <div id="sidebar">
    <h1>Select a payment method:</h1>
    <label>
    <form action="payment.php" method="POST">
      <input type="radio" name="paymentMethod" value="card" onchange="displayCardDetailsForm()"> Credit/Debit Card
    </label><br>
    <label>
      <input type="radio" name="paymentMethod" value="upi" onchange="displayUpiDetailsForm()"> UPI
    </label><br>
    <label>
      <input type="radio" name="paymentMethod" value="cod" onchange="hideCardDetailsForm()"> Cash on Delivery
    </label><br><br>
  </div>

  <div id="content">
    <h1>Payment Details</h1>
    <p>Total Amount to be paid: <span class="total-price">Total = $100.00</span></p>

    <div id="cardDetailsForm">
      <h2>Enter Card Details:</h2>
      <label for="cardNumber">Card Number:</label>
      <input type="text" name='cardNumber' id="cardNumber" placeholder="Card Number"><br>

      <label for="cardNumber">Expiry Date:</label>
      <input type="text" name='expiryDate' id="expiryDate" placeholder="Card Number"><br>

      <label for="cardNumber">CVV:</label>
      <input type="text" name='cvv' id="cvv" placeholder="Card Number"><br>

    </div>

    <div id="upiDetailsForm">
      <h2>Enter UPI ID:</h2>
      <label for="upiId">UPI ID:</label>
      <input type="text" name="upiId" id="upiId" placeholder="Enter UPI ID"><br>
      <button onclick="showQRScanner()">Scan QR Code</button>
    </div>

    <div id="qrCodeScanner">
      <h2>QR Code Scanner</h2>
      <img src="img/qr.jpg" alt="Dummy QR Code">
    </div>
   <input type="submit" name="submit" value="process payment">
  </form>

  </div>

  <script>
    function displayCardDetailsForm() {
      document.getElementById('cardDetailsForm').style.display = 'block';
      document.getElementById('upiDetailsForm').style.display = 'none';
      document.getElementById('qrCodeScanner').style.display = 'none';
    }

    function displayUpiDetailsForm() {
      document.getElementById('upiDetailsForm').style.display = 'block';
      document.getElementById('cardDetailsForm').style.display = 'none';
      document.getElementById('qrCodeScanner').style.display = 'none';
    }

    function hideCardDetailsForm() {
      document.getElementById('cardDetailsForm').style.display = 'none';
      document.getElementById('upiDetailsForm').style.display = 'none';
      document.getElementById('qrCodeScanner').style.display = 'none';
    }

    function showQRScanner() {
      hideCardDetailsForm();
      document.getElementById('qrCodeScanner').style.display = 'block';
    }

    function processPayment() {
      const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked');

      if (selectedPaymentMethod) {
        switch (selectedPaymentMethod.value) {
          case 'card':
            alert('Processing card payment...');
            break;

          case 'upi':
            alert('Processing UPI payment...');
            break;

          case 'cod':
            alert('Processing Cash on Delivery payment...');
            break;

          default:
            alert('Invalid payment method.');
            break;
        }
      } else {
        alert('Please select a payment method.');
      }
    }
  </script>
</body>
</html>
