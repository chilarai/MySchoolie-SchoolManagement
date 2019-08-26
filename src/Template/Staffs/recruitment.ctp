<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Staffs</a></li>
    <li class="active">Teachers</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Teachers</h1>
<!-- end page-header -->

<form class="form-horizontal"  method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
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
                <h4 class="panel-title">Teachers</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">First Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" data-parsley-required="true"  name="first_name" placeholder="First Name">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Last Name </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="last_name" placeholder="Last Name">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Spouse Name </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="spouse_name" placeholder="Spouse Name">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Spouse Occupation </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"   name="spouse_occupation" placeholder="Spouse Occupation ">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Mobile  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" data-parsley-type="number" data-parsley-required="true" class="form-control" name="mobile" placeholder="mobile"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Email  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" data-parsley-required="true" name="email" data-parsley-type="email" placeholder="Email" placeholder="Email"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Address  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="address" data-parsley-type="text" placeholder="Address" placeholder="Address"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Blood Group <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <select class="form-control" name="blood_group"  data-parsley-required="true"  placeholder="Select Blood Group">
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
							<option value="A+">A+</option>
                            <option value="A-">A-</option>
							<option value="B+">B+</option>
                            <option value="B-">B-</option>
							<option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Gender <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="radio" name="gender" value="male">Male<br><input type="radio" name="gender" value="female">Female
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Date Of Birth <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" name="dob" data-parsley-required="true"  class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-3">  General/ST/SC/OBC/ECW  </label>
                    <div class="col-md-9">
                        <select class="form-control" name="caste" >
                            <option selected></option>
                            <option value="General">General</option>
                            <option value="ST">ST</option>
                            <option value="SC">SC</option>
                            <option value="OBC">OBC</option>
                            <option value="ECW">ECW</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Father's Name  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="father_name" data-parsley-type="text" placeholder="Father's name" placeholder="Father's Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Mother's Name  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="mother_name" data-parsley-type="text" placeholder="Mohter's name" placeholder="Mother's Name"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Recruitment Type <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <select class="form-control" data-parsley-required="true"  name="user_type_id">
                            <option value="4">Teacher</option>
                            <option value="7">Admin Staff</option>
                        </select>
                    </div>
                </div>



            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->

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
                <h4 class="panel-title">Academic Details</h4>
            </div>
            <div class="panel-body">

            

                <table class="table">
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Board</th>
                            <th>Year</th>
                            <th>Percentage</th>
                            <th>Pass Certificate<th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="exam_1" ></td>
                            <td><input type="text" class="form-control" name="board_1" ></td>
                            <td><input type="text" class="form-control input-group date" name="year_1"  data-parsley-type="number"></td>
                            <td><input type="text" class="form-control" name="percentage_1"  data-parsley-type="number"></td>
                            <td><input type="file" class="form-control" name="file_1" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="exam_2" ></td>
                            <td><input type="text" class="form-control" name="board_2" ></td>
                            <td><input type="text" class="form-control input-group date" name="year_2" data-parsley-type="number"></td>
                            <td><input type="text" class="form-control" name="percentage_2" data-parsley-type="number"></td>
                            <td><input type="file" class="form-control" name="file_2" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="exam_3" ></td>
                            <td><input type="text" class="form-control" name="board_3" ></td>
                            <td><input type="text" class="form-control input-group date" name="year_3"></td>
                            <td><input type="text" class="form-control" name="percentage_3" data-parsley-type="number"></td>
                            <td><input type="file" class="form-control" name="file_3" ></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="exam_4"></td>
                            <td><input type="text" class="form-control" name="board_4"></td>
                            <td><input type="text" class="form-control input-group date" name="year_4"></td>
                            <td><input type="text" class="form-control" name="percentage_4" data-parsley-type="number"></td>
                            <td><input type="file" class="form-control" name="file_4"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="exam_5"></td>
                            <td><input type="text" class="form-control" name="board_5"></td>
                            <td><input type="text" class="form-control input-group date" name="year_5"></td>
                            <td><input type="text" class="form-control" name="percentage_5" data-parsley-type="number"></td>
                            <td><input type="file" class="form-control" name="file_5"></td>
                        </tr>
                    </tbody>    

                </table>

                
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


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
                <h4 class="panel-title">Experience Details</h4>
            </div>
            <div class="panel-body">

            

                <table class="table">
                    <thead>
                        <tr>
                            <th>Organization</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Designation</th>
                            <th>Description<th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="org_1" ></td>
                            <td><input type="text" class="form-control input-group date" name="from_1" ></td>
                            <td><input type="text" class="form-control input-group date" name="to_1"  ></td>
                            <td><input type="text" class="form-control" name="desg_1"  data-parsley-type="text"></td>
                            <td><input type="text" class="form-control" name="desc_1"  data-parsley-type="text"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="org_2" ></td>
                            <td><input type="text" class="form-control input-group date" name="from_2" ></td>
                            <td><input type="text" class="form-control input-group date" name="to_2"  ></td>
                            <td><input type="text" class="form-control" name="desg_2"  data-parsley-type="text"></td>
                            <td><input type="text" class="form-control" name="desc_2"  data-parsley-type="text"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="org_3"></td>
                            <td><input type="text" class="form-control input-group date" name="from_3"></td>
                            <td><input type="text" class="form-control input-group date" name="to_3"  ></td>
                            <td><input type="text" class="form-control" name="desg_3"  data-parsley-type="text"></td>
                            <td><input type="text" class="form-control" name="desc_3"  data-parsley-type="text"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="org_4"></td>
                            <td><input type="text" class="form-control input-group date" name="from_4"></td>
                            <td><input type="text" class="form-control input-group date" name="to_4" data-parsley-type="number"></td>
                            <td><input type="text" class="form-control" name="desg_4" data-parsley-type="text"></td>
                            <td><input type="text" class="form-control" name="desc_4" data-parsley-type="text"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="org_5"></td>
                            <td><input type="text" class="form-control input-group date" name="from_5"></td>
                            <td><input type="text" class="form-control input-group date" name="to_5" data-parsley-type="number"></td>
                            <td><input type="text" class="form-control" name="desg_5" data-parsley-type="text"></td>
                            <td><input type="text" class="form-control" name="desc_5" data-parsley-type="text"></td>
                        </tr>
                    </tbody>    

                </table>

                
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->

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
                <h4 class="panel-title">Recruitment Details</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="control-label col-md-3">Applied For </label>
                    <div class="col-md-9">
                        
						<input type="radio" name="applied_for" value="TGT">TGT<br><input type="radio" name="applied_for" value="PGT">PGT
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Vacancy Name </label>
                    <div class="col-md-9">
                        <select class="form-control" name="vacancy_id"  >
                            <?php foreach ($vacancy_detail as $key => $value) {
                                    echo "<option value =".$value['id'].">" . $value['course_name']." | ".$value['employment_type']."</option>";
                                
                                } 

                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Approved Grade </label>
                    <div class="col-md-9">
                        <select class="form-control" name="salary_structure_id"  >
                            <?php foreach ($salary_structure_details as $key => $value) {
                                    echo "<option value =".$value['salary_structure_id'].">" . $value['grade']."</option>";
                                
                                } 

                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Contract </label>
                    <div class="col-md-9">
                        
							<input type="radio" name="contract" value="yes">Yes<br><input type="radio" name="contract" value="no">No
                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Probation </label>
                    <div class="col-md-9">
                        <select class="form-control" name="probation"   placeholder="Months">
                            <option></option>
                            <?php for ($i=1;$i<=24;$i++): ?>
                            	<option value=<?php echo $i.">".$i." Month"; ?></option>                            	
                            <?php endfor; ?>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Confirmation </label>
                    <div class="col-md-9">
                        <textarea name="confirmation" class="form-control" placeholder="Confirmation" ></textarea>
                    </div>
                </div>





                <div class="form-group">
                    <label class="control-label col-md-3">Joining Date </label>
                    <div class="col-md-9">
                        <div class="input-group date"   id="datetimepicker1">
                            <input type="text" class="form-control" name="joining_date"   >
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

           <!-- <div class="form-group">
                    <label class="col-md-3 control-label">Birth Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="birth_certificate">
                    </div>
                </div>  -->

                <div class="form-group">
                    <label class="col-md-3 control-label">SC/ST/OBC/ECW Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="caste_certificate">
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">Marksheet</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="marksheet">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Resume</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="resume">
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
								<h4 class="modal-title">New Recruitment</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to proceed?
							</div>
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
								<input type="submit" class="btn btn-warning" name="Save" value="Proceed"/>
							</div>
						</div>
					</div>
				</div>
				<!-- end Modal -->

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
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->
</form>

