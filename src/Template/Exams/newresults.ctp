<?php
foreach ($response['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

foreach ($exams_list['details']['exams_list'] as $key => $value) {
  $exam[$value['id']]=$value['name'];
}
?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Exams & Results</a></li>
    <li class="active">Upload Results</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Upload Results</h1>
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
                <h4 class="panel-title">Upload Results</h4>
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
                
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('class_&_sections', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class));?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Exams | List</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('exam_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$exam));?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Result CSV</label>
                        <div class="col-md-9">
                            <input type="file" name="filename" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Upload</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">

                            <a href='<?php echo BASE_URL.'uploads/csv/result_sample.csv' ?>' class="btn btn-warning">Download Sample CSV</a>
                        </div>
                    </div>
                        
                </form>
            </div>
        </div>
        <!-- end panel -->



    </div>
    <!-- end col-6 -->


    
</div>


