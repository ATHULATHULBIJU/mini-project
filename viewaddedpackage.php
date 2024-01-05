<?php
// Start the session
session_start();
?>
<?php include('connection.php'); 

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['ids']))
{
    echo "inside isset";
    $id=$_POST['ids'];
    echo $id;
    $sql="DELETE FROM tbl_package WHERE p_id='".$id."'";
    $result=mysqli_query($conn,$sql);
    
}
else{
    // Handle the case where 'ids' is not set in the POST data
    echo "The 'ids' key is not set in the POST data.";
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu for Admin Dashboard | CodingNepal</title>
    <link rel="stylesheet" href="css/admin.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px; /* Add some space between cards */
        }

        .card-img {
            max-height: 300px; /* Limit the maximum height of the image */
        }
        
    .card-body {
        background-color: #e18a3d; /* Adjust the alpha value (0.5 for 50% transparency) */
    }

   
    /* Styles for the popup */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .popup-content {
      background-color: rgba(249, 249, 249, 0.273); /* Add an alpha channel for transparency */
        backdrop-filter: blur(10px);
        margin: 10% auto;
        padding: 20px;
        width: 40%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    /* Close button style */
    .close {
        float: right;
        cursor: pointer;
        font-size: 20px;
    }


    .close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Style for the form labels */
label {
    display: block;
    margin-bottom: 5px;
}

/* Style for the form inputs */
input[type="text"],
input[type="number"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}



    </style>
  </head>
  <body>
   <?php
    include('admin.html');
    ?>
  <main class="main" >
    <main class="container">
        <div class="row">
            <?php
            
           
            $sql = "SELECT * FROM tbl_package";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">Product ID: <?php echo $row['p_id']; ?></p>
                            <p class="card-text">Price: <?php echo $row['price']; ?></p>
                            <p class="card-text">duration: <?php echo $row['duration']; ?></p>
                           
                            <form method="POST" action="viewaddedpackage.php">
                                <input type="hidden" name="ids" value="<?php echo $row['p_id']; ?>">
                                <input type="submit" name="id" value="Delete" class="btn btn-danger">
                                <button type="button" class="btn btn-danger" onclick="showUpdatePopup(<?php echo $row['p_id']; ?>, '<?php echo $row['name']; ?>', '<?php echo $row['price']; ?>', '<?php echo $row['duration']; ?>'  )">Edit</button>

                                
                            </form>

                            <div id="updatePopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closeUpdatePopup()">&times;</span>
        <h2>Update type</h2>
        <form method="POST" action="viewaddedpackage.php" enctype="multipart/form-data">
            <input type="hidden" name="p_id" id="updatetypeId">
            <label for="updateName"> Name:</label>
            <input type="text" id="updateName" name="name" required>
            <label for="updatePrice">Price:</label>
            <input type="number" id="updatePrice" name="price" required>

            <label for="updateduration">duration:</label>
            <input type="text" id="updateduration" name="duration" required>

<!--             <label for="updateProductImage">Product Image:</label>
            <input type="file" id="updateProductImage" name="product_image" accept="image/*"> -->
            
            <input type="submit" class="btn btn-danger" value="Update">
        </form>
    </div>
</div>




                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <script src="admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>



<script>
    function showUpdatePopup(t_Id, Name, Price, duration) {
        document.getElementById('updatetypeId').value = t_Id;
        document.getElementById('updateName').value = Name;
        document.getElementById('updatePrice').value = Price;
        document.getElementById('updateduration').value = duration;


        // Show the updatePopup
        document.getElementById('updatePopup').style.display = 'block';
    }

    function closeUpdatePopup() {
        // Close the updatePopup
        document.getElementById('updatePopup').style.display = 'none';
    }
</script>

  </body>
</html>
