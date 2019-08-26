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
                           <input type="text" class="form-control" name="vendor_name" placeholder="Vendor Name"  data-parsley-required="true" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Contact Person <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact_person" placeholder="Name"  data-parsley-required="true" />
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Photograph <i class="fa fa-asterisk text-danger f-s-8"></i></label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="photograph" placeholder="photograph of contact person" data-parsley-required="true">
						</div>
					</div>

                     <div class="form-group">
                        <label class="col-md-3 control-label">Phone <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone" placeholder="Contact Number"  data-parsley-required="true" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Email<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Contact Email"  data-parsley-required="true" />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Address<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" placeholder="Address"  data-parsley-required="true" />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Permanent Account Number</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="pan" placeholder="PAN"   />
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-md-3 control-label">Bank Details</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="account_number" placeholder="Account Number"  />
							<input type="text" class="form-control" name="bank_name" placeholder="Bank Name"  />
                            <input type="text" class="form-control" name="ifsc" placeholder="IFSC Code"   />
                        </div>
                    </div>
					
					
					<div class="form-group">
						<label class="col-md-3 control-label">Ownership <i class="fa fa-asterisk text-danger f-s-8"></i></label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="ownership" placeholder="Ownership Document" data-parsley-required="true">
						</div>
					</div>
					
					

                    <div class="form-group">
                        <div class="col-md-9">
						<label class="col-md-4 control-label">
                            <input type="submit" class="btn btn-warning" name="submit" value="Create" />
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
                <h4 class="panel-title">Vendors List</h4>
            </div>
            <div class="panel-body">

                <table class="table">
                    <thead>
                        <th>Vendor Name</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
					<?php foreach ($vendors_list as $key => $value): ?>
						<tr>
							<td><?php echo $value['vendor_name']; ?></td>
							<td><?php echo $value['contact_person']; ?></td>
							<td><?php echo $value['phone']; ?></td>
							<td><?php echo $value['address']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><div id="center_button"><button class="btn btn-warning" onclick="location.href='editvendor/<?php echo $value['id'];?>'">Edit</button></div></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			
			</div>
		</div>
	</div>
	<!-- end col-6 -->
</div>
<!-- end row -->