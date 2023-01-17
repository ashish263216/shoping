<?php
include '../admin/connection.php';
session_start();
$sid=session_id();
$total=0;
$sql5="select * from cart where session='".$sid."'";
$result=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==0)
{
  echo "<script>window.location='emptycart.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cart</title>
     <link rel="stylesheet" href="assets/css/boots.css">
     <link rel="stylesheet" href="assets/css/custom.css">
     <script src="assets/js/boots.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
 </head>
<body>
      <div class="container-fluid">

          <!--navbar-->
              <?php include 'nav.php';?>
          <!--navbar end-->

            
        <div class="row  container-fluid mt-3">
         <h4> My Cart </h4> 

            
         
            <!--left side-->
            <?php

             $sql8 = "select products.product_name,products.image,products.stock, products.selling_price,cart.qty,cart.id  from products inner join cart on products.id=cart.pid where session='".$sid."'";
            $result=mysqli_query($conn,$sql8);
            while($row8=mysqli_fetch_assoc($result))
            {
                
            ?>
            <div class="col-sm-6 my-2 mx-2 bg-info shadow float-start ">
                

                <!--products start-->
                <div class="row">

                    <!--image-->
                    <div class="col-sm-4 ">
                        <div class="row my-4">
                        
                        <?php echo"<img src='../admin/".$row8['image']."' width='100' height='200'/>" ?>
                         </div>
                    </div>
                <!--image end-->

                <!--product desc-->
                <div class="col-sm-6">
                    <!--product name & qty-->
                    <div class="row mb-5 mt-5">
                        <div class="col-sm-6"><h5><?php echo $row8['product_name'];?></h5></div>
                         <div class="col-sm-6 ">
                        
                         <!-- <div class="container mt-3   "> -->
                         <form action="" method="POST">
                            
                            <div class="input-group mb-1 mt-1 " style="width:110px">
                                
                                  <button class="input-group-text decrement-btn btn-danger" onclick="decrementValue(<?php echo $row8['id'];?> )">-</button>
                                  
                                  <input type="text" class="form-control text-center bg-white input-qty " name='quantity' value="<?php echo $row8['qty'];?>" id="number-<?php echo $row8['id'];?>" disabled>
                                  
                                  
                                      <input type="hidden" name="hidden1" id="demo-<?php echo $row8['id'];?>" 
                                      >

                                      <input type="hidden" name="hidden2" id="demo1-<?php echo $row8['id'];?>" >
                                  
                                  <button class="input-group-text increment-btn btn-danger" onclick="incrementValue(<?php echo $row8['id'];?> )">+</button>
                                  
                               
                            </div>
                         

                            
                              </form>


                         <!-- </div> -->

                         </div>
                    </div>
                    <!--product name & qty end-->
                    <div class="row mt-5 pt-4">
                        <!--remove and mrp-->
                        <div class="col-sm-6"><a href="removecart.php?id=<?php echo $row8['id'];?>" class="text-decoration-none text-danger fw-bold ">Remove  </a></div>
                        <div class="col-sm-6 "><h3>&#8377;<?php echo $row8['selling_price'] * $row8['qty'];?> </h3>
                           
                           <?php
                           
                           $pro=$row8['selling_price'] * $row8['qty'];
                           $total= $total + $pro;
                           ?>
                        </div>
                        
                    </div>
                    <!--remove & mrp end-->

                </div>
                <!--product  desc end-->
                </div>
                
            </div>
            <!--products end-->
              
            <!--left side end-->
            





          
           <?php
              }
              ?>
                
            


            <!--right side-->
            <div class="col-sm-4 bg-warning shadow float-end position-fixed end-0 mx-4  ">
                <div class="row ">
                   <h5> PRICE DETAILS</h5>
                   <?php 
                   $sql="select count(qty)  from cart where session='".$sid."'";
                   $result=mysqli_query($conn,$sql);
                   $row=mysqli_fetch_assoc($result);
                   ?>
                   <p class="text-white">Cart (<?php echo $row['count(qty)'];?> items)</p>
                </div>
                <hr>
                <div class="row mx-5">
                     <?php
                    
                     $result=mysqli_query($conn,$sql5);
                     $row=mysqli_fetch_assoc($result);
                     
                     ?>
                    <table>
                        <tr>
                            <td>Product Amount-</td>
                            <td>&#8377 <?php echo $total;?>
                            </td>
                        </tr>
                        <tr>
                            <td>Shiping Charge-</td>
                            <td>&#8377;<?php echo $ship=0;?></td>

                        </tr>
                        
                        <tr>
                            <td>Total Payable amount-</td>
                            <td><h2>&#8377;<?php echo $total + $ship;?></h2></td>
                        </tr>
                   </table>
                  
                </div>
                <div class="col-sm-12 text-center mt-3">

                     <?php
                     
                     if(isset($_SESSION['userid']))
                     {
                    


                        echo "<a href='checkout.php' class='btn btn-outline-danger my-5 mx-3 shadow'>Proceed to Checkout</a>";
                    }
                    
                     
                     else{
                          echo '<a href="login.php" class="btn btn-outline-danger my-5 mx-3 shadow">Proceed to Checkout</a>';
                     }
                     ?>
                     
                    
                     <span><a href="index.php" class="btn btn-outline-info my-5 mx-3 shadow">Continue Shoping</a></span>


               
                </div>
                
                
            </div>
            <!--right side end-->





        </div>
    </div>

 <!--footer-->


 <!--footer end-->




</div>

<script>
    function incrementValue(id)
    {
        var value=parseInt(document.getElementById('number-'+id).value,10);
        value=isNaN(value)?1:value;
        if(value<10){
            value++;
           document.getElementById('number-'+id).value=value;
            var a = value;
            var x = id;
            document.getElementById('demo-'+id).value=a;
            document.getElementById('demo1-'+id).value=x;
            
        }
    }



    function decrementValue(id)
    {
        var value=parseInt(document.getElementById('number-'+id).value,10);
        value=isNaN(value)?1:value;
        if(value>1){
            value--;
            document.getElementById('number-'+id).value=value;
            var b = value;
            var y = id;
            document.getElementById('demo-'+id).value=b;
            document.getElementById('demo1-'+id).value=y;
              
        }

    }


</script>

          


</body>
</html>
          
         <?php
         include '../admin/connection.php';
        
         if(isset($_POST['hidden1']) && isset($_POST['hidden2'])){
            $qty=$_POST['hidden1'];
            $id=$_POST['hidden2'];
            // echo"<script>alert('".$qty."')</script>";
            $sql7="UPDATE cart set qty ='$qty' where id='$id'";
            mysqli_query($conn,$sql7);
            echo"<script>window.location='cart.php'</script>";

         }




          ?>