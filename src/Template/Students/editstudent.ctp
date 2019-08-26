<?php
foreach ($classlist['details']['class_list'] as $key => $value) {
  $class[$value['id']]=$value['class']." ".$value['section'];
}

// foreach ($course_list as $key => $value) {
    // $course[$value['id']] = $value['course_name'];

$Defaultselectiongender = $student_details['gender_type'];

$Defaultselectionblood = $details_json['blood_group'];

$Defaultselectionstate = $details_json['state'];
$Defaultselectioncaste = $details_json['caste'];
$Defaultselectionhandicap = $student_details['handicap'];

$Defaultselectionfocc = $details_json['father_occupation'];
$Defaultselectionmocc = $details_json['mother_occupation'];
$Defaultselectionfee = $details_json['fee_exemption'];

?>


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Home</a></li>
	<li><a href="javascript:;">Students & Parents</a></li>
	<li class="active">Students</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Student Details</h1>
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
                        <input type="text" name="first_name" data-parsley-required="true" class="form-control" placeholder="First Name" value="<?php echo $student_details['first_name']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Last Name </label>
                    <div class="col-md-9">
                        <input type="text" name="last_name"  class="form-control" placeholder="Last Name" value="<?php echo $student_details['last_name']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Blood Group  <i class="fa fa-asterisk text-danger f-s-8"></i> </label>
                    <div class="col-md-9">
                        <select class="form-control" name="blood_group"  placeholder="Select Blood Group">
                            <option value="A+" <?php echo ($Defaultselectionblood == 'A+')?"selected":""; ?>>A+</option>
							<option value="A-" <?php echo ($Defaultselectionblood == 'A-')?"selected":""; ?>>A-</option>
							<option value="B+" <?php echo ($Defaultselectionblood == 'B+')?"selected":""; ?>>B+</option>
							<option value="B-" <?php echo ($Defaultselectionblood == 'B-')?"selected":""; ?>>B-</option>
							<option value="O+" <?php echo ($Defaultselectionblood == 'O+')?"selected":""; ?>>O+</option>
                            <option value="O-" <?php echo ($Defaultselectionblood == 'O-')?"selected":""; ?>>O-</option>
							<option value="AB+" <?php echo ($Defaultselectionblood == 'AB+')?"selected":""; ?>>AB+</option>
							<option value="AB-" <?php echo ($Defaultselectionblood == 'AB-')?"selected":""; ?>>AB-</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Gender  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
						<input type="radio" name="gender" value="male" <?php if($student_details['gender_type'] == male){echo "checked";}?>>Male<br><input type="radio" name="gender" value="female" <?php if($student_details['gender_type'] == female){echo "checked";}?>>Female
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3">Date Of Birth  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" class="form-control" name="dob" data-parsley-required="true" value="<?php echo $student_details['birthday']; ?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Photo</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="student_photo" />
                    </div>
                </div>
				 <div class="form-group">
                    <label class="col-md-3 control-label"> Photo</label>
                    <div class="col-md-3">
				<img src="<?php echo BASE_URL."uploads/students/images/student_photo/".$details_json['picture_link']; ?>" width="100px;" height="150px;"/>
				</div>
				</div>
				
				
           <!-- <div class="form-group">
                    <label class="col-md-3 control-label">Mobile  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" data-parsley-type="number" data-parsley-required="true" class="form-control" name="mobile" placeholder="mobile" value=" echo $student_details['mobile']; ?>"/>
                    </div>
                </div> -->

                <div class="form-group">
                    <label class="col-md-3 control-label">Aadhar Card Number </label>
                    <div class="col-md-9">
                        <input type="text"  class="form-control" name="aadhar" placeholder="Aadhar Card No" value="<?php echo $student_details['aadhar_card']; ?>"/>
                    </div>
                </div>

                
                        <input type="hidden"  class="form-control" name="country" value="Indian"/>
                    
                <div class="form-group">
                    <label class="control-label col-md-3"> Handicap  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <select class="form-control" name="handicap"   data-parsley-required="true">
                            <option selected></option>
                            <option value="no" <?php echo ($Defaultselectionhandicap == 'no')?"selected":""; ?>>No</option>
                            <option value="yes" <?php echo ($Defaultselectionhandicap == 'yes')?"selected":""; ?>>Yes</option>
                        </select>
                    </div>
                </div>

               
                        <input type="hidden" value="unmarried" name="marital_status">
                   

                <div class="form-group">
                    <label class="control-label col-md-3">General/ST/SC/OBC/ECW</label>
                    <div class="col-md-9">
                        <select class="form-control" name="caste"  >
                            <option selected></option>
                            <option value="General" <?php echo ($Defaultselectioncaste == 'General')?"selected":""; ?>>General</option>
                            <option value="ST" <?php echo ($Defaultselectioncaste == 'ST')?"selected":""; ?>>ST</option>
                            <option value="SC" <?php echo ($Defaultselectioncaste == 'SC')?"selected":""; ?>>SC</option>
                            <option value="OBC" <?php echo ($Defaultselectioncaste == 'OBC')?"selected":""; ?>>OBC</option>
							<option value="ECW" <?php echo ($Defaultselectioncaste == 'ECW')?"selected":""; ?>>ECW</option>
                        </select>
                    </div>
                </div>


                
				
		<!--		<div class="form-group">
                    <label class="col-md-3 control-label">Medical History</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="medical_history" value="<?php //echo $details_json['medical_history']; ?>" />
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-3 control-label">Allergy</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="allergy" value="<?php //echo $details_json['allergy']; ?>" />
                    </div>
                </div>

            <div class="form-group"> ##course selection
                    <label class="col-md-3 control-label">Course <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
						echo $this->Form->input('course_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$course, 'default'=>$student_details['course_id']));?>
                        <div id="a"></div>
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
                        <textarea name="address" data-parsley-required="true" class="form-control" placeholder="Address" ><?php echo $details_json['address']; ?></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">City  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" name="city" data-parsley-required="true" class="form-control" value="<?php echo $details_json['city']; ?>"/>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">State  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <select name="state" data-parsley-required="true" class="form-control">
                            <option value="" <?php echo ($Defaultselectionstate == '')?"selected":""; ?>>------------Select State------------</option>
                            <option value="Andaman and Nicobar Islands" <?php echo ($Defaultselectionstate == 'Andaman and Nicobar Islands')?"selected":""; ?>>Andaman and Nicobar Islands</option>
                            <option value="Andhra Pradesh" <?php echo ($Defaultselectionstate == 'Andhra Pradesh')?"selected":""; ?>>Andhra Pradesh</option>
                            <option value="Arunachal Pradesh"<?php echo ($Defaultselectionstate == 'Arunachal Pradesh')?"selected":""; ?>>Arunachal Pradesh</option>
                            <option value="Assam" <?php echo ($Defaultselectionstate == 'Assam')?"selected":""; ?>>Assam</option>
                            <option value="Bihar" <?php echo ($Defaultselectionstate == 'Bihar')?"selected":""; ?>>Bihar</option>
                            <option value="Chandigarh" <?php echo ($Defaultselectionstate == 'Chandigarh')?"selected":""; ?>>Chandigarh</option>
                            <option value="Chhattisgarh" <?php echo ($Defaultselectionstate == 'Chhattisgarh')?"selected":""; ?>>Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli" <?php echo ($Defaultselectionstate == 'Dadra and Nagar Haveli')?"selected":""; ?>>Dadra and Nagar Haveli</option>
                            <option value="Daman and Diu" <?php echo ($Defaultselectionstate == 'Daman and Diu')?"selected":""; ?>>Daman and Diu</option>
                            <option value="Delhi" <?php echo ($Defaultselectionstate == 'Delhi')?"selected":""; ?>>Delhi</option>
                            <option value="Goa" <?php echo ($Defaultselectionstate == 'Goa')?"selected":""; ?>>Goa</option>
                            <option value="Gujarat" <?php echo ($Defaultselectionstate == 'Gujarat')?"selected":""; ?>>Gujarat</option>
                            <option value="Haryana"<?php echo ($Defaultselectionstate == 'Haryana')?"selected":""; ?>>Haryana</option>
                            <option value="Himachal Pradesh" <?php echo ($Defaultselectionstate == 'Himachal Pradesh')?"selected":""; ?>>Himachal Pradesh</option>
                            <option value="Jammu and Kashmir" <?php echo ($Defaultselectionstate == 'Jammu and Kashmir')?"selected":""; ?>>Jammu and Kashmir</option>
                            <option value="Jharkhand" <?php echo ($Defaultselectionstate == 'Jharkhand')?"selected":""; ?>>Jharkhand</option>
                            <option value="Karnataka" <?php echo ($Defaultselectionstate == 'Karnataka')?"selected":""; ?>>Karnataka</option>
                            <option value="Kerala"<?php echo ($Defaultselectionstate == 'Kerala')?"selected":""; ?>>Kerala</option>
                            <option value="Lakshadweep" <?php echo ($Defaultselectionstate == 'Lakshadweep')?"selected":""; ?>>Lakshadweep</option>
                            <option value="Madhya Pradesh" <?php echo ($Defaultselectionstate == 'Madhya Pradesh')?"selected":""; ?>>Madhya Pradesh</option>
                            <option value="Maharashtra" <?php echo ($Defaultselectionstate == 'Maharashtra')?"selected":""; ?>>Maharashtra</option>
                            <option value="Manipur" <?php echo ($Defaultselectionstate == 'Manipur')?"selected":""; ?>>Manipur</option>
                            <option value="Meghalaya" <?php echo ($Defaultselectionstate == 'Meghalaya')?"selected":""; ?>>Meghalaya</option>
                            <option value="Mizoram" <?php echo ($Defaultselectionstate == 'Mizoram')?"selected":""; ?>>Mizoram</option>
                            <option value="Nagaland" <?php echo ($Defaultselectionstate == 'Nagaland')?"selected":""; ?>>Nagaland</option>
                            <option value="Orissa" <?php echo ($Defaultselectionstate == 'Orissa')?"selected":""; ?>>Orissa</option>
                            <option value="Pondicherry"<?php echo ($Defaultselectionstate == 'Pondicherry')?"selected":""; ?>>Pondicherry</option>
                            <option value="Punjab" <?php echo ($Defaultselectionstate == 'Punjab')?"selected":""; ?>>Punjab</option>
                            <option value="Rajasthan" <?php echo ($Defaultselectionstate == 'Rajasthan')?"selected":""; ?>>Rajasthan</option>
                            <option value="Sikkim" <?php echo ($Defaultselectionstate == 'Sikkim')?"selected":""; ?>>Sikkim</option>
                            <option value="Tamil Nadu"<?php echo ($Defaultselectionstate == 'Tamil Nadu')?"selected":""; ?>>Tamil Nadu</option>
                            <option value="Tripura" <?php echo ($Defaultselectionstate == 'Tripura')?"selected":""; ?>>Tripura</option>
                            <option value="Uttaranchal" <?php echo ($Defaultselectionstate == 'Uttaranchal')?"selected":""; ?>>Uttaranchal</option>
                            <option value="Uttar Pradesh" <?php echo ($Defaultselectionstate == 'Uttar Pradesh')?"selected":""; ?>>Uttar Pradesh</option>
                            <option value="West Bengal" <?php echo ($Defaultselectionstate == 'West Bengal')?"selected":""; ?>>West Bengal</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Pin code  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
                    <div class="col-md-9">
                        <input type="text" data-parsley-type="number" data-parsley-required="true" class="form-control" value="<?php echo $details_json['pin_code']; ?>" name="pin code" placeholder="Pin Code"/>
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
                    <label class="col-md-6 control-label"><b><em>It is Mandatory to fill the details of at least one of the Parent!</em></b></label>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"><b> Mother's Details </b></label>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Name  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="m_name" data-parsley-required="true" name="mother_name" value="<?php echo $details_json['mother_name']; ?>" placeholder="Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Contact: Home & Office </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="m_contact" name="mother_mobile" value="<?php echo $details_json['mother_mobile']; ?>" placeholder="Input Home Contact"/>
						<input type="text" class="form-control" value="<?php echo $details_json['m_office_contact']; ?>" name="m_office_contact" placeholder="Input Office Contact"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Occupation </label>
                    <div class="col-md-9">
                        <select name="mother_occupation"  class="form-control">
                            <option selected></option>
                            <option value="Business" <?php echo ($Defaultselectionmocc == 'Business')?"selected":""; ?>>Business</option>
                            <option value="Service"<?php echo ($Defaultselectionmocc == 'Service')?"selected":""; ?>>Service</option>
                            <option value="Others" <?php echo ($Defaultselectionmocc == 'Others')?"selected":""; ?>>Others</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Workplace  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $details_json['m_workplace']; ?>" name="m_workplace" placeholder="place of work" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Designation  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $details_json['m_designation']; ?>" name="m_designation" placeholder="" />
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-3 control-label"> Email  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="m_email"  name="mother_email" data-parsley-type="email" placeholder="Email" value="<?php echo $details_json['mother_email']; ?>"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Whether Single Parent  </label>
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" name="single_parent_m" <?php if($details_json['single_parent_m'] == on){ echo "checked"; }?>/>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-3 control-label"><b> Father's Details </b></label>
                </div>
				
                <div class="form-group">
                    <label class="col-md-3 control-label"> Name </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="f_name" name="father_name" placeholder="Name" value="<?php echo $details_json['father_name']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Contact: Home & Office  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="f_contact" name="father_mobile" value="<?php echo $details_json['father_mobile']; ?>" placeholder="Input Home Contact"/>
						<input type="text" class="form-control" value="<?php echo $details_json['f_office_contact']; ?>" name="m_office_contact" placeholder="Input Office Contact"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Occupation </label>
                    <div class="col-md-9">
                        <select name="father_occupation"  class="form-control">
                            <option selected></option>
                            <option value="Business" <?php echo ($Defaultselectionfocc == 'Business')?"selected":""; ?>>Business</option>
                            <option value="Service" <?php echo ($Defaultselectionfocc == 'Service')?"selected":""; ?>>Service</option>
                            <option value="Others" <?php echo ($Defaultselectionfocc == 'Others')?"selected":""; ?>>Others</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Workplace  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $details_json['f_workplace']; ?>" name="f_workplace" placeholder="place of work" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Designation  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $details_json['f_designation']; ?>" name="f_designation" placeholder="" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Email  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="f_email"  name="father_email" data-parsley-type="email" value="<?php echo $student_details['parent_email']; ?>" placeholder="Email" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Whether Single Parent  </label>
                    <div class="col-md-1">
                        <input type="checkbox" class="form-control" name="single_parent_f" <?php if($details_json['single_parent_f'] == on){ echo "checked"; }?>/>
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-3 control-label"><b> Guardian Details </b></label>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"> Name  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control"  name="guardian_name" value="<?php echo $details_json['guardian_name']; ?>" placeholder="Name"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Contact </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $details_json['guardian_mobile']; ?>" name="guardian_mobile" placeholder="Mobile"/>
                    </div>
                </div>
				
                <div class="form-group">
                    <label class="col-md-3 control-label"> Email  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $details_json['guardian_email']; ?>" name="guardian_email" data-parsley-type="email" placeholder="Email"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-md-3 control-label"> Address  </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" value="<?php echo $details_json['guardian_address']; ?>" name="guardian_address"  placeholder="Address"/>
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
                    <label class="col-md-3 control-label">Class | Section </label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('class_id', array('type'=>'select','class'=>'form-control','label'=>false, 'options'=>$class, 'default'=>$student_details['class_id']));?>
                        <div id="a"></div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Fee Exempted On</label>
                    <div class="col-md-9">
                        <select class="form-control" name="fee_exemption" >
                            <option selected></option>
                            <option value="No" <?php echo ($Defaultselectionfee == 'No')?"selected":""; ?>>No Exemption</option>
                            <option value="Tution Fee"<?php echo ($Defaultselectionfee == 'Tution Fee')?"selected":""; ?>>Tution Fee</option>
                            <option value="Computer" <?php echo ($Defaultselectionfee == 'Computer')?"selected":""; ?>>Computer</option>
                            <option value="Publication" <?php echo ($Defaultselectionfee == 'Publication')?"selected":""; ?>>Publication</option>
                            <option value="Annual Charges" <?php echo ($Defaultselectionfee == 'Annual Charges')?"selected":""; ?>>Annual Charges</option>
                            <option value="Transport" <?php echo ($Defaultselectionfee == 'Transport')?"selected":""; ?>>Transport</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Exempted Amount</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="exempted_amount" value ="<?php echo $details_json['exempted_amount']; ?>" placeholder="0"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Exemption Reason</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="exemption_reason"  placeholder="Reason for Exemption"><?php echo $details_json['exemption_reason']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Birth Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control"  name="birth_certificate">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">General/ST/SC/OBC/ECW Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control"  name="caste_certificate">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Transfer Certificate</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control"  name="transfer_certificate">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-md-3 control-label">Others</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="academic_qualification"  >
                    </div>
                </div>

          <!--    <div class="form-group">
                    <label class="col-md-3 control-label">Character Certificate</label>
                    <div class="col-md-9">
                        <input type="file"  class="form-control" name="character_certificate">
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
                            <input type="text" name="joining_date" value="<?php echo $student_details['joining_date'];?>" class="form-control"  data-parsley-required="true"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Admission Number</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="admission_no"  data-parsley-required="true"><?php echo $student_details['admission_no'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Special Remarks About Student</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="special_remarks"  ><?php echo $details_json['special_remarks'];?></textarea>
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
								<h4 class="modal-title">Edit Student Profile</h4>
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


