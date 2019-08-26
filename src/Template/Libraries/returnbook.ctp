<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Library</a></li>
    <li class="active">New Library</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Return Book</h1>
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
                <h4 class="panel-title">Details</h4>
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
                
                <form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
                    <div class="form-group">
                        <label class="col-md-3 control-label">Student Name</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $book_issued['student_name'];?></label>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Book Name</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $book_issued['book_name'];?></label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Issued From</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $book_issued['issued_from'];?></label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Issued Till</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $book_issued['issued_till'];?></label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Class</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $book_issued['class'];?></label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Roll No</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $book_issued['rollno'];?></label>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Remarks </label>
                        <div class="col-md-9">
                            <input type="text" name="remarks" class="form-control" placeholder="Remark"/>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">Fee Amount <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" name="fee_amount" data-parsley-required="true" class="form-control" placeholder="Fee Amount"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Fee Type  <i class="fa fa-asterisk text-danger f-s-8"></i> </label>
                        <div class="col-md-9">
                            <select class="form-control" name="fee_type"  placeholder="Fee Type">
                                <option value="none">No Fee</option>
                                <option value="lost">Lost</option>
                                <option value="damage">Damage</option>
                                <option value="late">Late</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Return Date  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="return_date" data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
						<label class="col-md-3 control-label"></label>
							<div class="col-md-9">
								<input type="submit" class="btn btn-warning"/>
							</div>

                    </div>

                </form>
                
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>


