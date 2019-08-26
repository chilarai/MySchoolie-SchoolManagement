<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Fleet</a></li>
    <li class="active">Fleet</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Vendors</h1>
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
                <h4 class="panel-title">New Vendor</h4>
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
                        <label class="col-md-3 control-label">Vendor Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" name="vendor_name" placeholder="Vendor Name" value="<?php echo $vendors_list[0]['vendor_name']; ?>"  data-parsley-required="true" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Contact Person </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact_person" placeholder="Name" value="<?php echo $vendors_list[0]['contact_person']; ?>"   />
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Photograph </label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="photograph" placeholder="photograph of contact person" >
						</div>
					</div>

                     <div class="form-group">
                        <label class="col-md-3 control-label">Phone </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone" placeholder="Contact Number" value="<?php echo $vendors_list[0]['phone']; ?>"   />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Contact Email" value="<?php echo $vendors_list[0]['email']; ?>"  />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $vendors_list[0]['address']; ?>"   />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Permanent Account Number</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="pan" placeholder="PAN" value="<?php echo $vendors_list[0]['pan']; ?>"   />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Bank Details</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="account_number" placeholder="Account Number" value="<?php echo $bank_details_json['account_number']; ?>" />
							<input type="text" class="form-control" name="bank_name" placeholder="Bank Name"  value="<?php echo $bank_details_json['bank_name']; ?>" />
                            <input type="text" class="form-control" name="ifsc" placeholder="IFSC Code"  value="<?php echo $bank_details_json['ifsc']; ?>"  />
                        </div>
                    </div>
					
					
					<div class="form-group">
						<label class="col-md-3 control-label">Ownership </label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="ownership" placeholder="Ownership Document" >
						</div>
					</div>
					
					

                    <div class="form-group">
                        <div class="col-md-9">
						<label class="col-md-4 control-label">
                            <input type="submit" class="btn btn-warning" name="submit" value="Update" />
                            </select>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- end panel -->
	</div>

</div>