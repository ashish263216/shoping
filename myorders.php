<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myorders</title>
    <link rel="icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/boots.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
      <?php include 'navbar.php'?>
      <?php
           if(empty($_SESSION['userid'])){
           echo"<script>window.location='index.php'</script>";
               exit();
              }
           ?>
    <div class="container-fluid">
        <h3>My Orders</h3>
    
     <div class="row shadow container-fluid">
            
            <table class="table table-striped">

                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product image</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>Order Status</th>
                    <th><th>
                </tr>
            </thead>
                <?php
              include '../admin/connection.php';
             if($_SESSION['userid']==true)
             {
                $sid=session_id();
               $sql5= "select order_items.order_id, products.product_name,products.image,order_items.price,order_items.qty,order_items.order_status,order_items.id from products inner join order_items on products.id=order_items.product_id where userid='".$_SESSION['userid']."' order by updated_at DESC";
                    $result=mysqli_query($conn,$sql5);
                

            while($row5=mysqli_fetch_assoc($result)) 
            {
            
                $status=$row5['order_status'];
                $c=$row5['order_id'];
                echo"<tr>";
                echo"<td>OD00".$row5['order_id']."</td>";
               echo "<td><img src='../admin/".$row5['image']."' width='100' height='100' alt='no pic'/></td>";
               echo "<td>".$row5['product_name']."</td>";
               echo "<td>&#8377; ".$row5['price']."</td>";
               echo "<td>".$row5['qty']."</td>";
               $total=$row5['qty'] * $row5['price'];
              echo"<td>".$total."</td>";
               
               echo "<td><p class=' fw-bolder'>".$row5['order_status']."</p></td>";
                  if($status=='cancelled'){
                    echo "'<td><a href='reorders.php?id=".$row5['id']."&oid=".$row5['order_id']."' class='btn btn-danger pt-2 px-5'>Re  Order</a></td>'";
                  }
                   elseif($status=='Delivered'){
                      echo "'<td class='fw-bolder text-success'>Hurry! Your product is Delivered.</td>'";
                  }

                   else{

                      echo "'<td><a href='cancelorder.php?id=".$row5['id']."&oid=".$row5['order_id']."' class='btn btn-info pt-2 px-4'>Cancel orders</a></td>'";
                 }
               
                echo "</tr>";

                
            }


        }
        
        
                ?>
            </table>

            <?php
                if(empty($c)){
                        echo"<h2 class='text-center'>No data available</h2>";
                        exit();
                    }
                ?>
        
        
    </div>
    
    
    </div>
</body>
</html>
<?php


?>
<?php include'footer.php'?>

