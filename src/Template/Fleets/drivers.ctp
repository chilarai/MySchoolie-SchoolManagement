<?php 
foreach ($vendorlist['details']['vendor_list'] as $key => $value) {
 $vendor[$value['id']]=$value['vendor_name'];
 
}


?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fleet</a></li>
    <li class="active">Drivers</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Drivers</h1>
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
                <h4 class="panel-title">New Driver</h4>
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
                        <label class="col-md-3 control-label">Driver Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" name="driver_name" placeholder="Driver Name" class="form-control"   data-parsley-required="true" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">License Number <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" name="license_number" placeholder="License Number" class="form-control"   data-parsley-required="true" />
                      
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">License Expiry <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div   class="date datepicker">
                                <input type="date"  name="license_expiry"  data-date-format="mm-dd-yyyy" class="form-control"   data-parsley-required="true" >
                            </div>
                        
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
						<label class="col-md-4 control-label"></label>
                            <input type="submit" class="btn btn-warning" name="submit" value="Create" />
                        
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
                <h4 class="panel-title">Driver List</h4>
            </div>
            <div class="panel-body">

                <table class="table">
                    <thead>
                        <th>Driver Name</th>
                        <th>License Number</th>
                        <th>License Expiry</th>
						<th>Employee Type<th>
                    </thead>
                    <tbody>

                    <?php foreach ($driver_details as $key => $value): ?>
                        <tr>
                            <td>
                                <input type="text" name="driver_name_new_1" class="form-control" value="<?php echo $value['name']; ?>" />
                            </td>
                            <td>
                                <input type="text" name="license_number_new_1" class="form-control" value="<?php echo $value['license_number']; ?>" />
                            </td>
                            <td>
                                <div   class="date datepicker">
                                    <input type="date"  name="expiry_new_1"  data-date-format="mm-dd-yyyy" class="form-control" value=<?php echo $value['license_expire']; ?> >
                                </div>
                            </td>
							
							<td> <?php echo $this->Form->input('vendor_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$vendor, 'default'=>$value['vendor_id']));?>  </td>

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