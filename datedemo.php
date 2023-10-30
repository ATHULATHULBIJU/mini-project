<?php 
include('connection.php');
echo "jjjjjjjjjjjjjjjjjj";
$sql = "SELECT bookdate FROM booking";
$result = mysqli_query($conn, $sql);
$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row['bookdate'];
    echo $row['bookdate']; echo "<br />";
   // echo $data;// Output the start_date field
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- Your CSS and JavaScript libraries here -->
</head>
<body>
<div class="container">
    <input type="text" name="date" class="form-control datepicker" autocomplete="off">
</div>
<script type="text/javascript">
    
    var disableDates = <?php
        // Format dates consistently with leading zeros
        echo json_encode(array_map(function($date) {
            return date('Y-m-d', strtotime($date));
        }, $data));
    ?>;
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd', // Match the date format with your database
        beforeShowDay: function(date){
            var dmy = date.getFullYear() + "-" +
                ("0" + (date.getMonth() + 1)).slice(-2) + "-" + // Ensure two-digit month
                ("0" + date.getDate()).slice(-2); // Ensure two-digit day

            if(disableDates.indexOf(dmy) != -1){
                return false;
            }
            else{
                return true;
            }
        }
    });
</script>

</script>
</body>
</html>