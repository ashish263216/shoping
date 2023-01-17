<?php 
session_start();
$total=0;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Checkout</title>
     <link rel="stylesheet" href="assets/css/boots.css">
     <link rel="stylesheet" href="assets/css/custom.css">
     <script src="assets/js/boots.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
 </head>
 <body>
       <div class="container-fluid">

        <!--Nav start-->
            <?php include 'nav.php';?>
        <!--Nav end-->
                   <?php
                         if(empty($_SESSION['userid'])){
                             echo"<script>window.location='index.php'</script>";
                            exit();
                            }
                         ?>
        <div class="row">
            
         <!--orders summary-->
            <div class="col-sm-8 ">
                <div class="row"><h3>Orders Summary</h3></div>
                     <div class="row shadow container-fluid">
                            <table class="table">
                                  <tr>
                                     <th>Product image</th>
                                     <th>Product name</th>
                                     <th>Price</th>
                                     <th>Qty</th>
                                     <th>Amount</th>
                                     
                                  </tr>

                                  <?php 
                                  include '../admin/connection.php';
                                  if(isset($_SESSION['userid']))
                                  {
                                  	$sid=session_id();
                                  	$sql="Select products.product_name,products.image,products.selling_price,cart.qty from products inner join cart on products.id=cart.pid where session='".$sid."'";
                                  	$result=mysqli_query($conn,$sql);
                                  	while($row=mysqli_fetch_assoc($result)){

                                         $amount=$row['selling_price'] * $row['qty'];
                                         $total=$total + $amount;
                                         $cart=$row['qty'];

                             

                                      echo "<tr><td><img src='../admin/".$row['image']."' width='50' height='50' alt='no pic'/></td>";
                                       
                                       echo"<td>".$row['product_name']."</td>";
                                    echo"<td>&#8377;".$row['selling_price']." </td>";
                                    echo"<td>".$row['qty']."</td>";
                                   echo"<td>".$amount."</td>";
                                    echo"</tr>";
                                     


                                  	}


                                  }
                                   ?>

                                   
                        </table>

                        
                     <?php
                           if(empty($cart)){
                                echo"<h2 class='text-center'>No data available</h2>";
                                        die();
                             }
                        ?>
            
                   </div><br>
                      <div class="row container-fluid shadow">
                               <table>
                                    <tr>
                                       <td>Subtotal</td>
                                     <td>&#8377;<?php echo $total ?> </td>
                                   </tr>
                                    <tr>
                                       <td>Shiping charge</td>
                                       <td>&#8377;<?php echo $ship=0;?></td>
                                    </tr>
                                       <tr class="text-info">
                                       <td>Total Amount</td>
                                       <td><h4>&#8377;<?php echo $total + $ship;?> </b></h4>
                                     </tr>
             
                              </table>
                        </div>
                   </div>
              <!-- orders  summary end-->

                <!--Billing address start-->

                <?php 
                $sql1="select * from orders where userid='".$_SESSION['userid']."'";
                $result=mysqli_query($conn,$sql1);
                $row1=mysqli_fetch_assoc($result);
                ?>
            <div class="col-sm-4 ">
                <div class="row container-fluid"><h4>Billing Address:</h4></div>
                <div class="row container-fluid">
                    <form method="POST" action="" >
                         <div class="  col-sm-10 form-group mt-3 ">
                                  <label>Full Name</label>
                                  <input type="text" name="name"  class="form-control" placeholder="Enter your name" value="<?php echo $row1['name'];?>"required>
                        </div>
                        <div class=" col-sm-10 form-group mt-3 ">
                             <label>Address</label>
                             <input type="text" name="address"  class="form-control" placeholder="Enter your address" 
                             value="<?php echo $row1['address'];?>"required>
                        </div>
                       <div class="  col-sm-10 form-group mt-3 ">
                              <label>Pincode</label>
                              <input type="text" name="pincode" class="form-control"  placeholder="Enter your pincode" 
                              value="<?php echo $row1['pincode'];?>"required>
                       </div>
                       <div class="  col-sm-10 form-group mt-3 ">
                              <label>E-mail Id</label>
                              <input type="email" name="email" class="form-control" placeholder="Enter your email id"
                              value="<?php echo $row1['email'];?>"required>
                       </div>
                       <div class="  col-sm-10 form-group mt-3  ">
                              <label>Phone Number</label>
                               <input type="text" name="phone" class="form-control" placeholder="Enter your  phone number" value="<?php echo $row1['mobile_no'];?>"required  pattern="[6-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" minlength="10" maxlength="10">
                        </div>

                        <div class="  col-sm-10 form-group mt-3  ">
                              
                               <input type="hidden" name="totalamount" class="form-control"  value="<?php echo $total + $ship;?>">
                        </div>
                               <!--UPI-->
                                <div class="row mt-3 shadow">
                                    <div class="col-sm-6 "> <input type="radio" name="pay" value="UPI"> UPI</div>

                                   <div class="col-sm-6 "><input type="radio"name="pay" value="COD" checked > Cash on Delivery</div>

                                </div>
                                <!-- UPI-->


                                <!--Cash on delivery-->
                                      <!-- <div class="row mt-1 mb-2 shadow">
                                           <div class="col-sm-6 "><input type="radio"name="pay" value="COD" checked > Cash on Delivery</div>
                                       </div> -->
                                 <!--Cash on delivery-->
                                      

                        <div class="col-sm-10  text-center mt-4">
                            
                            <input type="submit" name="submit"  class="btn btn-danger  px-5" value="Place Order" >
                          
                        </div>
                   </form>
                 </div>
            
            <!-- Billing address end-->

             
                    
                       <!--UPI-->
                    <!-- <div class="row mt-3 shadow">
                        <div class="col-sm-6 py-2"> <input type="radio" name="pay" checked> UPI</div>
                    </div> -->
                     <!-- UPI-->
                        <!--Cash on delivery-->
                    <!-- <div class="row mt-4 mb-5 shadow">
                                  <div class="col-sm-6 "><input type="radio"name="pay"> Cash on Delivery</div>
                    </div> -->
                    <!--Cash on delivery-->
                      <!-- <div class="row my-3 ">
                       <div class="col-sm-6 "><input type="submit" name="submit" value="Continue to Payment" class="btn btn-danger px-5"> </div>
                      </div>
                   
               
                </div>
 -->


                                   

        <!--container end-->
    </div>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php
    include '../admin/connection.php';
	if(isset($_POST['submit']))
	{
		$sql="Insert into orders(name,address,pincode,email,mobile_no,userid,total_amount,payment_mode)values('".$_POST['name']."' , '".$_POST['address']."' , '".$_POST['pincode']."','".$_POST['email']."' ,'".$_POST['phone']."','".$_SESSION['userid']."','".$_POST['totalamount']."','".$_POST['pay']."')";
		$query=mysqli_query($conn,$sql);

        
        $sql3="select id from orders where userid='".$_SESSION['userid']."' ORDER BY id DESC LIMIT 1";
        $result3=mysqli_query($conn,$sql3);
        $row3=mysqli_fetch_assoc($result3);
         if(isset($_SESSION['userid']))
         {
            
            $sid=session_id();
            $sql2="select  products.id,cart.qty,products.selling_price,products.stock from products inner join cart on products.id=cart.pid where session='".$sid."'";
            $result1=mysqli_query($conn,$sql2);
           while($row2=mysqli_fetch_assoc($result1))
           {
              $qty=$row2['qty'];
              $id=$row2['id'];
              $stock=$row2['stock'];

            $sql3="Insert into order_items(order_id,userid,product_id,qty,price)values('".$row3['id']."','".$_SESSION['userid']."','".$row2['id']."','".$row2['qty']."','".$row2['selling_price']."')";
            mysqli_query($conn,$sql3);
           }
             $sql5="UPDATE products set stock = '$stock' - '$qty' where id='$id'";
             mysqli_query($conn,$sql5);

             

         }

    
        $sql1="delete from cart where session='".$sid."'";
        mysqli_query($conn,$sql1);
        
        echo"<script>alert('Order Placed Successfully')</script>";
        
        echo"<script>window.location='myorders.php'</script>";
	}


?>


<!-- <script>
    $(document).ready(function(){
        $("#flash-msg").delay(3000).fadeOut("slow");
    });
</script> -->