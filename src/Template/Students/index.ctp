<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

foreach ($studentlist['details']['student_list'] as $key => $value) {
	$student[$value['id']]=$value['name']." | ".$value['class_section'];
}

?>



<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Students & Parents</a></li>
	<li class="active">Students</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Students</h1>
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
                <h4 class="panel-title">Search</h4>
            </div>
            <div class="panel-body">
            <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','class'=>'form-horizontal']);?>
                    
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Student</label>
                        <div class="col-md-9">
                       <?php echo $this->Form->input('student_id', array('type'=>'select','class'=>'form-control, select2','style'=>'width:100%;','label'=>false, 'options'=>$student, "id"=>"student_id"));?>
                        </div>
                    </div>
					
					<!-- <div class="form-group"> -->
                        <!-- <label class="col-md-3 control-label">Class | Section</label> -->
                        <!-- <div class="col-md-9"> -->
                            <!-- <?php //echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, "id"=>"class_id"));?> -->
                            <!-- <div id="a"></div> -->
                        <!-- </div> -->

                    <!-- </div> -->

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn btn-warning">View</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
    
</div>

<?php if(isset($student_details)): ?>
<!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Student</h4>
            </div>
            <div class="panel-body">
                <!-- begin profile-container -->
            <div class="profile-container">
                <!-- begin profile-section -->
                <div class="profile-section">
                    <!-- begin profile-left -->
                    <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image">
                            <img src=<?php echo BASE_URL."uploads/students/images/student_photo/"  .json_decode($student_details['student_details_json'])->picture_link; ?> />
                            <i class="fa fa-user hide"></i>
                        </div>
                        <!-- end profile-image -->
                        <div class="m-b-10">
                            <a href="<?php echo BASE_URL;?>students/editstudent/<?php echo $student_details['id']; ?>" class="btn btn-warning btn-block btn-sm">Edit Student Profile</a>
                        </div>
                        
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <h4><?php echo $student_details['student_name'];?>
                                                <small><?php echo $student_details['class'];?> <?php echo $student_details['section'];?></small></h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field">Roll No</td>
                                            <td><a href="#"><?php echo $student_details['roll_no'];?></a></td>
                                        </tr>
                                       <!--  <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Mobile</td>
                                            <td><i class="fa fa-mobile fa-lg m-r-5"></i> <?php //echo $student_details['parent_mobile'];?> <a href="#" class="m-l-5">Edit</a></td>
                                        </tr> -->
                                        <!--<tr>
                                            <td class="field">ID Card</td>
                                            <td><a href="#">SJS <?php// echo $student_details['roll_no'];?></a></td>
                                        </tr>

                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>-->
                                        <tr class="highlight">
                                            <td class="field">Blood Group</td>
                                            <td><a href="#"><?php echo json_decode($student_details['student_details_json'])->blood_group;?></a></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="field">City</td>
                                            <td><?php echo json_decode($student_details['student_details_json'])->city;?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">State</td>
                                            <td><?php echo json_decode($student_details['student_details_json'])->state;?></td>
                                        </tr>

                                        <tr>
                                            <td class="field">Gender</td>
                                            <td>
												
                                                
                                                <?php if($student_details['gender'] == 'female'): ?>
                                                    Female
                                                <?php else: ?>
                                                    Male
                                                <?php endif; ?>                                                 
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field">Birthdate</td>
                                            <td>
                                                
                                                   <?php echo date('d',strtotime($student_details['birthdate']));?>
                                                -
                                                <?php echo date('m',strtotime($student_details['birthdate']));?>
                                                -
                                               <?php echo date('Y',strtotime($student_details['birthdate']));?>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="field">Language</td>
                                            <td>
                                                <select class="form-control input-inline input-xs" name="language">
                                                    <option value="" selected>English</option>
                                                </select>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!-- end profile-right -->
                </div>
                <!-- end profile-section -->
                <!-- begin profile-section -->
                <div class="profile-section">
                    <!-- begin row -->
                    <div class="row">
                        <!-- begin col-4 -->
                        <div class="col-md-4">
                            <h4 class="title">Parent/Guardian Information</h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="160px" class="bg-white">
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if (!empty ($details_json['mother_name'])):?>
										<tr>
                                            <td>Mother<td>
                                            <td><?php echo $details_json['mother_name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Occupation<td>
                                            <td><?php echo $details_json['mother_occupation'];?></td>
                                        </tr>
                                        <tr>
                                            <td>E-Mail<td>
                                            <td><?php echo $details_json['mother_email'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Address<td>
                                            <td><?php echo json_decode($student_details['student_details_json'])->address;?> , <?php echo json_decode($student_details['student_details_json'])->city;?> , <?php echo json_decode($student_details['student_details_json'])->state;?></td>
                                        </tr>
									<?php endif;?>
									<?php if (empty ($details_json['mother_name']) AND !empty ($details_json['father_occupation'])): ?>
                                        <tr>
                                            <td>Father<td>
                                            <td><?php echo $details_json['father_name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Occupation<td>
                                            <td><?php echo json_decode($details_json['father_occupation']);?></td>
                                        </tr>
                                        <tr>
                                            <td>E-Mail<td>
                                            <td><?php echo $details_json['father_email'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Address<td>
                                            <td><?php echo json_decode($student_details['student_details_json'])->address;?> , <?php echo json_decode($student_details['student_details_json'])->city;?> , <?php echo json_decode($student_details['student_details_json'])->state;?></td>
                                        </tr>
                                    <?php endif;?>    
                                    </tbody>
                                </table>
                            </div>
                            <!-- end scrollbar -->
                        </div>
                        <!-- end col-4 -->
                        <!-- begin col-4 -->
                        <div class="col-md-4">
                            <h4 class="title">Attendance</h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="160px" class="bg-white">
                                <!-- begin table -->
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Days Present</th>
											<th>Days Absent</th>
											<th>Total Days</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            if(!empty($attendance_detail)){



                                                foreach ($attendance_detail as $key => $value) {
                                                //pr($value);
                                                    echo "<tr> <td>".$key."</td>
																<td>".$value['present']."</td>
																<td>".$value['absent']."</td>
                                                               <td>".$workingdays[$key]."</td>
                                                         </tr>";
                                            
                                                }
                                            }
                                            else{
                                                $x=0;
                                                while($x < 11){
                                                   echo "<tr> <td> No Records Found</td>
                                                               <td>NA</td>
                                                         </tr>"; $x++;
                                                    }   
                                            }

                                        ?>

                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                            <!-- end scrollbar -->
                        </div>
                        <!-- end col-4 -->
                        <!-- begin col-4 -->
                        <div class="col-md-4">
                            <h4 class="title">Fee History</h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="160px" class="bg-white">
								<!-- begin table -->
								<table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Fee Cycle</th>
											<th>Amount</th>
                                            <th>Status</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 

                                            if(!empty($student_detail_fee_status)){



                                                foreach ($student_detail_fee_status as $key => $value) {
                                                //pr($value);
                                                    echo "<tr> <td>".$value['cycle_name']."</td>
																<td></td>
                                                               <td>".$value['status']."<br/>".date('d/m/y', strtotime($value['datetime']))."</td>
                                                         </tr>";
                                            
                                                }
                                            }
                                            else{
                                                $x=0;
                                                while($x < 4){
                                                   echo "<tr> <td> No Records Found</td>
                                                               <td>NA</td>
															   <td>NA</td>
                                                         </tr>"; $x++;
                                                    }   
                                            }

                                        ?>
									</tbody>
								</table>
								<!-- end table -->
							
							
							
							
                                <!-- begin todolist --
                                <ul class="todolist">
                                    <li class="active">
                                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">Jan 2017</div>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">Feb 2017</div>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">Mar 2017</div>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">Apr 2017</div>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">May 2017</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">Jun 2017</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">Jul 2017</div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- end todolist -->
                            </div>
                            <!-- end scrollbar -->
                        </div>
                        <!-- end col-4 -->
                    </div>
                    <!-- end row -->
                    <!-- begin col-4 -->
                        <div class="col-md-12" style="padding-top:15px;">
                            <h4 class="title">Anecdotes</h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="160px" class="bg-white">
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Anecdote</th>
											<th></th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($anecdotes_list as $key => $value): ?>
                                        <tr>
                                            <td><?php echo date('d/m/y', strtotime($value['created_date']));?><td>
                                            <td><?php echo $value['anecdote'];?></td>
											<td><a class="btn btn-warning" href="#modal-dialog<?php echo $value['id'];?>" data-toggle="modal">Delete</a></td>
											<td><a class="btn btn-warning" href="<?php echo BASE_URL;?>students/editanecdote/<?php echo $value['id'];?>" data-toggle="modal">Edit</a></td>
                                        </tr>
                                    <?php endforeach; ?>   
                                        
                                    </tbody>
                                </table>
                            </div>
							<?php foreach ($anecdotes_list as $key => $value): ?>
							<!-- #modal-dialog -->
							<div class="modal fade" id="modal-dialog<?php echo $value['id'];?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Delete Anecdote</h4>
										</div>
										<div class="modal-body">
											Are you sure you want to delete the Anecdote?
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="<?php echo BASE_URL;?>students/deleteanecdote/<?php echo $value['id'];?>" class="btn btn-sm btn-success">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<!-- end Modal -->
							<!-- #modal-dialogedit -->
							<div class="modal fade" id="modal-dialogedit<?php echo $value['id'];?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title">Edit Anecdote</h4>
										</div>
										<div class="modal-body">
											Are you sure you want to Edit the Anecdote?
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
											<a href="<?php echo BASE_URL;?>students/editanecdote/<?php echo $value['id'];?>" class="btn btn-sm btn-success">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<!-- end Modal -->
							<?php endforeach; ?>
							
                            <!-- end scrollbar -->
                        </div>
						<!--end col-md-12-->
                    <!-- begin row --
                <div class="row row-space-8">
                        !-- begin col-4 --
                        <div class="col-md-4">
                            <h4 class="title">Leaves</h4>
                            !-- begin scrollbar --
                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
                                !-- begin todolist --
                                ?php foreach ($leave_details as $key => $value): ?>
                                <ul class="todolist">
                                    <li active>
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">?php echo date('l, d F Y',strtotime($value['leaves_start'])).', '.
                                                $value['reason'];    ; ?>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                ?php endforeach ; ?>
                                !-- end todolist --
                            </div>
                            !-- end scrollbar --
                        </div>
                        !-- end col-4 --

                        !-- begin col-4 --
                        <div class="col-md-4">
                            <h4 class="title">Feedback</h4>
                            !-- begin scrollbar --
                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
                                !-- begin todolist --
                                ?php foreach ($notice_details as $key => $value): ?>
                                <ul class="todolist">
                                    <li active>
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">?php echo date('l, d F Y',strtotime($value['date'])).', '.
                                                $value['heading'];    ; ?>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                ?php endforeach ; ?>
                                !-- end todolist --
                            </div>
                            !-- end scrollbar --
                        </div>
                        <!-- end col-4 --

                        <!-- begin col-4 --
                        <div class="col-md-4">
                            <h4 class="title">Homework</h4>
                            <!-- begin scrollbar --
                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
                                <!-- begin todolist --
                                ?php foreach ($assignment_details as $key => $value): ?>
                                <ul class="todolist">
                                    <li active>
                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                            <div class="todolist-title">?php echo date('l, d F Y',strtotime($value['date'])).', '.
                                                $value['subject'].' Homework';    ; ?>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                ?php endforeach ; ?>
                                <!-- end todolist --
                            </div>
                            !-- end scrollbar --
                        </div>
                        !-- end col-4 --
                    </div>
					-->
                </div>
                <!-- end profile-section -->
            </div>
            <!-- end profile-container -->
            </div>
        </div>
        <!-- end panel -->
        <?php endif; ?>     
<script>
    
    $("#class_id").change(function(){
        var newval = $("#class_id").val();
       /* $.post("<?php echo ALL_STUDENT_LIST; ?>",{"class_id":newval}, function(data,status){
            $("a").text(data);
        });*/

          $.post("<?php echo STUDENT_LIST; ?>",{ class_id: newval}, function(data,status){
            //console.log(data);
            var obj = JSON.parse(data);

            //console.log(newarr);
            //console.log(typeof(newarr.student_list));
            var newoptions = "";
            $.each(obj.details.student_list, function(index, obj2){
                //console.log(obj2.name+"-"+obj2.id);
                newoptions += "<option value='"+obj2.id+"'>"+obj2.name+"</option>";
            });
            console.log(newoptions);
            $("#student_id").empty();
            $("#student_id").append(newoptions);
        });
    });

</script>

