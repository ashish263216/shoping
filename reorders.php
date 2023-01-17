<?php
include '../admin/connection.php';
$id=$_GET['id'];
$oid=$_GET['oid'];
$sql="UPDATE order_items set order_status='Pending' where id=$id";
mysqli_query($conn,$sql);
$sq2="UPDATE orders set order_status='Pending' where id=$oid";
mysqli_query($conn,$sq2);
echo"<script>alert('Re Order Placed Successfully')</script>";
echo"<script>window.location='myorders.php'</script>";




?>