<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t_id = $_POST['t_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    // Check if a new image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        // Move the uploaded file to the desired location
        move_uploaded_file($image_temp, 'uploadimage/' . $image_name);

        // Update the image field in the database with the new image name
        $sql = "UPDATE tbl_type SET name='$name', price='$price', duration='$duration', image='$image_name' WHERE t_id='$t_id'";
    } else {
        // If no new image is uploaded, update other fields without changing the image
        $sql = "UPDATE tbl_type SET name='$name', price='$price', duration='$duration' WHERE t_id='$t_id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Product updated successfully!";
        header("location:viewaddedtype.php");
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
