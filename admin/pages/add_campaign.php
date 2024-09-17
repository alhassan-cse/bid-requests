<header class="page-title-bar">
    <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> Add Campaign </h1>
        <div id="dt-buttons" class="badge badge-lg badge-success"><a href="campaigns.php">Manage</a></div>
    </div>
</header>
<?php 
include('AdminClass/Campaign.php');
$app = new Campaign; 
if(isset($_POST['form'])){ 
    // print_r(44);die;
    $message  = $app->insert($_POST);
} 
?>
<div class="page-section">
    <div class="card card-fluid">
        <?php
        if(isset($message['class'])){
            ?>
            <div class="alert alert-<?php echo $message['class'];?>" role="alert">
                <?php echo $message['message'];?>
            </div>
            <?php
        } 
        ?> 
        <div class="card-body"> 
            <form action="" method="POST">
                <fieldset>
                    <legend>Base style</legend>
                    <div class="form-group">
                        <label for="campaign_name">Campaign Name</label> 
                        <input type="text" class="form-control" name="campaign_name" id="campaign_name" aria-describedby="tf1Help" placeholder="Campaign Name" required>
                    </div>

                    <div class="form-group">
                        <label for="advertiser">Advertiser</label> 
                        <input type="text" class="form-control" name="advertiser" id="advertiser" aria-describedby="tf1Help" placeholder="Advertiser" required>
                    </div>

                    <div class="form-group">
                        <label for="company_url">Company Url</label> 
                        <input type="text" class="form-control" name="company_url" id="company_name" aria-describedby="tf1Help" placeholder="Company Url" required>
                    </div>

                    <div class="form-group">
                        <label for="portal_name">Portal Name</label> 
                        <input type="text" class="form-control" name="portal_name" id="portal_name" aria-describedby="tf1Help" placeholder="Portal Name" required> 
                    </div>

                    <div class="form-group">
                        <label for="dimension">Dimension</label> 
                        <input type="text" class="form-control" name="dimension" id="dimension" aria-describedby="tf1Help" placeholder="Dimension" required>
                    </div>


                    <div class="form-group">
                        <label for="attribute">Aattribute</label> 
                        <input type="text" class="form-control" name="attribute" id="attribute" aria-describedby="tf1Help" placeholder="Aattribute" required>
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label> 
                        <input type="text" class="form-control" name="price" id="price" aria-describedby="tf1Help" placeholder="Price" required>
                    </div>


                    <div class="form-group">
                        <label for="image_url">Image Url</label> 
                        <input type="text" class="form-control" name="image_url" id="image_url" aria-describedby="tf1Help" placeholder="Image Url" required>
                    </div>

                    <div class="form-group">
                        <label for="from_hour">From Hour</label> 
                        <input type="text" class="form-control" name="from_hour" id="from_hour" aria-describedby="tf1Help" placeholder="From Hour" required>
                    </div>


                    <div class="form-group">
                        <label for="to_hour">To Hour</label> 
                        <input type="text" class="form-control" name="to_hour" id="to_hour" aria-describedby="tf1Help" placeholder="To Hour" required>
                    </div>

                    <div class="form-group">
                        <label for="hs_os">HS OS</label> 
                        <select class="form-control" name="hs_os" id="hs_os" required>
                            <option value="">Select Ho OS</option>
                            <option value="1">Android</option>
                            <option value="2">iOS</option>
                            <option value="3">Desktop</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bidtype">BID Type</label> 
                        <input type="text" class="form-control" name="bidtype" id="bidtype" aria-describedby="tf1Help" placeholder="bidtype" htmltag>
                    </div>
                    
                    <div class="form-group">
                        <label for="operator">Operator</label> 
                        <select class="form-control" name="operator" id="operator" required>
                            <option value="">Select Ho OS</option>
                            <option value="1">Banglalink</option>
                            <option value="2">GrameenPhone</option>
                            <option value="3">Robi</option>
                            <option value="4">Teletalk</option>
                            <option value="5">Airtel</option>
                            <option value="6">Wi-Fi</option>
                        </select>
                    </div>
            
                    <div class="form-group">
                        <label for="device_make">Device Make</label> 
                        <input type="text" class="form-control" name="device_make" id="device_make" aria-describedby="tf1Help" placeholder="Device Make">
                    </div>

                    <div class="form-group">
                        <label for="expire_date">Expire Date</label> 
                        <input type="date" class="form-control" name="expire_date" id="expire_date">
                    </div>
 
                    <div class="form-group">
                        <button type="submit" name="form" class="btn btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
 
</div> 




                     