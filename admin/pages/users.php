<header class="page-title-bar">
    <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto"> All Users </h1>
        <div id="dt-buttons" class="badge badge-lg badge-success"><a href="">Add New</a></div>
    </div>
</header>
<?php 
include('AdminClass/Users.php');
$app = new Users; 
$data = $app->index();
$statusArr = [0=>'Inactive', 1=>'Active'];
?>
<div class="page-section">
    <div class="card card-fluid">
        <div class="card-body"> 
        <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($data)){
                    ?>
                    <tr>
                        <td><?php echo $row['name'] ;?></td>
                        <td><?php echo $row['email'] ;?></td>
                        <td><?php echo $row['phone'] ;?></td> 
                        <td><?php echo $statusArr[$row['status']] ;?></td>
                        <td>
                            <div class="text-center">
                                <?php
                                if($row['status'] == 1)
                                {
                                    ?>
                                   <a href="#" class="btn btn-sm btn-info" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                                    <?php 
                                }
                                else{
                                    ?>
                                    <a href="#" class="btn btn-sm btn-info" title="Active"><i class="fa fa-thumbs-up"></i></a>
                                    <?php
                                }
                                ?>
                                <a href="#" class="btn btn-sm btn-info" title="{{ landata('Edit') }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-info user-delete" data-id="{{ $row->id }}" title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td> 
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
 
</div> 


                     