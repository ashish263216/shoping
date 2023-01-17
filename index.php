<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en"  dir="ltr">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width , initial-scale=1.0">
     <title>Home</title>
     <link rel="stylesheet" href="assets/css/boots.css">
     <link rel="stylesheet" href="assets/css/custom.css">
     <script src="assets/js/boots.js"></script>
      <script src="https://kit.fontawesome.com/4f988cc8d0.js" crossorigin="anonymous"></script> <!--fontowsome-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
       <style>
            .whatsapp_float{
                             position: fixed;
                             bottom:40px;
                             right:5px;
              
                             }
            .whatsapp_float_btn{
                                 float: right;
            
                                }
       </style>
</head> 
<body>
      <div class="container-fluid">
             <!--header-->
                 <?php include'header.php';?>

               <!--header end-->

	            <!--navbar-->
                <?php include'navbar.php';?>
             <!--navbar end-->

              <!--slider-->
                 <?php include'slider.php';?>
               <!--slider end-->
                   <hr>
               <!--category-->
     
                 <div class="row d-flex flex-row flex-nowrap" style="overflow:auto; white-space:nowrap;">
                    <?php
                          include '../admin/connection.php';
                           $sql="select * from categories where status=1";
                           $result=mysqli_query($conn,$sql);

                        while($row=mysqli_fetch_assoc($result))
                         {
                       ?>
                      <div class="col">
                         <div class="card h-50 shadow  box">
                             <a href="subcategory.php?cat_id=<?php echo $row['id'];?>" class="text-decoration-none">
                               <img src="../admin/<?php echo $row['image']; ?>" width="100%" height="150" alt="pic loading.." class="card-img-top shadow"><br><h5 class="text-center  mx-5"><?php echo htmlspecialchars($row['cat_name']); ?></h5>
                              </a>
                         </div>
                     </div>
    
                  <?php
                        }
                     ?>
                </div>
              <hr>
            <!--category end-->
        
              <!--Banner-->
                    <?php include 'banner.php';?>
               <!--banner end-->


                 <!--New Arrivals-->

                     <div class="row">
                         <div class="col-sm-12">
                              <hr>
                            <h1 class="text-center p-3 glow">New Arrivals</h1><hr>
                        </div>
                    </div>
                         <div class="row row-cols-1 row-cols-md-3 g-4 bg-warning">
                          <?php 
                               $sql2="select * from sub_categories ";
                                $result=mysqli_query($conn,$sql2);
                                   while($row=mysqli_fetch_assoc($result))
                                  {


                                     ?>
            

                          <div class="col">
                              <div class="card h-50">
                                   <a href="products.php?cat_id=<?php echo $row['cat_id'];?>&sub_id=<?php echo $row['id']  ;?>">
                                   <img src="../admin/<?php echo $row['image'];?>" class='card-img-top shadow' alt='no pic' width='150' height='400'  /></a>
                             <div class="card-body">
                                     <h5 class="card-title"><?php echo $row['sub_name'];?></h5>
                        </div>
                    </div>
                </div>
                       
                  <?php
                         }
                      ?> 
              
        </div>
      <!-- New Arrivals end-->

         <!--coming soon-->
                      <div class="row">
                             <div class="col-sm-12">
                                 <hr>
                                  <h1 class="text-center p-3 glow">Coming Soon..</h1><hr>
                                   <div class="row row-cols-1 row-cols-md-2 g-4">
                                        <div class="col">
                                            <div class="card">
                                                 <img src="assets/images/banner4.jpg" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                          <h5 class="card-title">Card title</h5>
                                                      </div>
                                                  </div>
                                             </div>

                      <div class="col">
                             <div class="card">
                                  <img src="assets/images/banner3.jpg" class="card-img-top" alt="...">
                                     <div class="card-body">
                                             <h5 class="card-title">Card title</h5>
                                       </div>
                                  </div>
                              </div>
                       <div class="col">
                              <div class="card">
                                   <img src="assets/images/banner2.jpg" class="card-img-top" alt="...">
                                       <div class="card-body">
                                           <h5 class="card-title">Card title</h5>
                                        </div>
                                  </div>
                            </div>
                       <div class="col">
                            <div class="card">
                                 <img src="assets/images/banner4.jpg" class="card-img-top" alt="...">
                                       <div class="card-body">
                                             <h5 class="card-title">Card title</h5>
                                            
                                       </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                     </div>
          <!--coming soon end-->
                 <hr>
              <!--Footer-->
                <?php include_once('footer.php'); ?>
              <!--Footer end-->


              <div class="whatsapp_float">
                    <a href="//wa.me/918292116187" target="_blank"><img src="assets/images/whatsapp.jpg" width='80px' height='70px'  class="whatsapp_float_btn"></a>
              </div>
         </div>
</body>
</html>


