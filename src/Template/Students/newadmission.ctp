<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

// ## for course selection foreach ($course_list as $key => $value) {
    // $course[$value['id']] = $value['course_name'];


?>


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Students & Parents</a></li>
	<li class="active">New Admission</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">New Admission</h1>
<!-- end page-header -->

<form class="form-horizontal" method="post"  enctype='multipart/form-data'  data-parsley-validate="true"  >
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
                <h4 class="panel-title">Student Details</h4>
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
                

                <div class="form-group">
                    <label class="col-md-3 control-label">First Name <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="first_name" data-parsley-required="true" class="form-control" placeholder="First Name"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Last Name  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="last_name" data-parsley-required="true" class="form-control" placeholder="Last Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Blood Group  <i class="fa fa-asterisk text-danger f-s-8"></i> </label>
                    <div class="col-md-9">
                        <select class="form-control" name="blood_group"  placeholder="Select Blood Group">
                            <option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="O+">O+</option>
                            <option value="O-">O-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Gender  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
						<input type="radio" name="gender" value="male">Male<br><input type="radio" name="gender" value="female">Female
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3">Date Of Birth  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" class="form-control" name="dob" data-parsley-required="true"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Photo <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="student_photo" data-parsley-required="true">
                    </div>
                </div>

          <!--  <div class="form-group">
                    <label class="col-md-3 control-label">Mobile  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" data-parsley-type="number" data-parsley-required="true" class="form-control" name="mobile" placeholder="mobile"/>
                    </div>
                </div> -->

           <div class="form-group">
                    <label class="col-md-3 control-label">Aadhar Card Number </label>
                    <div class="col-md-9">
                        <input type="text" data-parsley-type="number"  class="form-control" name="aadhar" placeholder="Aadhar Card Number (do not use any special characters)"/>
                    </div>
                </div>

                       <input type="hidden" class="form-control" name="country" value="Indian"/>
                   

                <div class="form-group">
                    <label class="control-label col-md-3"> Handicap  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <select class="form-control" name="handicap"   data-parsley-required="true">
                            <option selected></option>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                </div>

                 
                        <input type="hidden" value="unmarried" name="marital_status">
                   
				
                <div class="form-group">
                    <label class="control-label col-md-3">General/ST/SC/OBC/ECW<i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <select class="form-control" name="caste"  data-parsley-required="true">
                            <option selected></option>
                            <option value="General">General</option>
                            <option value="ST">ST</option>
                            <option value="SC">SC</option>
                            <option value="OBC">OBC</option>
							<option value="ECW">ECW</option>
                        </select>
                    </div>
                </div>


                
				
		<!--		<div class="form-group">
                    <label class="col-md-3 control-label">Medical History</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="medical_history" />
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-3 control-label">Allergy</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="allergy" />
                    </div>
                </div>

        ##for course selection    <div class="form-group">
                    <label class="col-md-3 control-label">Course <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                         // echo $this->Form->input('course_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$course, "id"=>"course_id"));?>
                        <div id="a"></div>
                    </div>

                </div> -->

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
                <h4 class="panel-title">Address Details</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-md-3 control-label">Address  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <textarea name="address" data-parsley-required="true" class="form-control" placeholder="Address" ></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">City  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="city" data-parsley-required="true" class="form-control"/>
                            
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">State  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <select name="state" data-parsley-required="true" class="form-control">
                            <option value="">------------Select State------------</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Orissa">Orissa</option>
                            <option value="Pondicherry">Pondicherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttaranchal">Uttaranchal</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Pin code  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" data-parsley-type="number" data-parsley-required="true" class="form-control" name="pin code" placeholder="Pin Code"/>
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
                <h4 class="panel-title">Parent's/Guardian Details</h4>
            </div>
            <div class="panel-body">
				<div class="form-group">
                    <label class="col-md-8 control-label"><b><em>It is Mandatory to fill the details of at least one of the Parent! (Name,Email,Home Contact)</em></b></label>
                </div>
				
				<div class="form-group">
                    <label class="col-md-3 control-label"><b> Mother's Details </b></label>
                </div>
				
                <div class="form-group">
                    <label class="col-md-3 control-label"> Name  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="m_name" name="mother_name" placeholder="Mother's Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Contact: Home & Office  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="m_contact"  name="mother_mobile" placeholder="Input Home Contact"/>
						<input type="text" class="form-control"  name="m_office_contact" placeholder="Input Office Contact"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Occupation </label>
                    <div class="col-md-9">
                        <select name="mother_occupation" class="form-control">
                            <option selected></option>
                            <option value="Business">Business</option>
                            <option value="Service">Service</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Workplace  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="m_workplace" placeholder="place of work" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Designation  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="m_designation" placeholder="" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Email  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="m_email"  name="mother_email" data-parsley-type="email" placeholder="Email" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Whether Single Parent  </label>
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" name="single_parent_m" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"><b> Father's Details </b></label>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"> Name  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="f_name" name="father_name" placeholder="Father's Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Contact: Home & Office  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="f_contact" name="father_mobile" placeholder="Input Home Contact"/>
						 <input type="text" class="form-control"  name="f_office_contact" placeholder="Input Office Contact"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Occupation </label>
                    <div class="col-md-9">
                        <select name="father_occupation"  class="form-control">
                            <option selected></option>
                            <option value="Business">Business</option>
                            <option value="Service">Service</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Workplace  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="f_workplace" placeholder="place of work" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Designation  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="f_designation" placeholder="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"> Email  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="f_email" name="father_email" data-parsley-type="email" placeholder="Email" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Whether Single Parent  </label>
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" name="single_parent_f" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"><b> Guardian Details </b></label>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"> Name  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="guardian_name" placeholder="Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Contact </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="guardian_mobile" placeholder="Mobile"/>
                    </div>
                </div>
				
                <div class="form-group">
                    <label class="col-md-3 control-label"> Email  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="guardian_email" data-parsley-type="email" placeholder="Email"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Address  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="guardian-address"  placeholder="Address"/>
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
                <h4 class="panel-title">Admission Details</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-md-3 control-label">Class | Section <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, "id"=>"class_id"));?>
                        <div id="a"></div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Fee Exempted On</label>
                    <div class="col-md-9">
                        <select class="form-control" name="fee_exemption" >
                            <option selected></option>
                            <option value="No">No Exemption</option>
                            <option value="Tution Fee">Tution Fee</option>
                            <option value="Computer">Computer</option>
                            <option value="Publication">Publication</option>
                            <option value="Annual Charges">Annual Charges</option>
                            <option value="Transport">Transport</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Exempted Amount</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="exempted_amount" value ="0" placeholder="0"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Exemption Reason</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="exemption_reason"  placeholder="Reason for Exemption"></textarea>
                    </div>
                </div>
				
                <div class="form-group">
                    <label class="col-md-3 control-label">Birth Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="birth_certificate">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">General/ST/SC/OBC/ECW Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="caste_certificate">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Transfer Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="transfer_certificate">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Others </label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="academic_qualification"  >
                    </div>
                </div>

         <!--     <div class="form-group">
                    <label class="col-md-3 control-label">Character Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="character_certificate">
                    </div>
                </div> -->

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
                <h4 class="panel-title">Remarks</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Appointment Date</label>
                    <div class="col-md-9">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" name="joining_date" class="form-control"  data-parsley-required="true"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Admission Number</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="admission_no"  data-parsley-required="true"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Special Remarks About Student</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="special_remarks"  data-parsley-required="true"></textarea>
                    </div>
                </div>
				<div class="form-group">	
                <label class="col-md-3 control-label"></label>
                    <div class="col-md-9">
                        <a class="btn btn-warning" href="#modal-dialog" id="submit_save" data-toggle="modal">Save</a>
                    </div>
					
                </div>
				<!-- #modal-dialog -->
				<div class="modal fade" id="modal-dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">New Admission</h4>
							</div>
							<div class="modal-body" >
							<div class="" id="modal_body">
							<p>
								Are you sure you want to proceed?</p>
							</div>
							</div>
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-warning" id="submit_button" name="Save" value="Proceed" disabled>Proceed</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end Modal -->
            </div>

        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->

</div>
</form>


