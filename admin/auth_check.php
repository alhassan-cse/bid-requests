<?php

include("Auth/Auth.php");
include("../config.php");


session_start();
$error='';
if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // username and password sent from form 
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']); 

    $sql = "SELECT * FROM users WHERE email = '$email' and passwrod = md5('$password')";
     
    $result = mysqli_query($db, $sql);      
    $row = mysqli_num_rows($result);
    $count = mysqli_num_rows($result);
    $user = mysqli_fetch_assoc($result);

    if($count == 1) {  
        $_SESSION['id']   = $user['id'];
        $_SESSION['name'] = $user['name']; 
        header("location: dashboard.php");
    } else {
        header("location: login.php");
        $error = "Your Email or Password is invalid";
        $_SESSION['error'] = $error;
    }
}

$new = new Auth;
$new->login();
?>