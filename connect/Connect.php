<?php
class Connect{

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
}
 
?>