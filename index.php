<?php
session_start();
include('connect/Connect.php');
include('admin/AdminClass/Authentication.php');
include('app/App.php');


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u212045625_bid_requests');
define('DB_PASSWORD', 'X4z|8|Ln');
define('DB_DATABASE', 'u212045625_bid_requests');


$apps = new App;
$data = $apps->display();
// $expire_time = $apps->expire_time();
$statusArr = [0=>'Inactive', 1=>'Active'];

$authentication = new Authentication;
if(isset($_GET['status'])){ 
    $authentication->logout($user_type = 2);
}
 
// ua
$d1 = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
// IP Address
$SERVER_NAME = $_SERVER['SERVER_NAME']; 
$ip_address = gethostbyname($SERVER_NAME);  

if(isset($_POST['bid_form'])){ 
   $message  = $apps->userBid($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Current Auctions - BID Request</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        .pt-option{
            margin-bottom: 220px;
        }
        .pt-option-no-more{
            margin-bottom: 400px;
        }
        
    </style>
<body>

    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarSupportedContent">

                
                
                <div class="d-flex flex-row-reverse">
                    <?php 
                    if(isset($_SESSION['id'])){
                        ?>
                            <a class="btn btn-outline-success my-2 my-sm-0 m-2" href="javascript:void(0)"><?php echo $_SESSION['name'];?></a>
                            <a class="btn btn-outline-success my-2 my-sm-0" href="?status=logout&logout=true">Logout</a>
                        <?php
                        
                    }
                    else{
                        ?>
                        <a class="btn btn-outline-success my-2 my-sm-0 m-2" href="singup.php">Sign up</a>
                        <a class="btn btn-outline-success my-2 my-sm-0" href="singin.php">Sign in</a>
                        <?php
                    }
                    ?>
                    
                    
                </div>
            </div>
        </nav>
    </div>

    <div class="container pt-3"> 
    <?php
    if(isset($page)){
        if($page == 'singin'){
            include('partials/singin.php');
        }
        elseif($page == 'singup'){
            include('partials/singup.php'); 
        } 
    } 
    else{
        include('content.php'); 
    }
    ?>
    </div>

    <footer class="bg-dark pt-5 mb-5 mt-4">
        <div class="d-md-flex justify-content-between align-items-center text-center text-lg-start py-4">
			<!-- copyright text -->
			<div class="text-white"> Copyrights ©2024 BID Requests</div>
        </div>
    </footer>
</body>
</html>
