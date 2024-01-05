<main class="main" id="main">
<h1>Packages</h1>
    <div class="col-lg-12">
        <?php
        $sql = "SELECT  b.*, c.*, p.*,cust.*
                FROM packagebooking b
                JOIN tbl_car c ON b.car_id = c.car_id
                JOIN tbl_package p ON b.package_id = p.p_id
               
                JOIN tbl_customers cust ON b.cust_id = cust.c_id";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error" . mysqli_error($conn);
        } ?>

        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="card mx-2 my-2">
                <div class="row g-0">
                    <div class="col-md-4 mx-1">
                        <h5 class="font-weight-bold my-2 mx-1">Booked On: <span class="font-weight-normal"><?php echo $row['pkgbook_date'] ?></span></h5>
                        <h5 class="font-weight-bold my-2 mx-1">CustomerName: <span class="font-weight-normal"><?php echo $row['c_username'] ?></span></h5>
                        <h5 class="font-weight-bold my-2 mx-1">Booking ID: <span class="font-weight-normal"><?php echo $row['pkgbook_id'] ?></span></h5>
                    </div>
                    <div class="col-md-4 mx-1">
                        <h4 class="font-weight-bold text-center my-1">Booking Details</h4>
                        <h5 class="font-weight-bold">Car Type: <span class="font-weight-normal"><?php echo $row['type'] ?></span></h5>
                        <h5 class="font-weight-bold">Package: <span class="font-weight-normal"><?php echo $row['name'] ?></span></h5>
                    </div>
                    <div class="col-md-3 mx-1">
<?php
$bookingid=$row['pkgbook_id'];
$sql="select * from tbl_payment where booking_id='".$bookingid."'";
$payresult=mysqli_query($conn,$sql);
$count=mysqli_num_rows($payresult);
while($payrow=mysqli_fetch_array($payresult))
{
    $totalamunt= $payrow['totalamt'];
}?>




                       <h4 class="font-weight-bold text-center my-1">Payment</h4>
                        <h5 class="font-weight-bold">Total: <?php echo $totalamunt ?> </h5>
                        <h5 class="font-weight-bold">Advance: <?php $advamt = $totalamunt * 10 / 100; echo $advamt; ?></h5>
                        <h5 class="font-weight-bold">Balance amount: <?php $blnc = $totalamunt - $advamt; echo $blnc; ?></h5> 
                       

<?php
 if($count==2){
    echo '<h5><span class="badge badge-success" style="background-color: green; color: white;">Completed</span></h5>';
                           
 }
 else{ 
  echo '<h5><span class="badge badge-success" style="background-color: red; color: white;">Pending</span></h5>';
   ?>                        
    <!-- <form method="post" action="paymentpackage.php">
                            <input type="hidden" name="book_id" value="<?php echo $bookingid; ?>" />
                            <h5 class="font-weight-bold"> <?php $topay = $totalamunt - $advamt; $_SESSION['topay'] = $topay; ?></h5>
                          
                            <input type="submit" class="btn btn-outline-primary mb-2" name="payNow" value="proceed to pay <?php echo $topay; ?>" />
 </form> -->
 <?php }

?>


                       
                    </div>
                </div>
            </div>

        <?php
        } ?>
    </div>
</main>
