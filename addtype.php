<?php
include_once'connection.php';error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    echo "inside POST";
    $name=$_POST['name'];
    $price=$_POST['price'];
    $duration=$_POST['duration'];
    $image = $_FILES['image']['name'];

    $allow = array("jpg","jpeg","gif","png");
$todir = 'image/';      
  if ( !!$_FILES['image']['name'] ) // is the file uploaded yet?
  {
    echo "inside image 1";
        $info = explode('.', strtolower( $_FILES['image']['name']) ); // whats the extension of the file

        if ( in_array( end($info), $allow) ) // is this file allowed
        {
            echo "inside image 2";
            if ( move_uploaded_file( $_FILES['image']['tmp_name'], $todir . basename($_FILES['image']['name'] ) ) )
            {
                echo "inside image 3";
                echo " the file has been moved correctly";
                $dst_db="image/".$image;
            }

        }
        else
        {
            $imageErr= " error this file ext is not allowed";
            $flag=0;
        }
    }
    if($flag==0)
    {
      
 $sql = "insert into tbl_type(name,image,price,duration) values('$name','$image','$price','$duration')";
 $result=mysqli_query($conn,$sql);
    }
    else{
     echo "post failed";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>Document</title>
</head>
<body>
<?php
    include('admin.html');
    ?>
  <main class="main" style="background-image:url('img/car-wash-detailing-station.jpg');">
    <div class="container" style="background-color: wheat;border-style:solid;" >
    <div class="align-items-center">
        <div class="form-wrapper">
        <h2>New Type</h2>
        <form action="addtype.php" method="post" enctype="multipart/form-data"style="width:500px;height:300px; padding:50px;">
        <label for="name">Select an image:</label>
        <input type="file" name="image"><br>
            <label for="name">type name</label>
            <input type="text" name="name"class="form-input" placeholder="" required>
           <br>
           
         
           
           <label for="price"> price</label>
            <input type="text" name="price"class="form-input" placeholder="" required>
           <br>
           <label for="duration">duration</label>
            <input type="text" name="duration"class="form-input" placeholder="" required>
           <br>
          
        
            <input type="submit" value="add type" name="add_type" class="submit-button">
        </form>
    </div>
    </div>
    </div>
  </main>
</body>
</html>