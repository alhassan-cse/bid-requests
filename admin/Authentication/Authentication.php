<?php
Class Config{

    public $conn;

    function __construct(){

        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_DATABASE', 'bid_request_db');
        $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

        // $con = mysqli_connect($host, $user, $password, $db_name);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }
        else{
            // print_r('connect');die;
        }

    }
}

Class Authentication extends Config{
  
    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $sql = "SELECT * FROM users WHERE email = '$email' and passwrod = md5('$password')";
    
        $result = mysqli_query($this->conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        $count = mysqli_num_rows($result); 
        if($count == 1) {
            
            $_SESSION['id']   = $user['id'];
            $_SESSION['name'] = $user['name']; 
            header("location: dashboard.php");
        } else {
            return $message = ['class'=>'danger','message'=>'Your Email or Password is invalid'];
        }
    }

    public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header("location: login.php");
        // return $message = ['class'=>'success','message'=>'Logout successfully'];
 
    }
}

?>