<?php
include '../admin/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en"  dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title>Subcategories</title>
<link rel="stylesheet" href="assets/css/boots.css">
<link rel="stylesheet" href="assets/css/custom.css">
<script src="assets/js/boots.js"></script>
<script src="https://kit.fontawesome.com/4f988cc8d0.js" crossorigin="anonymous"></script> <!--fontowsome-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
<body>
	<!--navbar-->
     <?php include 'navbar.php';?>
     <!--navbar end--->
      
      <!--subcategory-->
      <div class="row">
      	<div class="col-sm-12">
      <a href="index.php" class="mx-3">Go to Categories</a> 
       <h3 class="text-center">Subcategories</h3><hr>
   </div>
</div>
         <div class="row row-cols-1 row-cols-md-3 g-4" style="overflow: auto;">
          <?php 
          $sql2 = "SELECT * FROM sub_categories where cat_id='".$_GET['cat_id']."'";
          $result = mysqli_query($conn,$sql2);
          while($row=mysqli_fetch_assoc($result))
          {
          	?>

         	<div class="col">
                <div class="card h-50 ">
                <a href="products.php?cat_id=<?php echo $row['cat_id'];?>& sub_id=<?php echo $row['id'];?> ">
                 <img src="../admin/<?php echo $row['image'];?> " class='card-img-top shadow' alt='no pic' width='100' height='200'  /></a>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['sub_name'];?></h5>
                  </div>
                </div>
              </div>
     <?php 
        }
       ?>
  </div>
      <!--subcategory end-->




     <!--footer-->
     <?php include 'footer.php';?>
     <!--footer end-->



</body>
</html>