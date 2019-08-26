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
                
                <?php if(!is_null($response)): ?>

                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data"   data-parsley-validate="true"  >

                    <div class="form-group">
                        <label class="col-md-3 control-label">Circular Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="<?php echo $response['heading']?>" name="heading"  data-parsley-required="true" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Event Date  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="event_date" value="<?php echo $response['event_date']?>" data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Circular Details <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <textarea class="form-control"  name="body" data-parsley-required="true" ><?php echo $response['body'];?></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Circular Attachment </label>
                        <div class="col-md-9">
                            <input type="file"  name="upload_file" class="form-control" />
                        </div>

                    </div>
					<div class="form-group">
						<label class="col-md-3 control-label">Event Type </label>
						<div class="col-md-9">
							<select class="form-control" name="event_type"  placeholder="">
								<option value="<?php echo $response['event_type'];?>"><?php echo $response['event_type'];?></option>
								<option value="Holiday">Holiday</option>
								<option value="Event">Event</option>
								
							</select>
                      </div>
					</div>

                    <div class="form-group">
                      <label class="col-md-3 control-label">Category <i class="fa fa-asterisk text-danger f-s-8"></i> </label>
                      <div class="col-md-9">
                          <select class="form-control" name="category"  placeholder="Select Circular Category">
                              <option selected="<?php echo $response['category'];?>"><?php echo $response['category'];?></option>
                              <option value="teacher">Teacher</option>
                              <option value="student">Student</option>
                              <option value="all">All</option>
                          </select>
                      </div>
                    </div>

                    <input type="hidden" name="circular_id" value="<?php echo $response['id'];?>">

					<div class="form-group">	
					<label class="col-md-3 control-label"></label>
						<div class="col-md-9">
							<a class="btn btn-warning" href="#modal-dialog" data-toggle="modal">Save</a>
						</div>
						
					</div>
					<!-- #modal-dialog -->
					<div class="modal fade" id="modal-dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">Edit Circular</h4>
								</div>
								<div class="modal-body">
									Are you sure you want to proceed?
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
									<input type="submit" class="btn btn-warning" name="save" value="Proceed"/>
								</div>
							</div>
						</div>
					</div>
					<!-- end Modal -->

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <a class="btn btn-warning" href="#modal-dialogd" data-toggle="modal">Delete</a>
                           
                        </div>
                    </div>
					
					<!-- #modal-dialog -->
					<div class="modal fade" id="modal-dialogd">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">Delete Circular</h4>
								</div>
								<div class="modal-body">
									Are you sure you want to delete the circular?
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
									<a class="btn btn-mini btn-warning" href="<?php echo BASE_URL;?>circulars/deletecircular/<?php echo $response['id']; ?>">Delete</a> 
								</div>
							</div>
						</div>
					</div>
					<!-- end Modal -->

                </form>



                <?php endif; ?>
            

            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>