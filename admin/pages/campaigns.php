<header class="page-title-bar">
    <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> All Campaigns </h1>
        <div id="dt-buttons" class="badge badge-lg badge-success"><a href="add_campaign.php">Add New</a></div>
    </div>
</header>
<?php 
include('AdminClass/Campaign.php');
$app = new Campaign; 
$data = $app->index();
 
?>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-body"> 
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Campaign Name</th>
                        <th>Advertiser</th>
                        <th>Code</th> 
                        <th>Portal Name</th> 
                        <th>Price</th>  
                        <th>Expire Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($data)){
                    ?>
                    <tr>
                        <td><?php echo $row['campaign_name'] ;?></td>
                        <td><?php echo $row['advertiser'] ;?></td>
                        <td><?php echo $row['code'] ;?></td> 
                        <td><?php echo $row['portal_name'] ;?></td> 
                        <td><?php echo $row['price'] ;?></td> 
                        <td><?php echo date("d-m-Y", $row['expire_date']) ;?></td> 
                        <td>edit</td> 
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>         