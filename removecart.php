<?php
include '../admin/connection.php';
$id=$_GET['id'];
$sql="delete from cart where id=$id";
mysqli_query($conn,$sql);
echo"<script>alert('Remove Successfuly')</script>";
echo"<script>window.location='cart.php'</script>";




?>