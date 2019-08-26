<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Staffs</a></li>
	<li class="active">Teachers</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Teacher</h1>
<!-- end page-header -->



<!-- begin panel -->
<div class="panel panel-inverse" data-sortable-id="form-stuff-1">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Teacher</h4>
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
                            <img src=<?php echo BASE_URL."uploads/teachers/images/profile/".json_decode($teacher_detail['other_details'])->photograph; ?> />
                            <i class="fa fa-user hide"></i>
                        </div>
                        <!-- end profile-image -->
                        <div class="m-b-10">
                           
                            <a class="btn btn-warning btn-block btn-sm"  href="../editstaff/<?php echo $teacher_detail['id'];?>">Edit Profile </a>
                            <!-- <?php echo $this->Html->link('Edit Profile', array("controller"=>"staffs", "action"=>"editstaff",$teacher_detail['id']));?> -->


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
                                                <h4><?php echo $teacher_detail['firstname'].' '.$teacher_detail['lastname'];?> <!-- <small>English</small> --></h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Mobile</td>
                                            <td><i class="fa fa-mobile fa-lg m-r-5"></i><?php echo $teacher_detail['mobile'];?><a href="#" class="m-l-5">Edit</a></td>
                                        </tr>


                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Blood Group</td>
                                            <td><a href="#"><?php echo json_decode($teacher_detail['other_details'])->blood_group;?></a></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                    


                                        <tr>
                                            <td class="field">Gender</td>
                                            <td>
                                                <select class="form-control input-inline input-xs" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female" selected><?php echo json_decode($teacher_detail['other_details'])->gender;?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field">Birthdate</td>
                                            <td>
                                                <select class="form-control input-inline input-xs" name="day">
                                                    <option value="04" selected><?php echo date('d',strtotime(json_decode($teacher_detail['other_details'])->dob));?></option>
                                                </select>
                                                -
                                                <select class="form-control input-inline input-xs" name="month">
                                                    <option value="11" selected><?php echo date('m',strtotime(json_decode($teacher_detail['other_details'])->dob));?></option>
                                                </select>
                                                -
                                                <select class="form-control input-inline input-xs" name="year">
                                                    <option value="1989" selected><?php echo date('Y',strtotime(json_decode($teacher_detail['other_details'])->dob));?></option>
                                                </select>
                                            </td>
                                        </tr>
<!--                                         <tr>
                                            <td class="field">Department</td>
                                            <td>
                                                <select class="form-control input-inline input-xs" name="language">
                                                    <option value="" selected>English</option>
                                                </select>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <td class="field">Genereal/ST/SC/OBC/ECW</td>
                                            <td><?php echo json_decode($teacher_detail['other_details'])->caste;?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Probation</td>
                                            <td><?php echo json_decode($teacher_detail['other_details'])->probation. " Months";?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Contract</td>
                                            <td><?php echo json_decode($teacher_detail['other_details'])->contract;?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Confirmation</td>
                                            <td><?php echo json_decode($teacher_detail['other_details'])->confirmation;?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Qualification</td>
                                            <td> 
                                            <table class="table table-profile">
                                                <thead>
                                                    <tr>
                                                        <th>exam</th>
                                                        <th>board</th>
                                                        <th>year of passing</th>
                                                        <th>percentage</th>
                                     

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach (json_decode($teacher_detail['other_details'])->academic_details_array as $key => $value): ?>
                                                        <tr>
                                                            <td><?php echo $value->exam ;?></td>
                                                            <td><?php echo $value->board ;?></td>
                                                            <td><?php echo $value->year ;?></td>
                                                            <td><?php echo $value->percentage." %" ;?></td>
                                                            
                                                        </tr>
                                                        
                                                    <?php endforeach; ?>


                                                </tbody>
                                                
                                            </table>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="field">Experience Details</td>
                                            <td> 
                                            <table class="table table-profile">
                                                <thead>
                                                    <tr>
                                                        <th>organization</th>
                                                        <th>from</th>
                                                        <th>to</th>
                                                        <th>designation</th>
                                     

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach (json_decode($teacher_detail['other_details'])->experience_details_array as $key => $value): ?>
                                                        <tr>
                                                            <td><?php echo $value->organization ;?></td>
                                                            <td><?php echo $value->from ;?></td>
                                                            <td><?php echo $value->to ;?></td>
                                                            <td><?php echo $value->designation ;?></td>
                                                            
                                                        </tr>
                                                        
                                                    <?php endforeach; ?>


                                                </tbody>
                                                
                                            </table>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="field">Address</td>
                                            <td><?php echo json_decode($teacher_detail['other_details'])->address;?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Date of Joining</td>
                                            <td><?php echo json_decode($teacher_detail['other_details'])->joining_date;?></td>
                                        </tr>
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
                <!-- begin col-6 -->
                <div class="col-md-6">
                    <h4 class="title">Attendance</h4>
                    <!-- begin scrollbar -->
                    <div data-scrollbar="true" data-height="280px" class="bg-white">
                        <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($attendance_detail as $key => $value): ?>
                                            <tr>
                                            <td><?php echo $key; ?></td>
                                            <td> <?php echo $value['present']; ?></td>
                                            <td> <?php echo $value['absent']; ?></td>
                                            <td> <?php echo $value['present']+$value['absent']; ?></td>
                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>
                                </table>
                    </div>
                    <!-- end scrollbar -->
                </div>
                <!-- end col-6 -->
                <!-- begin col-6 -->

            </div>
            <!-- end row -->
            

        </div>
        <!-- end profile-section -->
    </div>
    <!-- end profile-container -->
    </div>
</div>
<!-- end panel -->
