<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Courses & Subjects</a></li>
    <li class="active">Courses</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Courses</h1>
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
                <h4 class="panel-title">Edit Course</h4>
            </div>
            <div class="panel-body">
			
                <form class="form-horizontal" method="post" >
                     <?php foreach ($course_list as $key => $value); ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Course Name</label>
                        <div class="col-md-9">
                            <input type="text" name="course" class="form-control" value="<?php echo $course_list['course_name'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Total Subjects</label>
                        <div class="col-md-9">
                            <input type="text" name="total_subjects" class="form-control" value="<?php echo $course_list['total_subjects'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="remarks" ><?php echo $course_list['remark'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">marktype</label>
                        <div class="col-md-9">
                           <div class="radio">
                                <label>
                                    <input type="radio" name="marking_type" value="mark" checked/>
                                        Marks
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="marking_type" value="grade"/>
                                        Grade
                                </label>
                            </div>
                        </div>
                    </div>
					

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </div>
                    
                </form>
				
            </div>
        </div>
        <!-- end panel -->		
	</div>
	<!-- end col-6 -->
</div>
<!-- end row -->