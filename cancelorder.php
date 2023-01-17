<?php
include '../admin/connection.php';
$id=$_GET['id'];
$oid=$_GET['oid'];

$sql="UPDATE order_items set order_status='cancelled' where id=$id";
mysqli_query($conn,$sql);

$sql1="UPDATE orders set order_status='cancelled' where id=$oid";
mysqli_query($conn,$sql1);

$sql4="SELECT  * from order_items where id=$id";
$result=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result);
$pid=$row4['product_id'];
$qty=$row4['qty'];

$sql5="UPDATE products set stock ='stock' + '$qty' where product_id=1";
mysqli_query($conn,$sql5);

echo"<script>alert('Order items Cancelled')</script>";
echo"<script>window.location='myorders.php'</script>";




?>