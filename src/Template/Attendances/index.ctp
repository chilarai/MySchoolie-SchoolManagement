<style>
.absent {
	color:red;
}
</style>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Attendances</a></li>
    <li class="active">Attendance Reports</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Attendance Reports</h1>
<!-- Attendance spelling wrong in the header --> 
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
                <h4 class="panel-title">Attendance Reports</h4>
            </div>
            <div class="panel-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data"   data-parsley-validate="true"  >

                <?php
                	foreach($attendances as $attendance){
                		//print_r($attendance);
                	}
                	
                	$options = "";
                	foreach($classes as $class){
                		$options .= "<option value='".$class['id']."'>".$class['class']."-".$class['section']."</option>"; 
                	}
                ?>

                <div class="form-group">
                    <label class="col-md-3 control-label">Class | Section</label>
                    <div class="col-md-9">
                        <select name="class_id" placeholder="Select Class" id="class_id" class="form-control">
                            <?php echo $options; ?>
                        </select>
                    </div>

                </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Date From  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="date1" data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Date To<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="date2" data-parsley-required="true"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
				<div class="form-group">
                    <label class="col-md-3 control-label">View/Download</label>
                    <div class="col-md-9">
                        <select name="view_download" class="form-control">
							<option value="0">Download</option>
							<option value="1">View</option>
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-9">
                        <input type="submit" value="Submit"  name="submit" class="btn btn-warning"/>
                    </div>

                </div>


                

                <?php echo $this->Form->end();?>
            </div>
        </div>
	<?php if(!empty($student_names)) :?>
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Report</h4>
            </div>
            <div class="panel-body">
				<div class="table-responsive">
				<table class="table table-bordered">
                    <thead>
					<th>Date </th>
                        <?php foreach ($student_names as $key => $value){
							echo "<th>".$value['student_name']."</th>";
						}?>
                    </thead>
                    
					<tbody>
                        
						<?php
						
							foreach ($array as $innerArray) {
									echo "<tr>";
									if (is_array($innerArray))
									{
										foreach ($innerArray as $value) 
										{
											echo "<td class=".$value.">".$value."</td>";
										}
									}
									echo "</tr>";
							}
							
						?>
                        
                    </tbody>
                </table>
				</div>
            </div>
        </div>
		<?php endif; ?>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


    
</div>