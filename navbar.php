<?php
include '../admin/connection.php';
session_start();
$sid=session_id();
$sql7="SELECT  COUNT(qty) as qty from cart where session='".$sid."'";
$result7=mysqli_query($conn,$sql7);
$row=mysqli_fetch_assoc($result7);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Navbar</title>
      <link rel="stylesheet" href="assets/css/boots.css">
      <link rel="stylesheet" href="assets/css/custom.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
      <script src="assets/js/boots.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
  <body>
	          <!--navbar start-->
               <div class="container-fluid">
                    <div class="row" id="nav">
                      <nav class="navbar navbar-expand-lg navbar-light ">
          <!-- <div class="container-fluid"> -->
     
                        <a class="navbar-brand" href="index.php"><h4 class="glow">Ecommerce</h4></a>
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                         </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                 <ul class="navbar-nav">
                                      <li class="nav-item">
                                        <a class="nav-link active " aria-current="page" href="#">Home</a>
                                      </li>
      
                                       <li class="nav-item">
                                         <a class="nav-link " href="#">Contact Us</a>
                                       </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="">Products</a>
                                         </li>
                                           <li class="nav-item dropdown">
                                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Category
                                                </a>
                                           <ul class="dropdown-menu" aria-labelledby=" navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="subcategory.php?cat_id=1">Appliance</a></li>
                                             <li><a class="dropdown-item" href="subcategory.php?cat_id=2">Mens</a></li>
                                             <li><a class="dropdown-item" href="subcategory.php?cat_id=3">womens</a></li>
                                            </ul>
                                           </li>
                                          <ul class="navbar-nav">
          <li class="nav-item"style="width:400px; margin-left:40px;">
            <!-- <input type="search" class="src" name="search" placeholder="Search for products,brands and more..." > -->
                 <!-- Search form -->
           <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2" action="" method="POST">
            <i class="fas fa-search py-2" aria-hidden="true"></i>
            <input class="form-control form-control-sm  w-100 " type="text" placeholder="Search for products,brands and more..."
               aria-label="Search" name="search">

             </form>

            </li>
            
          </ul>

      <!-- </ul> -->
    <!-- </div> -->
      
    <ul class="navbar-nav mx-5 py-1">
      
        <?php 


            
           if(isset($_SESSION['userid']))

           {
            
            $sql="Select * from users where userid='".md5($_SESSION['userid'])."'";
            $result=mysqli_query($conn,$sql);
            $row1=mysqli_fetch_assoc($result);
             
            // echo "<li><a href='logout.php'>Logout</a></li>";
          //     echo'<div class="dropdown">
          //        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          //           '.$_SESSION['userid'].' 
          //         </button>
          //         <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          //                    <li><a class="dropdown-item" href="#">My Account</a></li>
          //                    <li><a class="dropdown-item" href="myorders.php">My Orders</a></li>
          //                    <li><a class="dropdown-item" href="logout.php"><img src="assets/images/logout.png" width="20" height="20">Logout</a></li>
          //        </ul>
          // </div>';

            echo ' <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             '.$row1['name'].'
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">My Account</a></li>
            <li><a class="dropdown-item" href="myorders.php">My Orders</a></li>
            <li><a class="dropdown-item" href="logout.php"><img src="assets/images/logout.png" width="20" height="20">Logout</a></li>
          </ul>
        </li>';

           }
           else{
            echo '<li class="nav-item"><a href="login.php" class="btn btn-dark py-1 px-5  ">Login</a></li>';
           }
           
         ?>

      <!-- </a></li> -->
      


      <li class="nav-item my-2 " style="margin-left: 100px;"><a href="cart.php "><lord-icon src="https://cdn.lordicon.com/slkvcfos.json" trigger="loop" delay="2000" style="width:40px;height:30px"></lord-icon></a>
        <a href="cart.php"><span class="badge bg-danger" style="position:absolute;">
         <?php echo $row['qty'];?></a>
      </span></li>

       </ul>
    </ul>
  </div>
  </nav>
	</div>
</div>



   <!--navbar end-->

 <script type="text/javascript">
   var i=0;
   var txt='Ecommerce';
   var speed=1000;

   function typewriter(){
   if (i < txt.length){
    document.getElementById('brand').innerHTML += txt.charAt(i);
    i++;
    setTimeout(typewriter,speed);
   }
   }
 </script>
   




</body>
</html>

<?php
if(isset($_POST['search'])){
    $search=$_POST['search'];
    echo"<script>alert('$search')</script>";
    
}

    ?>