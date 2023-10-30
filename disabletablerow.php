<?php
include_once 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .car-card {
            display: inline-block;
            margin: 10px;
            border: 1px solid #333;
            padding: 10px;
        }

        .car-card:hover {
            background-color: skyblue;
            transition: background-color 0.3s;
        }

        .image-container img {
            transition: filter 0.3s;
        }

        .image-container img:hover {
            filter: grayscale(100%) sepia(100%) hue-rotate(180deg);
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Vehicle Type</h1>
    <?php
    $sql = "SELECT * FROM tbl_car";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $carTypeId = $row['car_id']; // Get the car type ID
    ?>
        <div class="car-card">
            <div class="image-container">
                <a href="javascript:void(0);" data-car-id="<?php echo $carTypeId; ?>" onclick="selectCarType(this)">
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

<div class="container">
    <h1>Wash Type</h1>
    <?php
    $sql = "SELECT * FROM tbl_type";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $washTypeId = $row['t_id']; // Get the wash type ID
    ?>
        <div class="car-card">
            <div class="image-container">
                <a href="javascript:void(0);" data-wash-id="<?php echo $washTypeId; ?>" onclick="selectWashType(this)">
                    <img src="image/<?php echo $row['image']; ?>">
                </a>
                <div class="card-body">
                    <h3><?php echo $row['name']; ?></h3>
                    <h3><?php echo $row['duration']; ?></h3>
                    <h3><?php echo $row['price']; ?></h3>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>




    <div class="container">
        <table border="1">
            <tr>
                <?php
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
                ?>
                        <td>
                            <?php
                            $start = $row['start'];
                            $end = $row['end'];
                            $slotId = $row['slot_id'];
                            $date = $datearray[$i];
                            $disableSlot = false;

                            // Check if the slot is already booked for the specific date
                            $queryToCheckDisable = "SELECT COUNT(*) AS count FROM tbl_bookslot WHERE slot_id = $slotId AND date = '$date'";
                            $resultDisable = mysqli_query($conn, $queryToCheckDisable);
                            $rowDisable = mysqli_fetch_assoc($resultDisable);

                            if ($rowDisable['count'] > 0) {
                                $disableSlot = true;
                            }

                            if ($disableSlot) {
                                // If the slot is disabled
                                echo "<span style='color: gray;'>$start-$end</span>";
                            } else {
                                // If the slot is enabled, add a link with an event handler
                            ?>
                                <a href="javascript:void(0);" onclick="bookSlot(<?php echo $slotId; ?>, '<?php echo $date; ?>', '<?php echo $start; ?> - <?php echo $end; ?>')">
                                    <?php echo $start; ?> - <?php echo $end; ?>
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                <?php
                    }
                ?>
                </tr>
                <?php
                }
                ?>
        </table>
        <a href="savebookingaswathy.php" class="btn btn-primary">Booknow</a>
    </div>

    <script>
        function bookSlot(slotId, date, time) {
           
        <?php 
           echo '$_SESSION["slot_id"] = "'; ?> + slotId + <?php '";' ?>;
            if (confirm("Book this slot: " + time + " for " + date + "?")) {




                var xhr = new XMLHttpRequest();
        xhr.open("POST", "book_slot.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                if (response === "success") {
                    // Booking was successful; update the interface as needed
                    alert("Booking successful!");
                } else {
                    // Booking failed; handle the error, if needed
                    alert("Booking failed.");
                }
            }
        };

        var data = "slotId=" + slotId + "&date=" + date + "&time=" + time;
        xhr.send(data);
    }
                // Here, you can perform the booking process
                // You can use slotId, date, and time to insert into tbl_bookslot or perform any other actions.
                // Example: You can make an AJAX call to a PHP script to insert the booking record.
                // After the booking is successful, you can
    
            }
        
    
    function selectCarType(anchorElement) {
        // Retrieve the car type ID from the data attribute
        var carTypeId = anchorElement.getAttribute("data-car-id");
        <?php echo '$_SESSION["car_type_id"] = "'; ?> + carTypeId + <?php '";' ?>;
        
        // You can now use the carTypeId as needed, e.g., for processing or redirection.
        // Example: Redirect to a page with the selected car type ID
        // window.location.href = "carTypePage.php?id=" + carTypeId;
    }

    function selectWashType(anchorElement) {
        // Retrieve the wash type ID from the data attribute
        var washTypeId = anchorElement.getAttribute("data-wash-id");
        <?php echo '$_SESSION["wash_type_id"] = "'; ?> + washTypeId + <?php '";' ?>;
        
        // You can now use the washTypeId as needed, e.g., for processing or redirection.
        // Example: Redirect to a page with the selected wash type ID
        // window.location.href = "washTypePage.php?id=" + washTypeId;
    }
</script>
</body>

</html>