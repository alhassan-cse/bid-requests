<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<link href="../assets/libs/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../assets/css/main.css" rel="stylesheet" id="bootstrap-css">
<script src="../assets/libs/bootstrap/bootstrap.min.js" rel="stylesheet"></script>
<script src="../assets/libs/bootstrap/jquery.min.js" rel="stylesheet"></script>

</head>

<?php
session_start();
include('AdminClass/Authentication.php');
$app = new Authentication; 
if(isset($_POST['form'])){ 
    $message  = $app->login($_POST, $user_type = 1);
}
   
if(isset($_SESSION['id'])){
    header("location: dashboard.php");
}

?>

<body>
    <div id="login"> 
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                
                <div id="login-column" class="col-md-6"> 
                    <?php
                    if(isset($message['class'])){
                        ?>
                        <div class="alert alert-<?php echo $message['class'];?>" role="alert">
                            <?php echo $message['message'];?>
                        </div>
                        <?php
                    } 
                    ?> 
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="form" class="btn btn-info btn-md" value="submit">
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>