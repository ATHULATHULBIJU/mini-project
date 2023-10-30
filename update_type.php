<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t_id = $_POST['t_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $allow = array("jpg", "jpeg", "gif", "png");
    // Check if a new image file is uploaded
    $todir = 'image/';

    $image_name = $_FILES['image']['name']; // Get the uploaded image's name

    if (!empty($image_name)) { // Check if an image was uploaded
        $info = pathinfo($image_name); // Get file extension
        $file_extension = strtolower($info['extension']);

        if (in_array($file_extension, $allow)) {
            $image_path = $todir . $image_name;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                $sql = "UPDATE tbl_type SET name='$name', price='$price', duration='$duration', image='$image_name' WHERE t_id='$t_id'";
            } else {
                echo "Error uploading image.";
            }
        } else {
            $sql = "UPDATE tbl_type SET name='$name', price='$price', duration='$duration' WHERE t_id='$t_id'";
            echo "Error: The file extension is not allowed.";
        }
    } else {
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
