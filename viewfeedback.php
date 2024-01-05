<?php
// Start the session
session_start();
?>
<?php include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ids'])) {
        $id = $_POST['ids'];
        $sql = "DELETE FROM tbl_feedback WHERE fb_id = $id";
        if (mysqli_query($conn, $sql)) {
            // Feedback deleted successfully
        } else {
            echo "Error deleting feedback: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar Menu for Admin Dashboard | CodingNepal</title>
    <link rel="stylesheet" href="css/admin.css" />
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
        background-color: #3d7fe1; /* Adjust the alpha value (0.5 for 50% transparency) */
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
                $sql = "SELECT fb.fb_id, c.c_username, c.email, fb.subject, fb.message 
                        FROM tbl_feedback fb
                        JOIN tbl_customers c ON fb.c_id = c.c_id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['fb_id']; ?></h5>
                                <p class="card-text">Name: <?php echo $row['c_username']; ?></p>
                                <p class="card-text">Email: <?php echo $row['email']; ?></p>
                                <p class="card-text">subject: <?php echo $row['subject']; ?></p>
                                <p class="card-text">message: <?php echo $row['message']; ?></p>
                                <form method="POST" action="">
                                    <input type="hidden" name="ids" value="<?php echo $row['fb_id']; ?>">
                                    <input type="submit" name="id" value="Delete" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </main>

    <script src="admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
