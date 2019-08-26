<?php

foreach ($teacher_details as $key => $value) {
  $teacher[$value['teacher_id']]=$value['teacher_name'];
}

?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Staffs</a></li>
    <li class="active">Relieving</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Relieving</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Relieving</h4>
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

                <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','data-parsley-validate'=>"true",'class'=>'form-horizontal']);?>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Teacher</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('user_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$teacher));?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Relieving Date  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="resignation_date" data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">Reason</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="reason" placeholder="Description" data-parsley-required="true"></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="remarks" placeholder="Description" data-parsley-required="true"></textarea>
                        </div>

                    </div>


                    <div class="form-group">	
						<label class="col-md-3 control-label"></label>
						<div class="col-md-9">
							<a class="btn btn-warning" href="#modal-dialog" data-toggle="modal">Submit</a>
						</div>
					
					</div>
					<!-- #modal-dialog -->
					<div class="modal fade" id="modal-dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">Relieving</h4>
								</div>
								<div class="modal-body">
									Are you sure you want to proceed?
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
									<input type="submit" class="btn btn-warning" name="Save" value="Proceed"/>
								</div>
							</div>
						</div>
					</div>
					<!-- end Modal -->

                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->

