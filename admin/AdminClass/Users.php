<?php
// require 'config.php'; 
 
Class Users extends Connect{
  
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