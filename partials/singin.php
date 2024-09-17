
<?php
// session_start();
if(isset($_POST['form'])){
    $message  = $authentication->login($_POST, $user_type = 2);
} 
?>

<div class="card p-3 pt-option">
    <div class="card-body">
        <?php
        if(isset($message['class'])){
            ?>
            <div class="alert alert-<?php echo $message['class'];?>" role="alert">
                <?php echo $message['message'];?>
            </div>
            <?php
        } 
        ?> 
        <form action="" method="POST">
            <h2>Sing in</h2>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="form" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>