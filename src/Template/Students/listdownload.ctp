<?php
foreach ($response['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}
// if($responses['status']==200){
//   $student_Details=$responses['details'];
// }

?>


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Students & Parents</a></li>
	<li class="active">Download Info</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Dowload Student Info</h1>
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
                <h4 class="panel-title">Download Criteria</h4>
            </div>
            <div class="panel-body">
                 <?php echo $this->Form->create('upload',['method'=>'POST','class'=>'form-horizontal']);?>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                        <?php echo $this->Form->input('class_&_sections', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class));?>
<!--                             <select class="form-control">
                                <option>All Classes</option>
                                <option>I-A</option>
                                <option>I-B</option>
                                <option>II-A</option>
                                <option>4</option>
                                <option>5</option>
                            </select> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Download List</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- end panel -->

        
    </div>
    <!-- end col-6 -->
    
</div>


