<?php
// Start the session
session_start();
?>
<?php include('connection.php'); 

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    echo "inside isset";
    $id=$_POST['ids'];
    echo $id;
    $sql="DELETE FROM tbl_booking WHERE b_id='".$id."'";
    $result=mysqli_query($conn,$sql);
}
else{

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
.row 
{
    margin-top: 200%;
}
.auto-height {
    height: auto;
}



    </style>
  </head>
  <div class="control-group">
                               
  <body>
   <?php
    include('admin.html');
    ?>
  <main class="main auto-height" >
  <div class="control-group">
                                <?php echo ""?>
                                    <input type="date" id="bookingdate" name="bookingdate" class="form-control" placeholder="date" required="required" />
                                </div>
    <main class="container">
        <div class="row">
            <?php
            
           
            $sql = "SELECT b.*,c.* FROM tbl_booking b join tbl_customers  c on b.c_id=c.c_id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"  src="jquery.main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#bookingdate").change(function(){
            var dateid = $(this).val();
    
            $.ajax({
                url: "datefilter.php",
                method: "POST",
                data: {dateID: dateid },
                success: function(data){
                    $("#order").html(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
  </body>
</html>



















