<?php
foreach ($subject_list as $key => $value) {
  $subject[$value['id']]=$value['name'];
}
?>
<?php
foreach ($course_list as $key => $value) {
  $course[$value['id']]=$value['course_name'];
}

?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Courses & Subjects</a></li>
    <li class="active">Courses & Subjects Relations</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Relations</h1>
<!-- end page-header -->
<form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
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
                <h4 class="panel-title">Edit Relation</h4>
            </div>
            <div class="panel-body">
                
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Course Name</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('course_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$course,'default'=>$relation_list['course_id']));?>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-3 control-label">Subject</label>
                        <div class="col-md-9">
                            
                                
								<?php echo $this->Form->input('subject_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$subject,'default'=>$relation_list['subject_id']));?>
                           
                        </div>
                    </div>
				<form>
                    <div class="form-group"> 
                        <label class="col-md-3 control-label">Subject Type</label>
                        <div class="col-md-9">
                            <select class="form-control" name="subject_type" value="<?php echo $relation_list['subject_type']; ?>">
                                <option value ="main">Main</option>
                                <option value ="elective">Elective</option>
                                <option value ="co-curricular">Co-currcicular</option>
                            </select>
                        </div>
                    </div>                    

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
									<h4 class="modal-title">Edit Course Subject Relation</h4>
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
</form>