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

            
           <div class="row mt-3">
                  <h4> My Cart </h4> 
              </div>
              <div class="row bg-warning shadow py-5 mx-5">
                     <h3 class="text-center">Your Cart Is Empty</h3><hr>
                <div class="col-sm-12 text-center">
                     <span><a href="index.php" class="btn btn-outline-dark my-5 shadow px-5">Continue Shoping</a></span>
                </div>
                
                </div>
            
            <br>
              
             <!--footer-->

                 <?php include_once 'footer.php' ?>

              <!--footer end-->
          </div>
    </body>
 </html>

       