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
						 <h4 class="panel-title">Change Your Password</h4>
			</div>
					<div class="panel-body">
						<form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  class="form-horizontal">
							<div class="form-group">
								<label class="col-md-3 control-label">Current Password <i class="fa fa-asterisk text-danger f-s-8"></i></label>
								<div class="col-md-9">
									<input type="password" name="old_password" placeholder="Old Password"  class="form-control"/>
							  </div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">New Password <i class="fa fa-asterisk text-danger f-s-8"></i></label>
								<div class="col-md-9">
									<input type="password" name="new_password" placeholder="New Password" class="form-control"/>
							  </div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Confirm Password <i class="fa fa-asterisk text-danger f-s-8"></i></label>
								<div class="col-md-9">
									<input type="password" name="confirm_password" placeholder="Confirm Password"  class="form-control"/>
							  </div>
							</div>
							

							<div class="form-actions">
							  <button type="submit" class="btn btn-warning">SUBMIT</button>
							</div>
						</form>
						 
						  <?php 

							  echo "<center>".$response['message']."</center>";
							 
							 ?>
					</div>
						
				</div>
			</div>
		</div>
        <!-- end panel -->
	</div>
	<!-- end col-6 -->
</div>
<!-- end row -->
