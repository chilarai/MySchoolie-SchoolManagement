<?php
if(isset($hostels_list)){
    
    foreach ($hostels_list as $key => $value) {
    $hostel_dropdown[$value['id']]=$value['hostel_name'];
    }

}

if(isset($hostel_student_list)){
    
    foreach ($hostel_student_list as $key => $value) {
    $hostel_student_dropdown[$value['student_id']]=$value['name'];
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
<h1 class="page-header">Out</h1>
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
                <h4 class="panel-title">Hostel In Out</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Hostel Name</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('hostel_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$hostel_dropdown, "id"=>"hostel_id"));?>
                            <div id="a"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Student Name</label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('student_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$hostel_student_dropdown, "id"=>"student_id"));?>
                            <div id="a"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Out Time Period</label>
                        <div class="col-md-4">
                            <input type="text" name="leave_from" class="form-control"  id="datetimepicker3" placeholder="From Time" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="leave_to" class="form-control" id="datetimepicker4" placeholder="Back On" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Reason</label>
                        <div class="col-md-9">
                            <textarea name="reason" class="form-control" placeholder="Reason" rows="5"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Reference Contact Number</label>
                        <div class="col-md-9">
                            <textarea name="contact_number" class="form-control" placeholder="Contact Number" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Reference Address</label>
                        <div class="col-md-9">
                            <textarea name="reference_address" class="form-control" placeholder="Address" ></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-md-3 control-label">Leaving With</label>
                        <div class="col-md-9">
                            <select name="leave_with" class="form-control">
                                <option value="friends">Friends</option>
                                <option value="guardian">Local Guardian</option>
                                <option value="parents">Parents</option>
                                <option value="alone">Alone</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">Apply</button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>