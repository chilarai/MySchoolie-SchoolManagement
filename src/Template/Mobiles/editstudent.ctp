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
<h2><?php echo $student_details['first_name'];?> <?php echo $student_details['last_name'];?></h2>
  <p>Update Student Details</p>
<div class="row">
<form method="post" enctype='multipart/form-data'>
<button type="button" class="btn btn-info col-xs-12" style="margin-top:10px;" data-toggle="collapse" data-target="#basic">Click For Basic Details</button>
<div id="basic" class="collapse">
	<!-- <div class="form-group"> -->
		<!-- <label class=" control-label">First Name  <i class="fa fa-asterisk text-danger f-s-8"></i></label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <input type="text" name="first_name"  class="form-control" placeholder="Last Name" value="<?php //echo $student_details['first_name']; ?>"/> -->
		<!-- </div> -->
	<!-- </div> -->
	<!-- <div class="form-group"> -->
		<!-- <label class=" control-label">Last Name  <i class="fa fa-asterisk text-danger f-s-8"></i></label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php //echo $student_details['last_name']; ?>"/> -->
		<!-- </div> -->
	<!-- </div> -->

	<!-- <div class="form-group"> -->
		<!-- <label class=" control-label">Blood Group  <i class="fa fa-asterisk text-danger f-s-8"></i> </label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <select class="form-control" name="blood_group"  placeholder="Select Blood Group"> -->
				<!-- <option value="A+" <?php// echo ($Defaultselectionblood == 'A+')?"selected":""; ?>>A+</option> -->
				<!-- <option value="A-" <?php //echo ($Defaultselectionblood == 'A-')?"selected":""; ?>>A-</option> -->
				<!-- <option value="B+" <?php //echo ($Defaultselectionblood == 'B+')?"selected":""; ?>>B+</option> -->
				<!-- <option value="B-" <?php //echo ($Defaultselectionblood == 'B-')?"selected":""; ?>>B-</option> -->
				<!-- <option value="O+" <?php //echo ($Defaultselectionblood == 'O+')?"selected":""; ?>>O+</option> -->
				<!-- <option value="O-" <?php //echo ($Defaultselectionblood == 'O-')?"selected":""; ?>>O-</option> -->
				<!-- <option value="AB+" <?php //echo ($Defaultselectionblood == 'AB+')?"selected":""; ?>>AB+</option> -->
				<!-- <option value="AB-" <?php //echo ($Defaultselectionblood == 'AB-')?"selected":""; ?>>AB-</option> -->
			<!-- </select> -->
		<!-- </div> -->
	<!-- </div> -->

	<!-- <div class="form-group"> -->
		<!-- <label class="  control-label">Gender  <i class="fa fa-asterisk text-danger f-s-8"></i></label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <select class="form-control" name="gender"> -->
				<!-- <option value="male" <?php// echo ($Defaultselectiongender == 'male')?"selected":""; ?>>Male</option> -->
				<!-- <option value="female"<?php //echo ($Defaultselectiongender == 'female')?"selected":""; ?>>Female</option> -->
			<!-- </select> -->
		<!-- </div> -->
	<!-- </div> -->


	<!-- <div class="form-group"> -->
		<!-- <label class="control-label  ">Date Of Birth  <i class="fa fa-asterisk text-danger f-s-8"></i></label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <div class="input-group date" id="datetimepicker1"> -->
				<!-- <input type="text" class="form-control" name="dob"  value="<?php //echo $student_details['birthday']; ?>"/> -->
				<!-- <span class="input-group-addon"> -->
					<!-- <span class="glyphicon glyphicon-calendar"></span> -->
				<!-- </span> -->
			<!-- </div> -->
		<!-- </div> -->
	<!-- </div> -->



	<div class="form-group">
		<label class="  control-label">Upload Photo</label>
		<div class="col-xs-12">
			<input type="file" class="form-control" name="student_photo" />
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label">Existing Photo</label>
		<div class="col-xs-12">
			<img src="<?php echo BASE_URL."uploads/students/images/student_photo/".$details_json['picture_link']; ?>" width="100px;" height="150px;"/>
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label">Aadhar Card Number </label>
		<div class="col-xs-12">
			<input type="text" class="form-control" name="aadhar" placeholder="Aadhar Card No" value="<?php echo $student_details['aadhar_card']; ?>"/>
		</div>
	</div>

                
	<input type="hidden"  class="form-control" name="country" value="Indian"/>
                    
	<!-- <div class="form-group"> -->
		<!-- <label class="control-label  "> Handicap  <i class="fa fa-asterisk text-danger f-s-8"></i></label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <select class="form-control" name="handicap"    > -->
				<!-- <option selected></option> -->
				<!-- <option value="no" <?php //echo ($Defaultselectionhandicap == 'no')?"selected":""; ?>>No</option> -->
				<!-- <option value="yes" <?php //echo ($Defaultselectionhandicap == 'yes')?"selected":""; ?>>Yes</option> -->
			<!-- </select> -->
		<!-- </div> -->
	<!-- </div> -->

   
			<input type="hidden" value="unmarried" name="marital_status">
	   

	<!-- <div class="form-group"> -->
		<!-- <label class="control-label  ">General/ST/SC/OBC/ECW<i class="fa fa-asterisk text-danger f-s-8"></i></label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <select class="form-control" name="caste"  > -->
				<!-- <option selected></option> -->
				<!-- <option value="General" <?php// echo ($Defaultselectioncaste == 'General')?"selected":""; ?>>General</option> -->
				<!-- <option value="ST" <?php //echo ($Defaultselectioncaste == 'ST')?"selected":""; ?>>ST</option> -->
				<!-- <option value="SC" <?php //echo ($Defaultselectioncaste == 'SC')?"selected":""; ?>>SC</option> -->
				<!-- <option value="OBC" <?php// echo ($Defaultselectioncaste == 'OBC')?"selected":""; ?>>OBC</option> -->
				<!-- <option value="ECW" <?php// echo ($Defaultselectioncaste == 'ECW')?"selected":""; ?>>ECW</option> -->
			<!-- </select> -->
		<!-- </div> -->
	<!-- </div> -->


	
	
	<!-- <div class="form-group"> -->
		<!-- <label class="  control-label">Medical History</label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <input type="text" class="form-control" name="medical_history" value="<?php //echo $details_json['medical_history']; ?>" /> -->
		<!-- </div> -->
	<!-- </div> -->
	
	<!-- <div class="form-group"> -->
		<!-- <label class="  control-label">Allergy</label> -->
		<!-- <div class="col-xs-12"> -->
			<!-- <input type="text" class="form-control" name="allergy" value="<?php //echo $details_json['allergy']; ?>" /> -->
		<!-- </div> -->
	<!-- </div> -->
