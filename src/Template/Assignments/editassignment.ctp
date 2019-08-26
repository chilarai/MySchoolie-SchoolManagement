<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

foreach ($teacherlist['details']['teacher_list'] as $key => $value) {
  $teacher[$value['id']]=$value['name'];
}

foreach ($subjectlist['details']['subject_list'] as $key => $value) {
  $subject[$value['id']]=$value['name'];
}

?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Assignments</a></li>
    <li class="active">Edit Assignment</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Assignment</h1>
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
                <h4 class="panel-title">Edit Assignment</h4>
            </div>
            <div class="panel-body">
                
                <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','data-parsley-validate'=>"true",'class'=>'form-horizontal']);?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, 'default'=>$assignments['class_id']));?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Teacher</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('user_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$teacher,  'default'=>$assignments['user_detail_id']));?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Subject</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('subject_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$subject, 'default'=>$assignments['subject_id']));?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="description" placeholder="Description"><?php echo $assignments['homework']; ?></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Attachment</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="upload_file" value="<?php echo $assignments['attachment_link']; ?>"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Submission Date  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="submission_date" value=" <?php echo $assignments['submission_date']; ?>"  data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-warning" value="Update"/>
                        </div>

                    </div>

                </form>
                
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>