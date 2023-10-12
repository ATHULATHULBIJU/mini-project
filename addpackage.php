<?php
include_once'connection.php';
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    echo "inside POST";
    $name=$_POST['name'];
    $price=$_POST['price'];
    $duration=$_POST['duration'];


    $sql = "insert into tbl_package(name,price,duration) values('$name','$price','$duration')";
    $result=mysqli_query($conn,$sql);
    $packageid=mysqli_insert_id($conn);

    if(isset($_POST['chktype']))
    {
        echo"inside";
        foreach($_POST['chktype'] as $chktypes){
            $sql="insert into packagetypes(package_id,type_id) values('$packageid','$chktypes')";
            $result=mysqli_query($conn,$sql);          
        }
    }

}
else{
    echo "post failed";
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
        <h2>New Package</h2>
        <form action="addpackage.php" method="post" enctype="multipart/form-data"style="width:500px;height:300px; padding:50px;">
       
            <label for="name">Package Name</label>
            <input type="text" name="name"class="form-input" placeholder="" required>
           <br>
           <label for="duration">duration</label>
            <input type="text" name="duration"class="form-input" placeholder="" required>
           <br>
         
           
           <label for="price"> price</label>
            <input type="text" name="price"class="form-input" placeholder="" required>
           <br>
           <?php
           $sql="select * from tbl_type" ;
           $result=mysqli_query($conn,$sql);
           while($row =mysqli_fetch_array($result)){
            ?>
                <input type="checkbox" name="chktype[]"  value="<?php echo $row['t_id'];?>"><?php echo $row['name'];?></br>

            <?php
           }
           ?>
         
           <!-- include check box -->
           <br>
        
            <input type="submit" value="add package" name="add_package" class="submit-button">
        </form>
    </div>
    </div>
    </div>
</main>
</body>
</html>