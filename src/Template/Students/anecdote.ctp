<?php

foreach ($teacherlist['details']['teacher_list'] as $key => $value) {
  $teacher[$value['id']]=$value['name'];
}
foreach ($studentlist['details']['student_list'] as $key => $value) {
	$student[$value['id']]=$value['name']." | ".$value['class_section'];
}

?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Students & Parents</a></li>
	<li class="active">Students</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Students Anecdote</h1>
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
                <h4 class="panel-title">Add Anecdote</h4>
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
            <form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >

                    <div class="form-group">
                        <label class="col-md-3 control-label">Student<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('student_id', array('type'=>'select','class'=>'form-control, select2','style'=>'width:100%;','label'=>false, 'options'=>$student, "id"=>"student_id"));?>
                        </div>
                    </div>
					
					<!-- <div class="form-group"> -->
                        <!-- <label class="col-md-3 control-label">Class | Section</label> -->
                        <!-- <div class="col-md-9"> -->
                            <!-- <?php //echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, "id"=>"class_id"));?> -->
                            <!-- <div id="a"></div> -->
                        <!-- </div> -->

                    <!-- </div> -->
					<div class="form-group">
					<label class="control-label col-md-3" >Student Anecdote<i class="fa fa-asterisk text-danger f-s-8"></i></label>
						<div class="col-md-9">
							<textarea class="form-control" rows="20" name="anecdote"  data-parsley-required="true"></textarea>
						</div>
					</div>
					<div class="form-group">
                        <label class="col-md-3 control-label">Teacher</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('user_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$teacher));?>
                        </div>

                    </div>
					<div class="form-group">	
						<label class="control-label col-md-3" ></label>
						<div class="col-md-2">
							<a class="btn btn-warning" href="#modal-dialog" data-toggle="modal">Save</a>
						</div>
						
					</div>
					<!-- #modal-dialog -->
					<div class="modal fade" id="modal-dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title">New Anecdote</h4>
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
					<!-- end #modal-dialog -->
                    
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
    
</div>




