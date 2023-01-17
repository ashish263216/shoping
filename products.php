<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>
<link rel="stylesheet" href="assets/css/boots.css">
<link rel="stylesheet" href="assets/css/custom.css">
<script src="assets/js/boots.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
<body>





<?php 
 include 'navbar.php';
 include '../admin/connection.php';
 $sql="SELECT * FROM products where cat_id='".$_GET['cat_id']."' AND sub_id='".$_GET['sub_id']."'";
 $result=mysqli_query($conn,$sql);

?>


    <!--products strat-->
        
        <h2 class="text-center">Our Products</h2>
        <div class="row container-fluid ">
            <?php
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
        
            <div class="col-sm-3 my-3 box">

            <div class="card h-100  shadow">
                  <img src="../admin/<?php echo $row['image'];?> " class="card-img-top " alt="No image" width='100' height='210'>
                  <div class="card-body">
                    <div class="row">
                          <p style="font-size:25px;font-weight: 900;"><?php echo $row['product_name'];?></p>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                          <p><strike><?php echo $row['mrp'];?></strike> <?php echo $row['selling_price'];?>
                            INR</p><span class="text-info">50% Off</span>
                        </div>
                    </div>

                    <?php
                    if($row['stock']< 1){

                      echo"<span class='text-danger'><h1>Out Of Stock</h1> </span>";

                         }else{
                             echo"<span class='text-success'>In Stock </span>".$row['stock']."";
                         

                      


                           echo "<span>
                            <input type='number' name='qty' min='1' max='10' value='1' class='text-center mx-5' disabled>
                            </span>
                    
                               

                  </div>
                  <div class='card-footer'>
                    <a href='addtocart.php?pid=".$row['id']."' class='btn btn-success mx-2'>Add to Cart</a> 
                    <span><a href='' class='btn btn-danger mx-3 px-3'>Buy Now</a></span>";

                  }
                ?>
               

                  </div>


              
                </div>
            </div>
               <?php
                   }
                ?>
           

        </div>
        <!--products end-->

         <hr>
        <!--footer-->
         <?php include 'footer.php';?>
        <!--footer end-->
</body>
</html>
    