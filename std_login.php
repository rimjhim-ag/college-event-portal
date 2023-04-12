<?php

$r_id =$_POST['r_id'];

$password =$_POST['password'];


$con = new mysqli("localhost","root","","event");
if($con->connect_error) {
    die("failed".$con->connect_error); 
}
else{
    $stmt = $con->prepare("select * from std_login where r_id =?");
    $stmt->bind_param("i", $r_id);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password']=== $password){
            echo " <h2> Login Successful </h2>";
        }
        else{
            echo "<h2> Invalid registration id or password </h2>";
        }
    }
    else{
        echo "<h2> Invalid registration id or password </h2>";
    }
}


?>