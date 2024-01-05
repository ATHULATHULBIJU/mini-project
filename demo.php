<main class="main" id="main">
 
    
    
    <form action="alltypebooking.php" method='POST'><label for="datepicker">Select a Date:</label>
    <input type="date" id="datepicker" name="datepicker">
        <button type="submit" >submit</button>

</form>
    <h1>Washtype</h1>


    <div class="col-lg-12">
        

            <?php
           
            /* $sql = "SELECT
b.*,
c.*,
t.*,
car.*,
slot.*,
py.*,
sb.book_id
FROM
booking b
JOIN tbl_customers c ON b.cust_id = c.c_id
JOIN tbl_car car ON b.car_id = car.car_id
JOIN slot_booking sb ON sb.book_id = b.book_id
JOIN tbl_slots slot ON slot.slot_id = sb.slot_id
JOIN tbl_type t ON b.wash_id = t.t_id
JOIN tbl_spayment py ON b.book_id = py.booking_id
WHERE
b.cust_id = '" . $custid . "'";
 */ if($date!=""){
            $sql = "select b.*,t.*,c.*,sb.*,s.*,cust.*  from booking b join tbl_type t on b.wash_id= t.t_id 
                                         join  tbl_car c on b.car_id = c.car_id
                                         join slot_booking sb on b.book_id =sb.book_id
                                         join tbl_slots s on sb.slot_id = s.slot_id  
                                         
join tbl_customers cust on b.cust_id=cust.c_id where b.bookdate='".$date."'";
 }else{
    $sql = "select b.*,t.*,c.*,sb.*,s.*,cust.*  from booking b join tbl_type t on b.wash_id= t.t_id 
    join  tbl_car c on b.car_id = c.car_id
    join slot_booking sb on b.book_id =sb.book_id
    join tbl_slots s on sb.slot_id = s.slot_id  
    
join tbl_customers cust on b.cust_id=cust.c_id";
 }
            //$sql="select * from booking where cust_id='".$custid."'";
            $result = mysqli_query($conn, $sql); ?>
 <h4 class="font-weight-bold text-center my-1">Booking Details</h4>
            <?php
            $id = 0;
            while ($row = mysqli_fetch_array($result)) {
                if ($id != $row['book_id']) { ?>
                    <div class="card mx-2 my-2">
                        <div class="row g-0">




                            <div class="col-md-2 mx-1">
                                
                                    <h5 class="font-weight-bold my-2 mx-1">Start Time: <span class="font-weight-normal"><?php echo $row['start'] ?></span></h5>
                                    
                                    <h5 class="font-weight-bold my-2 mx-1">Booked On: <span class="font-weight-normal"><?php echo $row['bookdate'] ?></span></h5>
                                    
                                    <h5 class="font-weight-bold my-2 mx-1">Duration: <span class="font-weight-normal"><?php echo $row['duration'] ?></span></h5>
                                    <h5 class="font-weight-bold my-2 mx-1">CustomerName: <span class="font-weight-normal"><?php echo $row['c_username'] ?></span></h5>
                                    <h5 class="font-weight-bold my-2 mx-1">Booking ID: <span class="font-weight-normal"><?php echo $row['book_id'] ?></span></h5>
                                    
                            </div>
                            <hr>
                            <div class="col-md-4 mx-1">
                               
                                <h5 class="font-weight-bold">Wash Type: <span class="font-weight-normal"><?php echo $row['name'] ?></span></h5>
                                <h5 class="font-weight-bold">Car Type: <span class="font-weight-normal"><?php echo $row['type'] ?></span></h5>
                            </div>
                            <hr>
                            <div class="col-md-4 mx-1">
                                <h4 class="font-weight-bold text-center my-1">Payment</h4>
                                <h5 class="font-weight-bold">Total:<?php echo $row['totalamount']; ?> </h5>
                                <h5 class="font-weight-bold">Advance: <?php $advamt = $row['totalamount'] * 10 / 100;
                                                                        echo $advamt; ?></h5>
                                <h5 class="font-weight-bold">Balance <?php $topay = $row['totalamount'] - $advamt;
                                                                        echo $topay; ?></h5>
                                <form method="post" action="paymentservice.php">
                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>" />
                                   





                                    <?php 
                                $sqlc="select * from tbl_spayment where booking_id='".$row['book_id']."'";
                                $rsltc=mysqli_query($conn,$sqlc);
                                $paidamount=0;
                                while($row1=mysqli_fetch_array($rsltc)){
                                    $paidamount=$paidamount+$row1['amount'];
                                 //   echo "paid amount".$paidamount;
                                    $totamt=$row['totalamount'];
                                }
                                ?> <h5 class="font-weight-bold"> <?php $topay = $totamt - $advamt;
                                  
                                $_SESSION['topay'] = $topay; ?></h5><?php
                                if($totamt>$paidamount){?>
                              <h3>pending Payment</h3> <?php }
                                    else{
                                        echo '<h5><span class="badge badge-success" style="background-color: green; color: white;">Completed</span></h5>';
                                    }?>  











                                </div>

                                </form>

                            </div>
                        </div>
                    </div>


            <?php } else {
                    $id = $row['book_id'];
                }
            }

            ?>
       
    </div>
        </main>