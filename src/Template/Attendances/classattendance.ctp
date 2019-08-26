<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}



?>



<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Attendance</a></li>
	<li class="active">Edit Attendance</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Add Classwise Attendance</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
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
                <h4 class="panel-title">Add Classwise Attendance</h4>
            </div>
            <div class="panel-body">
				<?php if($response['status'] == 200): ?>
                    <div class="alert alert-success fade in m-b-15">
                        <strong>Success!</strong>
                        <?php echo $response['message']; ?>
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>
                    <?php elseif($response['status'] == 400): ?>
                    <div class="alert alert-danger fade in m-b-15">
                        <strong>Failure! </strong>
                        <?php echo $response['message']; ?>
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>                    
				<?php endif; ?>
            <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','class'=>'form-horizontal']);?>
                    
                   <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, "id"=>"class_id"));?>
                            <div id="a"></div>
                        </div>

                    </div>

                    
					 
					

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Select</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- end panel -->
		<?php if(!empty($students_list)):?>
		<!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Add Classwise Attendance</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" >
					<div class="form-group">
                        <label class="control-label col-md-3">Date  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="date" data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php foreach($students_list as $key => $value):?>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> <?php echo $value['student_name'];?></label>
                        <div class="col-md-9">
                            <select  name="attendance[]" class="form-control" placeholder="">
								<option value="present" selected>Present</option>
								<option value="absent">Absent</option>
							</select>
							<input type="hidden" value="<?php echo $value['id'];?>" name="student_id[]">
                        </div>
                    </div>
                    <?php endforeach;?>
				

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Save</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- end panel -->
		<?php endif;?>
    </div>
    <!-- end col-12 -->
    
</div>