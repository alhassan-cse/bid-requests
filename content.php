<h2>Current Auctions</h2>
<div class="row">
    <?php
    // print_r($data);die; 
    $count = mysqli_num_rows($data); 
    if($count>0){
        while($row = mysqli_fetch_assoc($data)){
        ?>
        <div class="col-md-4 pt-2">
            <div class="card p-3">
                <img class="card-img-top" src="<?php echo $row['image_url'];?>" alt="<?php echo $row['campaign_name'];?>" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['campaign_name'];?></h4>
                    <ul class="price">
                        <li class="header">Advertiser : <?php echo $row['advertiser'];?></li>
                        <li class="header">Company Name : <?php echo $row['tld'];?></li>
                        <li class="header">Current Price : <?php echo $row['price'];?></li>
                        <li class="header">BID Type : <?php echo $row['bidtype'];?></li>
                        <li class="header">From Hour : <?php echo $row['from_hour'];?></li>
                        <li class="header">To Hour : <?php echo $row['to_hour'];?> </li>
                        <li class="header">BID Expire :<?php $apps->expireDate($row['expire_date']);?></li>
                        <li class="header">Highest BID : <?php $apps->highestBid($row['id'])?> </li>
                    </ul>
                    <?php 
                        if(isset($_SESSION['id'])){
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="campaign_id" value="<?php echo $row['id'];?>">
                                <input type="" name="value" value="">
                                <button name="bid_form" class="btn btn-sm btn-primary">BID</button>
                            </form>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
        }
    }
    else{
        ?> 
        <div class="col-md-12 pt-option-no-more">
            <div class="d-flex justify-content-center"> 
                <b>This is some text within a card body.</b>
            </div>
        </div> 
        <?php
    }
    ?>
</div>