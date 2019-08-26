<?php


?>

<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Appointment</a></li>
    <li class="active">Edit Appointment</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Appointment</h1>
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
                <h4 class="panel-title">Edit Appointment</h4>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','class'=>'form-horizontal','data-parsley-validate'=>"true"]);?>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Parent Name</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $appointment_detail_get['parent_name']; ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Student Name</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $appointment_detail_get['student_name'];?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Class | Section</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $appointment_detail_get['class']; ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Teacher Name</label>
                        <div class="col-md-9">
                            <label class="col-md-3 control-label"><?php echo $appointment_detail_get['teacher_name'];?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Subject <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <input type="text" name="subject" data-parsley-required="true" class="form-control" placeholder="Book Code"  value="<?php echo $appointment_detail_get['subject'];?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3">Reschedule Date of Appointment<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" class="form-control" name="date" data-parsley-required="true" placeholder="YYYY/DD/MM" value="<?php echo $appointment_detail_get['date'];?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-md-3"> Status  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                        <div class="col-md-9">
                            <select class="form-control" name="status"  id='appointment_status' data-parsley-required="true">
                                <option></option>
                                <option value=1>Default</option>
                                <option value=2>Accept</option>
                                <!-- <option value=3>Reject</option> -->
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Teacher Remarks</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="teacher_remarks" placeholder="Remarks"><?php echo $appointment_detail_get['teacher_remarks'];?></textarea>
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
									<h4 class="modal-title">Edit Appointment</h4>
								</div>
								<div class="modal-body">
									Are you sure you want to make changes to the appointment?
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



<script>
    
    $("#class_id").change(function(){
        var Editval = $("#class_id").val();
       /* $.post("<?php echo ALL_STUDENT_LIST; ?>",{"class_id":Editval}, function(data,status){
            $("a").text(data);
        });*/

          $.post("<?php echo STUDENT_LIST; ?>",{ class_id: Editval}, function(data,status){
            //console.log(data);
            var obj = JSON.parse(data);

            //console.log(Editarr);
            //console.log(typeof(Editarr.student_list));
            var Editoptions = "";
            $.each(obj.details.student_list, function(index, obj2){
                //console.log(obj2.name+"-"+obj2.id);
                Editoptions += "<option value='"+obj2.id+"'>"+obj2.name+"</option>";
            });
            console.log(Editoptions);
            $("#student_id").empty();
            $("#student_id").append(Editoptions);
        });
    });

</script>

<script>
document.getElementById('appointment_status').selectedIndex=<?php echo $appointment_detail_get['type']; ?>;
</script>
