<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='demo';
if(isset($_POST['add'])){
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error){
die("connection failed:".$conn->connect_error);

}
echo"connected successfully"."<br>";

$emp_name=$_POST['emp_name'];
$emp_address=$_POST['emp_address'];
$emp_salary=$_POST['emp_salary'];
$Sql="INSERT INTO emp200(emp_name,emp_address,emp_salary)VALUES('$emp_name','$emp_address','$emp_salary')";
if(mysqli_query($conn,$Sql)){
    echo"new reacord insert successfully";

}else{
    echo"error:".$Sql."<br>".mysqli_error($conn);
    mysqli_close($conn);
}

}
?>
<html>
    <head>
        <title>add new record record in mysqli</title>
</head>
<body>
    <form action="<?php echo($_SERVER["PHP_SELF"])?>" method="post">
    Employee Name:<input name="emp_name"type=text id="emp_name"><br><br>
    Employee address:<input name="emp_address"type=text id="emp_address"><br><br>
    Employee salary:<input name="emp_salary"type=text id="emp_salary"><br><br>
    <input name="add"type="submit" id="add" value="add employee">
</form>

</body>
</html>