<?php

if(isset($hostel_detail)){
    
    foreach ($hostel_detail as $key => $value) {
    $hostel_dropdown[$value['id']]=$value['hostel_name'];
    }

}

?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Hostels</a></li>
    <li class="active">Facilities</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Reports</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Search</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Hostel Name</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('hostel_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$hostel_dropdown, "id"=>"class_id"));?>
                            <div id="a"></div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Date Range</label>
                        <div class="col-md-4">
                            <input name='start_date' type="text" class="form-control"  id="datetimepicker3" placeholder="YYYY/MM/DD" />
                        </div>
                        <div class="col-md-4">
                            <input name='end_date' type="text" class="form-control" id="datetimepicker4" placeholder="YYYY/MM?DD" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Report Type</label>
                        <div class="col-md-9">
                            <select name='report_type' class="form-control">
                                <option value=inout>In & Out</option>
                                <option value=occupancy>Occupancy</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Search</button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
        <!-- end panel -->
        <!-- begin panel -->
        <?php if(!empty($hostel_leave_list)):?>

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
                        <th>Name</th>
                        <th>Roll No</th>
                        <th>Class</th>
                        <th>Room</th>
                        <th>Hostel</th>
                        <th>Leave From</th>
                        <th>Leave To</th>
                    </thead>
                    <tbody>
                        <?php foreach ($hostel_leave_list as $key => $value) {
                                echo "<tr> 
                                        <td>" . $value['name']."</td>
                                        <td>" . $value['rollno']."</td>
                                        <td>" . $value['class']."</td>
                                        <td>" . $value['room']."</td>
                                        <td>" . $value['name_hostel']."</td>
                                        <td>" . $value['leave_from']."</td>
                                        <td>" . $value['leave_to']."</td>
                                      </tr>";
                            
                            } 

                       ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif;?>   
        <!-- end panel -->
        <!-- begin panel -->
        <?php if(!empty($hostel_room_list)):?>

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
                        <th>Name</th>
                        <th>Roll No</th>
                        <th>Class</th>
                        <th>Room</th>
                        <th>Hostel</th>
                        <th>Allotted From</th>
                    </thead>
                    <tbody>
                        <?php foreach ($hostel_room_list as $key => $value) {
                                echo "<tr> 
                                        <td>" . $value['name']."</td>
                                        <td>" . $value['rollno']."</td>
                                        <td>" . $value['class']."</td>
                                        <td>" . $value['room_no']."</td>
                                        <td>" . $value['name_hostel']."</td>
                                        <td>" . $value['allotted_on']."</td>
                                      </tr>";
                            
                            } 

                       ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif;?>   
        <!-- end panel -->        
    </div>
</div>