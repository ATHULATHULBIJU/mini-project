<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    require('connection.php');

    if (isset($_GET['amt'])) {
        $email = $_SESSION['email'];
        $amt = $_GET['amt'];
        $bid = $_GET['id'];
        $date = date('Y-m-d H:i:s');

        $sql = "insert into payment (booking_id, amount, paid_date) values ('$bid', '$amt', '$date')";

        if (insert_conn($sql)) {
            $pay_id = mysqli_insert_id($conn);

            $sql = "select * from booking where booking_id='$bid'";
            $res = select_data($sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $product_id = $row['booking_id'];
                $car_id = $row['car_id'];

                $sql3 = "UPDATE tbl_booking SET status=1 WHERE b_id='$product_id'";
                $sql4 = "UPDATE tbl_type SET status=1 WHERE t_id='$car_id'";

                if (update_data($sql3) && update_data($sql4)) {
                    // Booking and updates were successful
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Booking Successfully!",
                            }).then((result) => {
                                window.location.replace("booking.php");
                            });
                        </script>';
                } else {
                    // Failed to update records
                    echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Failed to update records!",
                            }).then((result) => {
                                window.location.replace("customerdashboard.php");
                            });
                        </script>';
                }
            }
        } else {
            // Failed to insert payment record
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Failed to insert payment record!",
                    }).then((result) => {
                        window.location.replace("customerdashboard.php");
                    });
                </script>';
        }
    } else {
        // Missing or incorrect parameters in the URL
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Invalid request!",
                }).then((result) => {
                    window.location.replace("customerdashboard.php");
                });
            </script>';
    }
    ?>
</body>

</html>
