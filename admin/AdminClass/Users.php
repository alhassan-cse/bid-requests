<?php
// require 'config.php'; 
 
Class Users{
  
    public $conn;

    function __construct(){

        define('DB_SERVER22', 'localhost');
        define('DB_USERNAME22', 'root');
        define('DB_PASSWORD22', '');
        define('DB_DATABASE22', 'bid_request_db');
        $this->conn = mysqli_connect(DB_SERVER22,DB_USERNAME22,DB_PASSWORD22,DB_DATABASE22);

        // $con = mysqli_connect($host, $user, $password, $db_name);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }
        else{
            // print_r('connect');die;
        } 
    }

     

    public function index()
    { 
        $sql = "SELECT * FROM users ORDER BY id DESC";
 
        $result = mysqli_query($this->conn, $sql);
        
        if($result){
           
            return $result;
        }
        else{
             
        } 
         
    }

}

?>