 
<?php
session_start();
include('connect/Connect.php');
include('admin/AdminClass/Authentication.php');
include('app/App.php');
include('helper/Helper.php');
//include('helper/Helper.php');
 
// $apps = new App;
// $data = $apps->display();
 
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
        <title>Home | Event Management</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="assets/img/event-management.png" sizes="32x32" />
        <link rel="icon" href="assets/img/event-management.png" sizes="192x192" />
        <link rel="apple-touch-icon" href="assets/img/event-management.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
<body>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="index.php"><img class="header-logo" src="assets/img/event-management.png" alt="event-management"></a>
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

    <footer class="bg-dark mb-5" id="footer">
        <div class="d-flex justify-content-center align-items-center text-center text-lg-start py-3">
			<!-- copyright text -->
			<div class="text-white">© <?php echo date("Y");?> Event Management. All rights reserved.</div>
        </div>
    </footer>
</body>
</html>
