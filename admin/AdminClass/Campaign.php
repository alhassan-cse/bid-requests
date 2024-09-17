<?php
// require 'config.php'; 
 
Class Campaign{
  
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

    public function insert($data)
    {  
        $campaign_name = $data['campaign_name'];
        $advertiser = $data['advertiser'];
        $company_url = $data['company_url'];
        $portal_name = $data['portal_name'];
        $dimension = $data['dimension'];
        $attribute = $data['attribute'];
        $price = $data['price'];
        $image_url = $data['image_url'];
        $from_hour = $data['from_hour'];
        $to_hour = $data['to_hour'];
        $hs_os =  $data['hs_os'];
        $bidtype = $data['bidtype'];
        $country = 'Bangladesh'; 
        $operator = $data['operator'];
        $device_make = $data['device_make'];
        $code  = rand(100, 990);
        $billing_id  = rand(100, 990);
        $appid = rand(100, 990);
        $creative_id = rand(100, 990); 

        $expire_date = $data['expire_date'];
        $date = str_replace('/', '-', $expire_date);
        $str_date = date('Y-m-d', strtotime($date));
        $expire_date = strtotime($str_date);
        
        $sql = "INSERT  INTO `campaigns` 
        (`campaign_name`, `advertiser`, `code`, `appid`, `tld`, `billing_id`, `portal_name`, `dimension`, `creative_id`, `attribute`, `price`, `bidtype`, `image_url`, `from_hour`, `to_hour`, `hs_os`, `operator`, `device_make`, `country`, `expire_date`) VALUES ('$campaign_name', '$advertiser', $code, $appid, '$company_url','$billing_id', '$portal_name', '$dimension', '$creative_id', '$attribute','$price', '$bidtype', '$image_url', '$from_hour', '$to_hour', '$hs_os', '$operator', '$device_make','$country','$expire_date')";
    
        $result = mysqli_query($this->conn, $sql);
        if($result){
            header("location: campaigns.php");
        }
        else{
            return $message = ['class'=>'danger','message'=>'Something went wrong'];
        } 
    }

    public function index()
    { 
        $sql = "SELECT * FROM campaigns ORDER BY id DESC";
 
        $result = mysqli_query($this->conn, $sql);
        
        if($result){
           
            return $result;
        }
        else{
             
        } 
         
    }

}

?>