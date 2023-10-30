<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Admin - View Customers</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include('admin.html'); ?>
    <div id="content">
        <h1>Customer List</h1>
        <label for="datepicker">Select a Date:</label>
        <input type="date" id="datepicker">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
            </tr>
            <?php
            include_once('connection.php');
            $query = "SELECT * FROM tbl_customers";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["c_id"] . "</td>";
                    echo "<td>" . $row["c_username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["c_phone"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No customers found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
