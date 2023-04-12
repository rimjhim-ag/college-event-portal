<?php
require 'config.php';


if(!empty($_SESSION["email"])){
  header("Location:admin_dashboard.php");
}
if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM admin_login WHERE email = '$email' OR password = 'password'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["email"] = $row["email"];
      header("Location:admin_dashboard.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>





<!DOCTYPE html>
<html>
<head>

  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
</head>
<body>



	


      <div class="center">
         <input type="checkbox" id="show">
         <label for="show" class="show-btn">Click To Login </label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Login 
            </div>
            <form action="admin_login.php"  method="post">
               <div class="data">
                  <label for ="email">Email</label>
                  <input type="email" required  name="email" id="email">
               </div>
               <div class="data">
                  <label for ="password">Password</label>
                  <input type="password" required name="password" id="password">
               </div>
               <div class="forgot-pass">
                  <a href="#">Forgot Password?</a>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit"  name="submit">login</button>
               </div>
              
            </form>
         </div>
      </div>
   
</body>
</html>