<?php

foreach ($driver_details as $key => $value) {
  $driver[$value['id']]=$value['name'];
}

foreach ($route_details as $key => $value) {
  $route[$value['id']]=$value['name'];
}
foreach ($vendorlist['details']['vendor_list'] as $key => $value) {
  $vendor[$value['id']]=$value['vendor_name'];
  
}

?>




<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fleet</a></li>
    <li class="active">Fleet</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Fleet</h1>
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
                <h4 class="panel-title">New Fleet</h4>
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
                        <label class="col-md-3 control-label">Vehicle Type <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <select name="vehicle_type" class="form-control"  data-parsley-required="true" >
                                <option></option>
                                <option value="Bus">Bus</option>
                                <option value="Mini Bus">Mini Bus</option>
                                <option value="Van">Van</option>
                                <option value="Tracker">Tracker</option>
                                <option value="Tempo">Tempo</option>
                                <option value="Rikshaw">Rikshaw</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Vehicle Number <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="vehicle_no" placeholder="Vehicle Number"  data-parsley-required="true" />
                            
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-3 control-label">Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="vehicle_name" placeholder="Vehicle Number"  data-parsley-required="true" />
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">GPS Device ID <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="device_id" placeholder="Device ID"  data-parsley-required="true" />
                            
                        </div>
                    </div>
					 <div class="form-group">
                        <label class="col-md-3 control-label">School/Vendor <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                          <?php echo $this->Form->input('vendor_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$vendor));?>  
                            
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
                <h4 class="panel-title">Fleet List</h4>
            </div>
            <div class="panel-body">

                <table class="table">
                    <thead>
                       <!-- <th>Bus Name</th>
                        <th>Driver</th>
                        <th>Route</th>
                        <th>GPS Device ID</th>
                        <th>Status</th>
                        <th></th> -->
						
						<th>Vehicle Number</th>
                        <th>Vehicle Type</th>
                        <th>GPS Device ID</th>
                        <th>School/Vendor</th>
                    </thead>
                    <tbody>
                  <!--  ?php foreach ($fleet_details as $key => $value): ?>
                        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data"   data-parsley-validate="true"  >

                        <tr>
                            <td>?php echo $value['vehicle_no']; ?></td>
                            <td>
                                
                            ?php echo $this->Form->input('driver_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$driver));?>

                                
                            </td>
                            <td>

                            ?php echo $this->Form->input('route_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$route));?>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="gps_device_id" value="?php echo $value['gps_no']; ?>">
                            </td>
                            <td>
                                <select class="form-control" name="status">
                                    <option value="1" selected>Operational</option>
                                    <option value="2">Non Operational</option>
                                    <option value="3">Repair</option>
                                    <option value="4">GPS Issue</option>
                                </select>
                            </td>
                            <td><button class="btn btn-success btn-xs">Track</button></td>
                        </tr>
                        
                        </form>
                    ?php endforeach;  -->
					
						<?php foreach ($fleet_details as $key => $value) : ?>
						<tr>
							<td><?php echo $value['vehicle_no']; ?></td>
							<td><?php echo $value['vehicle_type']; ?></td>
							<td><?php echo $value['gps_no']; ?></td>
							 <td><?php echo $this->Form->input('vendor_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$vendor, 'default'=>$value['vendor_id']));?></td>
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