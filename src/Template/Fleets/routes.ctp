<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fleet</a></li>
    <li class="active">Routes</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Routes</h1>
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
                <h4 class="panel-title">New Route</h4>
            </div>
            <div class="panel-body">

                      <?php if($status == 200): ?>
                      <div class="alert alert-success fade in m-b-15">
                          <strong>Success!</strong>
                          <?php echo $message; ?>
                          <span class="close" data-dismiss="alert">&times;</span>
                      </div>
                      <?php elseif($status == 400): ?>
                      <div class="alert alert-danger fade in m-b-15">
                          <strong>Failure! </strong>
                          <?php echo $message; ?>
                          <span class="close" data-dismiss="alert">&times;</span>
                      </div>                    
                      <?php endif; ?>


                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data"   data-parsley-validate="true"  >

                    <div class="form-group">
                        <label class="col-md-3 control-label">Route Name</label>
                        <div class="col-md-9">
                            <input type="text" name="route_name" placeholder="Route Name" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Route Number</label>
                        <div class="col-md-9">
                            <input type="text" name="route_number" placeholder="Route Number" class="form-control" />
                        </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-warning" name="submit" />
                            </select>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- end panel -->


        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Route List</h4>
            </div>
            <div class="panel-body">

                <table class="table">
                    <thead>
                        <th>Route Name</th>
                        <th>Route Number</th>
                    </thead>
                    <tbody>
                    <?php foreach ($route_details as $key => $value): ?>
                        <tr>
                            <td>
                                <input type="text" name="route_name_new_1" class="form-control" value="<?php echo $value['name']; ?>" />
                            </td>
                            <td>
                                <input type="text" name="route_number_new_1" class="form-control" value="<?php echo $value['number']; ?>" />
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 --> 
</div>