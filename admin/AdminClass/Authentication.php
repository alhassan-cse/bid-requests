<?php
// include('../connect/Connect.php');
class Authentication extends Connect{

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