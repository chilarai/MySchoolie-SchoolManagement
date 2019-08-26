<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Circulars</a></li>
    <li class="active">List</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Circulars</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Circulars</h4>
            </div>
            <div class="panel-body">
                <table id ="data-table" class="table table-bordered table-striped with-check">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
                            <th>Circular Title</th>
                            <th>Description</th>
                            <th>Event Date</th>
                            <th>Category</th>
                            <th>Attachment</th>
							<th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php use Cake\I18n\Time; ?>
                        <?php foreach($response['details'] as $circularlist):?>

                        <form  action='circulars/edit' method="post">    

                        <tr>
                            <td><input type="checkbox" /></td>
                            <input type="hidden" name="circular_id" value="<?php echo $circularlist['id'];?>">
                            <td><?php echo $circularlist['heading'];?></td>
                            <td><?php echo substr($circularlist['body'],0,100);?></td>
                            <td><?php echo date('d F Y', strtotime($circularlist['event_date']));?></td>
                            <td><?php echo $circularlist['category'];?></td>
                            <?php
                            $check = $circularlist['media_type'];
                            if(!is_null($check)) echo 
                                "<td><a href='". $circularlist['media_link']."' 
                                                        target='_blank'><i class='fa fa-attachment'></i> View Attachment</a></td>
                                                  ";
                            else
                                echo "<td></td>";


                            ?>

                                                                              
                            <td><a href="<?php echo BASE_URL;?>circulars/edit/<?php echo $circularlist['id'];?>" class="btn btn-warning" name="Edit" value="Edit">Edit </a></td>

                        </tr>

                        </form>

                        <?php endforeach;?>
                    </tbody>
                </table>
                <button class="btn btn-mini btn-warning">Delete</button> 

            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>