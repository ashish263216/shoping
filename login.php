<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="assets/css/boots.css">
<link rel="stylesheet" href="assets/css/custom.css">
<link rel='stylesheet' href="assets/css/loginstyle.css">
<script src="assets/js/boots.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
<body>

<div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/images/image1.jpg" alt="">
        <!-- <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div> -->
      </div>
      <div class="back">
        <img class="backImg" src="assets/images/image2.jpg" alt="">
        <!-- <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div> -->
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <!--login form-->
          <div class="login-form">
            <div class="title">Ecommerce</div>

          <form action=""  method="POST">

            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email or mobile number"  name="userid"  autofocus required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password"  name="password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="login" value="Login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
      <!--login form end-->

        <?php
        include '../admin/connection.php';
        if(isset($_POST['login']))
        {
        	session_start();
        	$sql=" select * from users where userid='".md5($_POST['userid'])."'  AND password='".md5($_POST['password'])."'";


        	$result=mysqli_query($conn,$sql);


        	if(mysqli_num_rows($result)>0)
        {

        $_SESSION['userid']=$_POST['userid'];
        setcookie('userid',$_SESSION['userid'],time() + (86400*30),"/");
       echo "<script>alert('Success Login')</script>";
        echo "<script>window.location='index.php'</script>";
         }else
         {
           echo "<script>alert('Invalid username or password')</script>";
         }

           }
           ?>
            


       <!--signup form-->
        <div class="signup-form">
          <div class="title">Signup</div>

        <form action="" method="POST">

            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email or mobile number" name="userid1"  required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password2" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="signup" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>






</body>

</html>


<?php

if(isset($_POST['signup']))
{
  
	$sql2="insert into users(userid,password,name)values('".md5($_POST['userid1'])."','".md5($_POST['password2'])."','".$_POST['username']."')";
	mysqli_query($conn,$sql2);
   
     


	echo "<script>alert('signup complete')</script>";

}



              
?>




<!-- pattern="^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#$%^&*_=+-]).{8,16}$" -->