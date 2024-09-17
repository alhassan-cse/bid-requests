<?php

class Authentication{
  

    public $conn;

    function __construct(){

        $db_server = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_database = 'bid_request_db'; 
        $this->conn = mysqli_connect($db_server, $db_username, $db_password, $db_database);

        // $con = mysqli_connect($host, $user, $password, $db_name);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }
        else{
            // print_r('connect');die;
        }
    }

    public function login($data, $user_type)
    {
        $email = $data['email'];
        $password = $data['password'];
        $sql = "SELECT * FROM users WHERE email = '$email' and password = md5('$password')";
    
        $result = mysqli_query($this->conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        $count = mysqli_num_rows($result); 
        if($count == 1) {
            
            $_SESSION['id']   = $user['id'];
            $_SESSION['name'] = $user['name']; 
            if($user_type == 2){
                header("location: index.php");
            }
            else{
                header("location: dashboard.php");
            }

            // header("location: dashboard.php");
        } else {
            return $message = ['class'=>'danger','message'=>'Your Email or Password is invalid'];
        }
    }

    public function logout($user_type){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        if($user_type == 2){
            header("location: singin.php");
        }
        else{
            header("location: login.php");
        }
        
    }
}

?>