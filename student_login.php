<?php
require 'config.php';


if(!empty($_SESSION["r_id"])){
  header("Location:student_dashboard.php");
}
if(isset($_POST["submit"])){
  $r_id = $_POST["r_id"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM std_login WHERE r_id = '$r_id' OR password = 'password'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["r_id"] = $row["r_id"];
      header("Location:student_dashboard.php");
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

  <title>Student Login</title>
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
            <form action="" method="post">
               <div class="data">
                  <label for ="r_id">Registration ID</label>
                  <input type="text" required id="r_id" name="r_id">
               </div>
               <div class="data">
                  <label for ="password">Password</label>
                  <input type="password" required id="password" name="password" >
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




