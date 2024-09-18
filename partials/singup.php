<?php
// session_start();
 
if(isset($_POST['form'])){
    $message  = $apps->singUp($_POST);
} 
?>
<div class="card p-3">
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
            <h2>Sing up</h2>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Name" value="<?php if($_POST){ echo $_POST['name'];}?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php if($_POST){ echo $_POST['email'];}?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php if($_POST){ echo $_POST['phone'];}?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="Password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="ConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="confirm_password" class="form-control" id="ConfirmPassword" placeholder="Confirm Password">
                </div>
            </div> 
            <div class="form-group row">
                <div class="col-sm-2">Checkbox</div>
                <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                    Example checkbox
                    </label>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="form" class="btn btn-primary">Sign up</button>
                </div>
            </div>
        </form>
    </div>
</div>