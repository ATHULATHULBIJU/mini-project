<?php
session_start();
include_once "connection.php";
$output='';
$sql="select * from tbl_booking where bookingdate='".$_POST['dateID']."' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);?>
<div class="col-md-3" id="order">
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $row['b_id']; ?></h5>
        <p class="card-text">CUSTOMER NAME: <?php echo $row['c_username']; ?></p>
        <p class="card-text">EMAIL: <?php echo $row['email']; ?></p>
        <p class="card-text">PHONE NUMBER: <?php echo $row['c_phone']; ?></p>
        <p class="card-text">VECHICLE NO: <?php echo $row['vechicleno']; ?></p>
        <p class="card-text">TYPE: <?php echo $row['type']; ?></p>
        <p class="card-text">DATE: <?php echo $row['bookingdate']; ?></p>
        <p class="card-text">TIME: <?php echo $row['bookingtime']; ?></p>                            
        <form method="POST" action="viewabooking.php">
            <input type="hidden" name="ids" value="<?php echo $row['b_id']; ?>">
            <input type="submit" name="id" value="Delete" class="btn btn-danger">
            <button type="button" class="btn btn-danger" onclick="showUpdatePopup(<?php echo $row['b_id']; ?>, '<?php echo $row['c_id']; ?>', '<?php echo $row['bookingdate']; ?>', '<?php echo $row['bookingtime']; ?>'  )">Edit</button>
            
        </form>

        <div id="updatePopup" class="popup">
<div class="popup-content">
<span class="close" onclick="closeUpdatePopup()">&times;</span>
<h2>Update type</h2>
<form method="POST" action="update_type.php" enctype="multipart/form-data">
<input type="hidden" name="t_id" id="updatetypeId">
<label for="updateName"> Name:</label>
<input type="text" id="updateName" name="name" required>
<label for="updatePrice">Price:</label>
<input type="number" id="updatePrice" name="price" required>

<label for="updateduration">duration:</label>
<input type="number" id="updateduration" name="duration" required>

<!--             <label for="updateProductImage">Product Image:</label>
<input type="file" id="updateProductImage" name="product_image" accept="image/*"> -->

<input type="submit" class="btn btn-danger" value="Update">
</form>
</div>
</div>




    </div>
</div>
</div>

<?php

echo $output;
?>