</div>
<button type="button" class="btn btn-info col-xs-12" style="margin-top:10px;" data-toggle="collapse" data-target="#address">Click For Address Details</button>
<div id="address" class="collapse">		
	<div class="form-group">
		<label class="  control-label">Address  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<textarea name="address"   class="form-control" placeholder="Address" ><?php echo $details_json['address']; ?></textarea>
		</div>
	</div>


	<div class="form-group">
		<label class="  control-label">City  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text" name="city"   class="form-control" value="<?php echo $details_json['city']; ?>"/>

		</div>
	</div>

	<div class="form-group">
		<label class="  control-label">State  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<select name="state"   class="form-control">
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
		<label class="control-label">Pin code  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text"    class="form-control" value="<?php echo $details_json['pin_code']; ?>" name="pin code" placeholder="Pin Code"/>
		</div>
	</div>
</div>
<button type="button" class="btn btn-info col-xs-12" style="margin-top:10px;" data-toggle="collapse" data-target="#parents">Click For Parent's Details</button>
<div id="parents" class="collapse">	
	
	
	<div class="form-group">
		<label class="  control-label"><b> Mother's Details </b></label>
	</div>

	<div class="form-group">
		<label class="  control-label"> Name  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="mother_name" value="<?php echo $details_json['mother_name']; ?>" placeholder="Name"/>
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label"> Contact: Home & Office  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="mother_mobile" value="<?php echo $details_json['mother_mobile']; ?>" placeholder="Input Home Contact"/>
			<input type="text" class="form-control"   name="m_office_contact" value="<?php echo $details_json['m_office_contact']; ?>" placeholder="Input Office Contact"/>
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label"> Occupation </label>
		<div class="col-xs-12">
			<select name="mother_occupation"  class="form-control">
				<option selected></option>
				<option value="Business" <?php echo ($Defaultselectionmocc == 'Business')?"selected":""; ?>>Business</option>
				<option value="Service"<?php echo ($Defaultselectionmocc == 'Service')?"selected":""; ?>>Service</option>
				<option value="Others" <?php echo ($Defaultselectionmocc == 'Others')?"selected":""; ?>>Others</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"> Workplace  </label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="m_workplace" value="<?php echo $details_json['m_workplace']; ?>" placeholder="Place of Work"/>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"> Designation  </label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="m_designation" value="<?php echo $details_json['m_designation']; ?>" placeholder="Place of Work"/>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"> Email  </label>
		<div class="col-xs-12">
			<input type="email" class="form-control"  name="mother_email" placeholder="Email" value="<?php echo $details_json['mother_email']; ?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"><b> Father's Details </b></label>
	</div>
				
	<div class="form-group">
		<label class="  control-label"> Name  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="father_name" placeholder="Name" value="<?php echo $details_json['father_name']; ?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label"> Contact: Home & Office  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="father_mobile" value="<?php echo $details_json['father_mobile']; ?>" placeholder="Input Home Contact"/>
			<input type="text" class="form-control"   name="f_office_contact" value="<?php echo $details_json['f_office_contact']; ?>" placeholder="Input Office Contact"/>
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label"> Occupation </label>
		<div class="col-xs-12">
			<select name="father_occupation"  class="form-control">
				<option selected></option>
				<option value="Business" <?php echo ($Defaultselectionfocc == 'Business')?"selected":""; ?>>Business</option>
				<option value="Service" <?php echo ($Defaultselectionfocc == 'Service')?"selected":""; ?>>Service</option>
				<option value="Others" <?php echo ($Defaultselectionfocc == 'Others')?"selected":""; ?>>Others</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"> Workplace  </label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="f_workplace" value="<?php echo $details_json['f_workplace']; ?>" placeholder="Place of Work"/>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"> Designation  </label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="f_designation" value="<?php echo $details_json['f_designation']; ?>" placeholder="Place of Work"/>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"> Email  </label>
		<div class="col-xs-12">
			<input type="email" class="form-control"  name="father_email" value="<?php echo $student_details['parent_email']; ?>" placeholder="Email" />
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"><b> Guardian's Details </b></label>
	</div>
				
	<div class="form-group">
		<label class="  control-label"> Name  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="guardian_name" placeholder="Name" value="<?php echo $details_json['guardian_name']; ?>"/>
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label"> Contact  <i class="fa fa-asterisk text-danger f-s-8"></i></label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="guardian_mobile" value="<?php echo $details_json['guardian_mobile']; ?>" placeholder="Mobile"/>
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label"> Email  </label>
		<div class="col-xs-12">
			<input type="email" class="form-control"  name="guardian_email" value="<?php echo $details_json['guardian_email']; ?>" placeholder="Email" />
		</div>
	</div>
		<div class="form-group">
		<label class="  control-label"> Address  </label>
		<div class="col-xs-12">
			<input type="text" class="form-control"   name="guardian_address" value="<?php echo $details_json['guardian_address']; ?>" placeholder="Address"/>
		</div>
	</div>
	
