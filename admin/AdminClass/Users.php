<?php
// require 'config.php'; 
 
Class Users{
  
    public $conn;
    
    function __construct(){

        $db_server = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_database = 'bid_request_db'; 
        $this->conn = mysqli_connect($db_server, $db_username, $db_password, $db_database);
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