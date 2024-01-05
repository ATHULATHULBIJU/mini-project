<?php
session_start();
include('connection.php');
$total=$_SESSION['totamount']*10/100;
$_SESSION['pending']=1;

//$_SESSION['vehicleno']=$_POST['regno'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- Include the necessary libraries for QR code scanning -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <style>
        .body {
            background: #f5f5f5
        }

        .rounded {
            border-radius: 1rem
        }

        .nav-pills .nav-link {
            color: #555
        }

        .nav-pills .nav-link.active {
            color: white
        }

        input[type="radio"] {
            margin-right: 5px
        }

        .bold {
            font-weight: bold
        }
    </style>
</head>
<body>
    <!-- Payment form content -->
    <div class="card">
        <div class="card-header">
            <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                <!-- Credit card form tabs -->
                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                    <li class="nav-item">
                        <a href="paymentservice.php" class="nav-link">
                            <i class="fab fa-google mr-2"></i> CreditCard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="pill" href="#cod" class="nav-link">
                            <i class="fas fa-money-bill-wave mr-2"></i> Cash on Delivery
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End -->
            <!-- Credit card form content -->
            <div class="tab-content">
                <!-- credit card info-->
                <!-- Google Pay info -->
                <div id="gpay" class="tab-pane fade pt-3">
                    <h6 class="pb-2">Enter your Google Pay details</h6>
                    <form id="gpayForm" role="form">
                        <div class="form-group">
                            <label for="gpayName">
                                <h6>UPI ID</h6>
                            </label>
                            <input type="text" name="gpayName" placeholder="UPI NUMBER" required class="form-control">
                        </div>
                        <!-- Add QR Code Field -->
                        <div class="form-group">
                            <!-- You can add QR code-related form elements here if needed -->
                        </div>
                        <!-- Dummy QR Code Scanner Image -->
                        <div class="form-group">
                            <label for="qrCodeScanner">
                                <h6>QR Code Scanner</h6>
                            </label>
                            <img src="qrcode.png" alt="QR Code Scanner Image" class="img-fluid">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">Confirm Payment</button>
                        </div>
                    </form>
                </div>
                <!-- Cash on Delivery info -->
                <div id="cod" class="tab-pane fade pt-3">
                    <form id="CodForm" role="form">
                        <h6 class="pb-2">Payment will be made upon delivery.</h6>
                        <p class="text-muted">Please keep cash ready for payment when your order is delivered.</p>
                        <div class="card-footer">
                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">Confirm Payment</button>
                        </div>
                    </form>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
</body>
</html>
