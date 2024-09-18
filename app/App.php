<?php

class App extends Connect{
    
    public function display(){ 
        $date =  strtotime(date("Y-m-d"));
       // $date =  strtotime(date("2024-09-16"));
        $sql = "SELECT * FROM campaigns WHERE `expire_date` > $date ORDER BY id DESC";
        $result = mysqli_query($this->conn, $sql);
        return $result; 
    }

    public function singUp($data)
    { 
        // session_start();
        if ($data["name"] == ''){
            return $message = ['class'=>'danger','message'=>'Name is requred'];
        }
        if ($data["email"] == null){
            return $message = ['class'=>'danger','message'=>'Email is requred'];
        }
        if ($data["phone"] == null){
            return $message = ['class'=>'danger','message'=>'Phone is requred'];
        }
        if ($data["password"] == null){
           return $message = ['class'=>'danger','message'=>'Password is requred'];
        }

        if ($data["password"] != $data["confirm_password"]) {
            return $message = ['class'=>'danger','message'=>'Password don\'t match'];
        }
 
        // print_r($data);die;
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = md5($data['password']);
        $user_type = 2;
        $status = 1;
         
        $user_sql = "SELECT * FROM users WHERE email='$email'";
        $mysql_result = mysqli_query($this->conn, $user_sql);
        $count = mysqli_num_rows($mysql_result); 
        if($count == 1) {
        // if($mysql_result){ 
            return $message = ['class'=>'danger','message'=>'Email already exits'];
        }
        else{
            $sql = "INSERT INTO `users` (`name`, `user_type`, `email`, `phone`, `password`, `status`) VALUES ('$name', '$user_type', '$email', '$phone', '$password', '$status')";
    
            $result = mysqli_query($this->conn, $sql);
            if($result){ 
                $_SESSION['success'] = "Resister has been successfully";
                header("location: singin.php");
            }
            else{
                return $message = ['class'=>'danger','message'=>'Something went wrong'];
            }
        }
    }

    // 0d 17h 57m 12s

    public function expireDate($expire_date)
    {
        $Target_Date = $expire_date; //expire data
        $Time_Left = $Target_Date - time();

        $days = floor($Time_Left / (60*60*24));//day
        $Time_Left %= (60 * 60 * 24);

        $hours = floor($Time_Left / (60 * 60));//hour
        $Time_Left %= (60 * 60);

        $min = floor($Time_Left / 60);//min
        $Time_Left %= 60;

        $sec = $Time_Left;//sec
    
        echo "<b>$days day $hours hours $min min $sec sec left</b>";
    }

    public function highestBid($id)
    {
        $highest_bid_sql = "SELECT MAX(`price`) AS max_price FROM `bids` WHERE `campaign_id`='$id'";
        // print_r($highest_bid_sql);die;
        $highest_bid_result = mysqli_query($this->conn, $highest_bid_sql);
        if($highest_bid_result){
            $highest_bid_data = mysqli_fetch_assoc($highest_bid_result);
            echo $highest_bid_data['max_price'];
        }
        else{
            echo 'no-bid';
        }
        
    }

    public function userBid($data)
    {
        // ua
        $d1 = $_SERVER['HTTP_USER_AGENT'];
        $ip = $_SERVER['REMOTE_ADDR'];
        // IP Address
        $SERVER_NAME = $_SERVER['SERVER_NAME']; 
        $ip_address = gethostbyname($SERVER_NAME);      


        $campaign_id = $data['campaign_id'];
        $value = $data['value']; 

        $campaign_sql = "SELECT * FROM campaigns WHERE id='$campaign_id'";
        $campaign_result = mysqli_query($this->conn, $campaign_sql);
        $campaign_data = mysqli_fetch_assoc($campaign_result);

        // print_r($campaign_data['campaign_name']);die;

        $user_id = $_SESSION['id'];

        $sql = "INSERT INTO `bids` (`campaign_id`, `user_id`, `price`, `device`) VALUES ('$campaign_id', '$user_id', '$value', '$device')";
        $result = mysqli_query($this->conn, $sql);
        if($result){ 
            $_SESSION['success'] = "BID has been successfully";
            header("location: index.php");
        }
        else{
            return $message = ['class'=>'danger','message'=>'Something went wrong'];
        }

        // $user_sql = "SELECT * FROM bids WHERE email='$email'";
        // $mysql_result = mysqli_query($this->conn, $user_sql);
        // $count = mysqli_num_rows($mysql_result); 
        // if($count == 1) { 
        //     return $message = ['class'=>'danger','message'=>'Email already exits'];
        // }
        // else{
        //     $sql = "INSERT INTO `bids` (`campaign_id`, `user_id`, `price`, `user`, `device`) VALUES ('$campaign_id', '$user_id', '$value', '$device')";
        //     $result = mysqli_query($this->conn, $sql);
        //     if($result){ 
        //         $_SESSION['success'] = "Resister has been successfully";
        //         header("location: singin.php");
        //     }
        //     else{
        //         return $message = ['class'=>'danger','message'=>'Something went wrong'];
        //     }
        // }
         
    }

    

    public function singin($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $sql = "SELECT * FROM users WHERE email = '$email' and password = md5('$password')";
    
        $result = mysqli_query($this->conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        $count = mysqli_num_rows($result); 
        if($count == 1) {
            session_start();
            $_SESSION['id']   = $user['id'];
            $_SESSION['name'] = $user['name']; 
            header("location: index.php");
        } else {
            return $message = ['class'=>'danger','message'=>'Your Email or Password is invalid'];
        }
    }

    public function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header("location: singin.php");
    }
}

?>