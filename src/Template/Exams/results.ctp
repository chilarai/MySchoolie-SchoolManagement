<?php
foreach ($response1['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

foreach ($exams_list['details']['exams_list'] as $key => $value) {
  $exam[$value['id']]=$value['name'];
}


foreach ($responses['result'] as $key => $value) {
  $result[$key]=$value;
}

?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Exams & Results</a></li>
    <li class="active">Results</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Results</h1>
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
                <h4 class="panel-title">Search Results</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Class & Section</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class));?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Exams | List</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('exam_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$exam));?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Roll No</label>
                        <div class="col-md-9">
                            <input type="text" name="rollno" class="form-control" placeholder="Roll No" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Create</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- end panel -->

        <!-- begin panel -->
        <?php if(!empty($responses['class_id'])){?>

        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Exams List</h4>
            </div>
            <div class="panel-body">
                <table  id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>Subject</th>
                        <th>Marks</th>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $key => $value) {
                                echo "<tr> <td>".$key."</td> <td>" . $value."</td></tr>";
                            
                            } 

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
        <?php }?>
    </div>
    <!-- end col-6 -->


    
</div>


