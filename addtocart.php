<?php 
include'../admin/connection.php';
session_start();
$sid=session_id();

$sql2="SELECT * FROM cart WHERE session='".$sid."' AND pid='".$_GET['pid']."'";
$result=mysqli_query($conn,$sql2);
$row=mysqli_fetch_assoc($result);

$qty=$row['qty'];
if($qty=="")
{
	$sql="INSERT  into cart(pid,session,qty) values('".$_GET['pid']."','".$sid."','1')";
	mysqli_query($conn,$sql);
}

 else{
 $qty++;
 $sql="UPDATE cart set qty='".$qty."' where pid='".$_GET['pid']."' AND session='".$sid."'";
 mysqli_query($conn,$sql);
 }
 
 

 echo "<script>window.location='cart.php'</script>";

