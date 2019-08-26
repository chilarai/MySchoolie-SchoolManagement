<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

foreach ($teacherlist['details']['teacher_list'] as $key => $value) {
  $teacher[$value['id']]=$value['name'];
}

foreach ($studentlist['details']['student_list'] as $key => $value) {
  $student[$value['id']]=$value['name'];
}

?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Feedback</a></li>
    <li class="active">Edit Feedback</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Feedback</h1>
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
                <h4 class="panel-title">Edit Feedback</h4>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','class'=>'form-horizontal']);?>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, 'default'=>$notices_list['class_id']));?>
                            <div id="a"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Student</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('student_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$student, 'default'=>$notices_list['student_id']));?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Teacher</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('user_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$teacher, 'default'=>$notices_list['user_id']));?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Feedback Heading</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="heading" placeholder="Heading"><?php echo $notices_list['heading']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Feedback Details</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="details" placeholder="Remarks"><?php echo $notices_list['details']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Attachment</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="upload_file" value="<?php echo $notices_list['attachment_link']; ?>" />
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