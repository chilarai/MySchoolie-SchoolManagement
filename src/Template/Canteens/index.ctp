<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Canteens</a></li>
    <li class="active">Menu</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Menu</h1>
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
                <h4 class="panel-title">Select Month</h4>
            </div>
			<div class="panel-body">
			
				<?php if($message['status'] == 200): ?>
                    <div class="alert alert-success fade in m-b-15">
                        <strong>Success!</strong>
                        <?php echo $message['message']; ?>
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>
                    <?php elseif($message['status'] == 400): ?>
                    <div class="alert alert-danger fade in m-b-15">
                        <strong>Failure! </strong>
                        <?php echo $message['message']; ?>
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>                    
				<?php endif; ?>

				<!-- begin form -->
                <form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
			
                    <div class="form-group">
                        <label class="control-label col-md-2">Month <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                         <div class="col-md-9">
                        <select name="month" data-parsley-required="true" class="form-control">
                            <option value="">------------Select Month------------</option>
                            <option value="1">January</option>
                            <option value="2">Feburary</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        </div>
                    </div>
					
                    
					
				<!--	<div class="form-group">
						<label class="col-md-3 control-label">Menu <i class="fa fa-asterisk text-danger f-s-8"></i></label>
						<div class="col-md-9">
							<input type="file" class="form-control" name="photograph" placeholder="photograph of contact person" data-parsley-required="true">
						</div>
					</div> -->
					
					 <div class="form-group">
                        <div class="col-md-9">
						<label class="col-md-4 control-label">
                            <input type="submit" class="btn btn-warning" name="submit" value="Submit" />
                            </select>
                        </div>
                    </div> 
				
				</form>
				<!-- end form -->
			</div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->

    
</div>