</div>
<button type="button" class="btn btn-info col-xs-12" style="margin-top:10px;" data-toggle="collapse" data-target="#certificates">Click For Certificates</button>
<div id="certificates" class="collapse">
	<div class="form-group">
		<label class="  control-label">Birth Certificate</label>
		<div class="col-xs-12">
			<input type="file" class="form-control"  name="birth_certificate">
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label">General/ST/SC/OBC/ECW Certificate</label>
		<div class="col-xs-12">
			<input type="file" class="form-control"  name="caste_certificate">
		</div>
	</div>

	<div class="form-group">
		<label class="  control-label">Transfer Certificate</label>
		<div class="col-xs-12">
			<input type="file" class="form-control"  name="transfer_certificate">
		</div>
	</div>
	<div class="form-group">
		<label class="  control-label">Other</label>
		<div class="col-xs-12">
			<input type="file" class="form-control" name="academic_qualification"  >
		</div>
	</div>
</div>

	<div class="row" >
	<div class=" col-xs-2"></div>
	<div class="col-xs-8">
		<input type="password" name="password" class="form-control" style="margin-top:10px;" required placeholder="enter password">
		<?php echo $message;?>
	</div>		
	
	<div class="row" >
	<div class=" col-xs-3"></div>
	<div class="col-xs-6">
		<button type="submit" class="btn btn-primary col-xs-12 " style="margin-top:10px;">Update</button>
	</div>

</form>
</div>