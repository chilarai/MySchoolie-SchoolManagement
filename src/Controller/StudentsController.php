<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class StudentsController extends AppController
{

	protected function read_and_delete_first_line($filename) {

	  $file = file($filename);
	  $output = $file[0];
	  unset($file[0]);
	  file_put_contents($filename, $file);
	  return $output;
	}

	public function index(){

		

		if ($this->request->is('post')) {

			//$studentsTable=$studentsTable->newEntity();

			$class_id=$this->request->data['class_id'];
			$student_id	=$this->request->data['student_id'];


			if(!empty($student_id) ){

				$studentsTable = TableRegistry::get('students');

				$student_details = $studentsTable->find("all")
								 ->select(['id','student_name'=> "concat(students.first_name,' ',students.last_name)",
										   'teacher_name'=> 'user_teacher.name',
										   'parent_name'=>'user_parent.name',
										   'teacher_id'=>'user_teacher.id',
										   'parent_id'=>'user_parent.id',
										   'class_id'=>'classes.id',
										   'class'=>'classes.class',
										   'section'=>'classes.section',
										   'roll_no'=>'class_students.roll_no',
										   'parent_mobile'=>'user_parent.mobile',
										   'parent_email'=>'user_detail_parent.email',
										   'student_details_json'=>'students.details_json',
										   'gender'=>'students.gender_type',
										   'birthdate'=>'students.birthday'

										  ])
								 ->where(['students.id'	=>	$student_id])
								 ->join([
									        'table' => 'class_students',
									        'type' => 'LEFT',
									        'conditions' => 'students.id = class_students.student_id'])
								 ->join([
									        'table' => 'classes',
									        'type' => 'LEFT',
									        'conditions' => 'class_students.class_id = classes.id'])							 	 
								 ->join([
									        'table' => 'class_teachers',
									        'type' => 'LEFT',
									        'conditions' => 'classes.id = class_teachers.class_id'])
								 ->join([
									        'table' => 'users',
									        'type' => 'LEFT',
									        'alias' => 'user_teacher',
									        'conditions' => 'class_teachers.user_id = user_teacher.id'])
								 ->join([
									        'table' => 'parent_students',
									        'type' => 'LEFT',
									        'conditions' => 'students.id = parent_students.student_id'])
								 ->join([
									        'table' => 'users',
									        'type' => 'LEFT',
									        'alias' => 'user_parent',
									        'conditions' => 'parent_students.user_id = user_parent.id'])
								 ->join([
									        'table' => 'user_details',
									        'type' => 'LEFT',
									        'alias' => 'user_detail_parent',
									        'conditions' => 'parent_students.user_id = user_detail_parent.user_id'])

				 	 			->first();
								
				$student_class_id = $student_details->class_id;
				$details_json = json_decode($student_details['student_details_json'],true);
		
				$this->set("details_json",$details_json);
				$anecdotesTable = TableRegistry::get('anecdotes');
				
				$anecdotes_list = $anecdotesTable->find("all")
												->where(['student_id' => $student_id])
												->order(['id' => 'desc'])
												->select(['anecdote','created_date', 'id'])
												->toArray();
				$this->set("anecdotes_list", $anecdotes_list);
								
				$fee_status = TableRegistry::get('fee_student_status');		
				
				$student_detail_fee_status = $fee_status->find("all")
														->where(['fee_student_status.student_id' => $student_id])
														->select(['cycle_id', 'status', 'payment_mode', 'cycle_name' => 'fee_cycles.cycle_name', 'datetime'])
														->join([
																  'table' => 'fee_cycles',
																  'type' => 'LEFT',
																  'conditions' => 'fee_student_status.cycle_id = fee_cycles.id'])
														->toArray(); 
				$this->set('student_detail_fee_status', $student_detail_fee_status);

				$attendancesTable = TableRegistry::get('attendance_details');
				
				$attendance_present_select = $attendancesTable->find("all")
															   ->select([
																		
																		'monthno'=>'MONTHNAME(date)',
																		'monthname'=>'MONTH(date)',
																		'count_present'=>'COUNT(distinct id)'])
																->where(['student_id'=>$student_id, 'attendance_type'=>'present'])
																->group(['monthname','monthno'])
																->order(['monthname'])
																->toArray();
				
				
				$attendance_absent_select = $attendancesTable->find("all")
															   ->select([
																		
																		'monthno'=>'MONTHNAME(date)',
																		'monthname'=>'MONTH(date)',
																		'count_absent'=>'COUNT(distinct id)'])
																->where(['student_id'=>$student_id, 'attendance_type'=>'absent'])
																->group(['monthname','monthno'])
																->order(['monthname'])
																->toArray();
																
				foreach($attendance_present_select as $present_keys){
            $p_month_number = $present_keys['monthno'];
            $p_attendance_count = $present_keys['count_present'];
            $keys[] = $p_month_number;

            $complete_p_attendace[$p_month_number] = $p_attendance_count;
        }

        foreach($attendance_absent_select as $absent_keys){
            $a_month_number = $absent_keys['monthno'];
            $a_attendance_count = $absent_keys['count_absent'];
            $keys[] = $a_month_number;

            $complete_a_attendace[$a_month_number] = $a_attendance_count;
        }
		$workingdays_table = TableRegistry::get('working_days');
		$working_days = $workingdays_table->find("all")
											->select(['month', 'working_days'])
											->where(['class_id' => $student_class_id])
											->toArray();
											
		
		
		foreach ($working_days as $key => $value) {
			$workingdays[$value['month']]=$value['working_days'];
		}
		$this->set('workingdays', $workingdays);
        // print_r(array_unique($keys));
        
        foreach(array_unique($keys) as $key){

            if(array_key_exists($key, $complete_p_attendace)){

                $final_attendance[$key]['present'] = $complete_p_attendace[$key];
            }
            else{
                 $final_attendance[$key]['present'] = 0;
            }


            if(array_key_exists($key, $complete_a_attendace)){

                $final_attendance[$key]['absent'] = $complete_a_attendace[$key];
            }
            else{
                 $final_attendance[$key]['absent'] = 0;
            }
			
        }
			
        // pr($final_attendance);



        $this->set('attendance_detail', $final_attendance);
				

				$attendance_details = $attendancesTable->find("all")
														 ->select(['attendance_date'=> "date",
																   'attendance_status'=> 'attendance_type'])
														 ->where(['student_id'	=>	$student_id])
														 ->order(['date' => 'DESC'])
														 ->limit(10)
								 		 	 			 ->toArray();
				
				$leavesTable = TableRegistry::get('leaves_students');

				$leave_details = $leavesTable->find("all")
														 ->select(['leave_id'=>'id',
														 		   'reason'=> "leave_reason",
																   'leaves_start'=> 'leave_from',
																   'leaves_end'=>'leave_to'])
														 ->where(['student_id'	=>	$student_id])
														 ->order(['id' => 'DESC'])
														 ->limit(10)
								 		 	 			 ->toArray();

				$noticesTable = TableRegistry::get('notices');

				$notice_details = $noticesTable->find("all")
														 ->select(['heading'=>'heading',
														 		   'date'=> "date(created_date)",])
														 ->where(['student_id'	=>	$student_id])
														 ->order(['id' => 'DESC'])
														 ->limit(10)
								 		 	 			 ->toArray();


				$assignmentsTable = TableRegistry::get('assignments');

				$assignment_details = $assignmentsTable->find("all")
														 ->select(['heading'=>'homework',
														 			'subject'=>'subjects.name',
														 		   'date'=> "date(assignments.created_date)"])
														 ->where(['class_id'	=>	$class_id])
														 ->join([
															        'table' => 'subjects',
															        'type' => 'LEFT',
															        'conditions' => 'assignments.subject_id = subjects.id'])
														 ->order(['assignments.id' => 'DESC'])
														 ->limit(10)
								 		 	 			 ->toArray();

				$this->set('assignment_details',$assignment_details);					 		 	 			 
				$this->set('notice_details',$notice_details);				 		 	 			 
				$this->set('leave_details',$leave_details);
				$this->set('student_details',$student_details);	
				$this->set('attendance_details',$attendance_details);


			}
			else{
					$message = 'Unable to Fetch Details';
			}



		}

		if(empty($message))
			$message = 'Please Enter All the Data';

		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		$studentlist_response = $http->get(ALL_STUDENT_LIST);


		$this->set('message',$message);
        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
    
        
    }

        public function idcards()
    {

    }

    public function listdownload(){

		
		$http = new Client();
		$response = $http->get(CLASS_LIST);

		if($this->request->is('post')){


			// $responses= $http->post(SEARCH_STUDENTS, ['class_id'=>$this->request->data['class_&_sections'],'roll_no'=>$this->request->data['roll_no']]);
			$class_id = $this->request->data['class_&_sections'];


			//echo $class_id;

			$class_student = TableRegistry::get('classes');

 	 		$query = $class_student->query();

 	 		$data = $query->find("all")->where(['classes.id' => $class_id, 'students.is_active' => 1])
 	 					->select(['first_name'=>'students.first_name',
 	 								'last_name'=>'students.last_name',
									'birthdate'=>'students.birthday',
 	 								'class'=>'classes.class',
 	 								'section'=>'classes.section',
									'guardian_name'=>'users.name',
									'guardian_mobile'=>'users.mobile',
									'guardian_email'=>'user_details.email',
 	 								'roll_no'=>'class_students.roll_no'])
 	 					->join([
									'table' => 'class_students',
									'type' => 'LEFT',
									'conditions' => 'classes.id = class_students.class_id'])
 	 					->join([
									'table' => 'students',
									'type' => 'LEFT',
									'conditions' => 'class_students.student_id = students.id'])
						->join([
									'table' => 'parent_students',
									'type' => 'LEFT',
									'conditions' => 'students.id = parent_students.student_id'])
						->join([
									'table' => 'users',
									'type' => 'LEFT',
									'conditions' => 'parent_students.user_id = users.id'])
						->join([
									'table' => 'user_details',
									'type' => 'LEFT',
									'conditions' => 'parent_students.user_id = user_details.user_id'])
						->toArray();

 	 		//pr($data);			
			//$this->set('responses', $responses->json);


		 	 	if(!empty($data)){

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Students Report",
			 	 		"details"	=> $data
			 	 		// "exam"	=> $data->exam,
			 	 		// "rollno"	=> $data->rollno,
			 	 		// "class_id"	=> $data->class_id,
			 	 		// "result"	=> json_decode($data->result_json,true),
			 	 		// "created_date"	=> $data->created_date,
			 	 		);

					//report generation
			 	 		$this->response->download('export.csv');

						$_serialize = 'data';
						$this->set(compact('data', '_serialize'));
						$this->viewBuilder()->className('CsvView.Csv');
						$_header = ['first_name', 'last_name','class','section','roll_no', 'birthdate', 'guardian_name', 'guardian_mobile', 'guardian_email'];
						$_extract = ['first_name', 'last_name','class','section','roll_no','birthdate', 'guardian_name', 'guardian_mobile', 'guardian_email'];
						$this->set(compact('data', '_serialize', '_header', '_extract'));



			 	 	//report generation
		 	 	}
		 	 	else{
		 	 		$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "No Record Found",
		    			"details"	=> array()
		    		);
		 	 	}
			
		}

		$this->set('status', $response->code);
		$this->set('response', $response->json);

	
    }


	public function newadmission(){

        $http = new Client();
        $classlist_response = $http->get(CLASS_LIST);

        //## course selection $coursesTable 				= 		TableRegistry::get('courses');
        // $course_list				=		$coursesTable->find('all')
											  // ->select(['id','course_name'])
											  // ->toArray();



		if($this->request->is('post'))
		{

			$class_id				=		$this->request->data['class_id'];

			$Students 				= 		TableRegistry::get('students');
			$ClassStudents 			= 		TableRegistry::get('class_students');
			$Users 					= 		TableRegistry::get('user_details');
			$Attendances 			= 		TableRegistry::get('attendances');
			$ParentStudents 		= 		TableRegistry::get('parent_students');

			$details_json['blood_group']        =   $this->request->data['blood_group'];
			$details_json['caste']              =   $this->request->data['caste'];
			$details_json['medical_history']    =   $this->request->data['medical_history'];
			$details_json['allergy']            =   $this->request->data['allergy'];
			$details_json['address']            =   $this->request->data['address'];
			$details_json['pin_code']           =   $this->request->data['pin_code'];
			$details_json['city']               =   $this->request->data['city'];
			$details_json['state']              =   $this->request->data['state'];
			$details_json['address']            =   $this->request->data['address'];
			$details_json['father_occupation']  =   $this->request->data['father_occupation'];
			$details_json['mother_name']        =   $this->request->data['mother_name'];
			$details_json['mother_mobile']      =   $this->request->data['mother_mobile'];
			$details_json['mother_occupation']  =   $this->request->data['mother_occupation'];
			$details_json['mother_email']       =   $this->request->data['mother_email'];
			$details_json['fee_exemption']      =   $this->request->data['fee_exemption'];
			$details_json['exempted_amount']    =   $this->request->data['exempted_amount'];
			$details_json['exemption_reason']   =   $this->request->data['exemption_reason'];
			$details_json['special_remarks']    =   $this->request->data['special_remarks'];
			$details_json['guardian_name']      =   $this->request->data['guardian_name'];
			$details_json['guardian_email']     =   $this->request->data['guardian_email'];
			$details_json['guardian_mobile']    =   $this->request->data['guardian_mobile'];
			$details_json['guardian_address']   =   $this->request->data['guardian_address'];
			$details_json['m_office_contact']   =   $this->request->data['m_office_contact'];
			$details_json['f_office_contact']   =   $this->request->data['f_office_contact'];
			$details_json['m_workplace']        =   $this->request->data['m_workplace'];
			$details_json['f_workplace']        =   $this->request->data['f_workplace'];
			$details_json['m_designation']      =   $this->request->data['m_designation'];
			$details_json['f_designation']      =   $this->request->data['f_designation'];
			$details_json['father_name']        =   $this->request->data['father_name'];
			$details_json['father_mobile']      =   $this->request->data['father_mobile'];
			$details_json['single_parent_m']    =   $this->request->data['single_parent_m'];
			$details_json['single_parent_f']    =   $this->request->data['single_parent_f'];
			








			if ($_FILES['birth_certificate']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['birth_certificate']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/birth_certificate/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['birth_certificate']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['birth_certificate']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}

			if ($_FILES['caste_certificate']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['caste_certificate']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/caste_certificate/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['caste_certificate']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['caste_certificate']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}

			if ($_FILES['transfer_certificate']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['transfer_certificate']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/transfer_certificate/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['transfer_certificate']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['transfer_certificate']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}

			// if ($_FILES['character_certificate']['size'] > 0) {



				// $today              = strtotime("now");


				// // print_r($_SERVER);
			    // $name=$_FILES['character_certificate']['name'];
			    // $file=explode('.', $name);
			    // $ext = end($file); //extension of file
			    // $target_path = $today.".".$ext ;
			    // $target_path1 = WWW_ROOT . "uploads/students/images/character_certificate/".$today.".".$ext ;
			    // //$filename=$user_id.'.'.$file[1];
			    // $tmp=$_FILES['character_certificate']['tmp_name'];
			    // move_uploaded_file($tmp, $target_path1);
			    // //$profilepic="profilepic/".$filename;
		       
		       // $details_json['character_certificate']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			// }


			if ($_FILES['academic_qualification']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['academic_qualification']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/academic_qualification/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['academic_qualification']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['academic_qualification']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}


			if ($_FILES['student_photo']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['student_photo']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/student_photo/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['student_photo']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['picture_link']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}


			$details_json['temp']    =   'temp';

			$students 				=		$Students->newEntity();

			$students->first_name	=		$this->request->data['first_name'];
			$students->last_name	=		$this->request->data['last_name'];
			$students->birthday		=		date("Y-m-d",strtotime($this->request->data['dob']));
			$students->gender_type	=		$this->request->data['gender'];
			$students->details_json =		json_encode($details_json);
			$students->is_active	=		1;
			$students->admission_no =		$this->request->data['admission_no'];
			$students->joining_date =		date("Y-m-d",strtotime($this->request->data['joining_date']));
			// $students->mobile 		=		$this->request->data['mobile'];

			if(!empty($this->request->data['aadhar'])) {
			$students->aadhar_card	=		$this->request->data['aadhar'];
			}


			$students->country		=		$this->request->data['country'];
		// ##course selection	$students->course_id	=		$this->request->data['course_id'];
			$students->handicap	=			$this->request->data['handicap'];

			$Students->save($students);

			if($students->isNew()){

			}else{

				$students_id=$students->id;
				
				$classStudents=$ClassStudents->newEntity();

				$classStudents->class_id	=	$this->request->data['class_id'];
				$classStudents->student_id  =	$students_id;
				$classStudents->year 		=	date('Y', strtotime($students->joining_date));

				$roll_no	=	$ClassStudents->find('all')
											  ->select(['max_roll' => 'MAX(class_students.roll_no)'])
											  ->where(['class_id'=>$classStudents->class_id])->first();

				if(is_null($roll_no['max_roll'])){
					$classStudents->roll_no		=	1;
				}
				else{
					$classStudents->roll_no		=	($roll_no['max_roll'] + 1);	
				}

				$classStudents->is_active	=	1;

				$ClassStudents->save($classStudents);
			}

			if($classStudents->isNew()){

			}else{

				$attendances=$Attendances->newEntity();

				$attendances->student_id=$students_id;
				$attendances->year=$classStudents->year;
				$attendances->is_active=1;

				$Attendances->save($attendances);
			}

			if($attendances->isNew()){

			}else{

				//saving In Users Table

				$users = TableRegistry::get('Users');
				$user=$users->newEntity();
				
				$father_mobile = $this->request->data['father_mobile'];
				$father_name = $this->request->data['father_name'];
				$mother_mobile = $this->request->data['mother_mobile'];
				$mother_name = $this->request->data['mother_name'];
				
				if(!empty($father_mobile) AND $this->request->data['single_parent_f'] == on)
				{	
					$user->mobile	=	$father_mobile;
					$user->name		=	$father_name;
					$user->user_type_id = 5;
					$user->is_active=1;
					$user->password =	md5(1234);
					
					$users->save($user);
				}
				if(!empty($mother_mobile) AND $this->request->data['single_parent_m'] == on)
				{
					$user->mobile	=	$mother_mobile;
					$user->name		=	$mother_name;
					$user->user_type_id = 5;
					$user->is_active=1;
					$user->password =	md5(1234);
					
					$users->save($user);
				}
				if(!empty($mother_mobile) AND $this->request->data['single_parent_m'] == on AND $this->request->data['single_parent_f'] == on)
				{
					$user->mobile	=	$mother_mobile;
					$user->name		=	$mother_name;
					$user->user_type_id = 5;
					$user->is_active=1;
					$user->password =	md5(1234);
					
					$users->save($user);
				}
				if(empty($mother_mobile) AND $this->request->data['single_parent_m'] == on AND $this->request->data['single_parent_f'] == on)
				{
					$user->mobile	=	$father_mobile;
					$user->name		=	$father_name;
					$user->user_type_id = 5;
					$user->is_active=1;
					$user->password =	md5(1234);
					
					$users->save($user);
				}
				if(!empty($mother_mobile) AND !empty($father_mobile))
				{
					$user->mobile	=	$mother_mobile;
					$user->name		=	$mother_name;
					$user->user_type_id = 5;
					$user->is_active=1;
					$user->password =	md5(1234);
					
					$users->save($user);
				}
				if(!empty($mother_mobile) AND empty($father_mobile))
				{
					$user->mobile	=	$mother_mobile;
					$user->name		=	$mother_name;
					$user->user_type_id = 5;
					$user->is_active=1;
					$user->password =	md5(1234);
					
					$users->save($user);
				}
				if(empty($mother_mobile) AND !empty($father_mobile))
				{
					$user->mobile	=	$father_mobile;
					$user->name		=	$father_name;
					$user->user_type_id = 5;
					$user->is_active=1;
					$user->password =	md5(1234);
					
					$users->save($user);
				}
			}

			if($user->isNew()){

			}else{
				$UserDetails = TableRegistry::get('user_details');
				//Saving In User_details Table

				$userdetails=$UserDetails->newEntity();

				$userdetails->id=$user->id;
				$userdetails->user_id=$user->id;
				$userdetails->user_type_id=5;

				$name_father = explode(' ', $user->name	, 2);

				$userdetails->firstname=$name_father[0];

				if(!empty($name_father[1]))
					$userdetails->lastname=$name_father[1];

				$userdetails->email	=	$this->request->data['father_email'];
				$userdetails->mobile	=	$this->request->data['father_mobile'];
				$userdetails->other_details="[]";
				$userdetails->is_active=1;

				$UserDetails->save($userdetails);
			}


			if($userdetails->isNew()){

			}else{

				$users 					= 		TableRegistry::get('user_details');

				$parents=$users->find('all')->select(['id','user_id'])->where(['id'=>$userdetails->id])->first();

				//saving in parent_students Table
				$parentStudents=$ParentStudents->newEntity();
				$parentStudents->student_id=$students_id;
				$parentStudents->user_detail_id=$parents->id;
				$parentStudents->user_id=$parents->user_id;
				$parentStudents->is_active=1;

				$ParentStudents->save($parentStudents);
			}

			if($parentStudents->isNew()){

			}else{


				if($this->request->data['exempted_amount'] > 0){


					$fee_exemptTable = TableRegistry::get('fee_exemptions');

					$fee_exempt=$fee_exemptTable->newEntity();

		            $fee_exempt->student_id=$students_id;
		            $fee_exempt->exempted_on=$this->request->data['fee_exemption'];
		            $fee_exempt->amount=$this->request->data['exempted_amount'];
		            $fee_exempt->reason=$this->request->data['exemption_reason'];
		            $fee_exempt->is_active=1;

		            $fee_exemptTable->save($fee_exempt);
		        }




				$this->set('student_id',$students_id);

				$this->redirect('/students/admissiondetails/'.$students_id);

				$message = 'Student Inserted Succesfully';

			}

		}


			
			
	


        if(empty($message))
            $message = 'Please Enter All the Data';



        $this->set('message',$message);
       // $this->set('course_list', $course_list);
        $this->set('classlist', $classlist_response->json);
		
	}
	
	
	public function editstudent($id= null)
	{
		$array [0] = $id;
		$Students 				= 		TableRegistry::get('students');
		
		
        $coursesTable 				= 		TableRegistry::get('courses');
        $course_list				=		$coursesTable->find('all')
											  ->select(['id','course_name'])
											  ->toArray();
		
		
		
		$student_details = $Students->find("all")
								->where(['students.id'=>$id])
								->select(['id','admission_no', 'joining_date', 'birthday', 'gender_type', 'details_json', 
										   'aadhar_card', 'country', 'handicap', 'marital_status', 'course_id', 'first_name', 'last_name',
										   'teacher_name'=> 'user_teacher.name',
										   'parent_name'=>'user_parent.name',
										   'teacher_id'=>'user_teacher.id',
										   'parent_id'=>'user_parent.id',
										   'class_id'=>'classes.id',
										   'class'=>'classes.class',
										   'section'=>'classes.section',
										   'roll_no'=>'class_students.roll_no',
										   'class_studentid'=>'class_students.id',
										   'parent_mobile'=>'user_parent.mobile',
										   'parent_email'=>'user_detail_parent.email',
										   'student_details_json'=>'students.details_json',
										   'gender'=>'students.gender_type',
										   'birthdate'=>'students.birthday',
										   'feeexemption'=>'fee_exemptions.id',
										   'parent_user_detail_id'=>'user_detail_parent.id',
										   'parent_user_id'=>'user_parent.id'
										   

										  ])
								 ->join([
									        'table' => 'class_students',
									        'type' => 'LEFT',
									        'conditions' => 'students.id = class_students.student_id'])
								 ->join([
									        'table' => 'classes',
									        'type' => 'LEFT',
									        'conditions' => 'class_students.class_id = classes.id'])							 	 
								 ->join([
									        'table' => 'class_teachers',
									        'type' => 'LEFT',
									        'conditions' => 'classes.id = class_teachers.class_id'])
								 ->join([
									        'table' => 'users',
									        'type' => 'LEFT',
									        'alias' => 'user_teacher',
									        'conditions' => 'class_teachers.user_id = user_teacher.id'])
								 ->join([
									        'table' => 'parent_students',
									        'type' => 'LEFT',
									        'conditions' => 'students.id = parent_students.student_id'])
								 ->join([
									        'table' => 'users',
									        'type' => 'LEFT',
									        'alias' => 'user_parent',
									        'conditions' => 'parent_students.user_id = user_parent.id'])
								 ->join([
									        'table' => 'user_details',
									        'type' => 'LEFT',
									        'alias' => 'user_detail_parent',
									        'conditions' => 'parent_students.user_id = user_detail_parent.user_id'])
								 ->join([	
											'table' => 'fee_exemptions',
											'type' => 'LEFT',
											'conditions' => 'class_students.id = fee_exemptions.student_id'])
									
								
								->first();
		$this->set("student_details", $student_details);
		
		$details_json = json_decode($student_details['details_json'],true);
		
		$this->set("details_json",$details_json);
		
		$ClassStudents 			= 		TableRegistry::get('class_students');
		
		
		$Users 					= 		TableRegistry::get('user_details');
		
		
		$Attendances 			= 		TableRegistry::get('attendances');
		
		
		$ParentStudents 		= 		TableRegistry::get('parent_students');
		
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		


		
        $this->set('classlist', $classlist_response->json);
		
		// ##course selection $coursesTable 				= 		TableRegistry::get('courses');
        // $course_list				=		$coursesTable->find('all')
											  // ->select(['id','course_name'])
											  // ->toArray();
		// $this->set('course_list', $course_list);
		//values are retrieved until here for the edit form default values
		
		if($this->request->is('post'))
		{

			$class_id				=		$this->request->data['class_id'];

			$Students 				= 		TableRegistry::get('students');
			$ClassStudents 			= 		TableRegistry::get('class_students');
			$Users 					= 		TableRegistry::get('user_details');
			$Attendances 			= 		TableRegistry::get('attendances');
			$ParentStudents 		= 		TableRegistry::get('parent_students');

			$details_json['blood_group']        =   $this->request->data['blood_group'];
			$details_json['caste']              =   $this->request->data['caste'];
			$details_json['medical_history']    =   $this->request->data['medical_history'];
			$details_json['allergy']            =   $this->request->data['allergy'];
			$details_json['address']            =   $this->request->data['address'];
			$details_json['pin_code']           =   $this->request->data['pin_code'];
			$details_json['city']               =   $this->request->data['city'];
			$details_json['state']              =   $this->request->data['state'];
			$details_json['address']            =   $this->request->data['address'];
			$details_json['father_occupation']  =   $this->request->data['father_occupation'];
			$details_json['mother_name']        =   $this->request->data['mother_name'];
			$details_json['mother_mobile']      =   $this->request->data['mother_mobile'];
			$details_json['mother_email']       =   $this->request->data['mother_email'];
			$details_json['mother_occupation']  =   $this->request->data['mother_occupation'];
			$details_json['fee_exemption']      =   $this->request->data['fee_exemption'];
			$details_json['exempted_amount']    =   $this->request->data['exempted_amount'];
			$details_json['exemption_reason']   =   $this->request->data['exemption_reason'];
			$details_json['special_remarks']    =   $this->request->data['special_remarks'];
			$details_json['guardian_name']      =   $this->request->data['guardian_name'];
			$details_json['guardian_email']     =   $this->request->data['guardian_email'];
			$details_json['guardian_mobile']    =   $this->request->data['guardian_mobile'];
			$details_json['guardian_address']   =   $this->request->data['guardian_address'];
			$details_json['m_office_contact']   =   $this->request->data['m_office_contact'];
			$details_json['f_office_contact']   =   $this->request->data['f_office_contact'];
			$details_json['m_workplace']        =   $this->request->data['m_workplace'];
			$details_json['f_workplace']        =   $this->request->data['f_workplace'];
			$details_json['m_designation']      =   $this->request->data['m_designation'];
			$details_json['f_designation']      =   $this->request->data['f_designation'];
			$details_json['father_name']        =   $this->request->data['father_name'];
			$details_json['father_mobile']      =   $this->request->data['father_mobile'];
			$details_json['single_parent_m']    =   $this->request->data['single_parent_m'];
			$details_json['single_parent_f']    =   $this->request->data['single_parent_f'];


			if ($_FILES['birth_certificate']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['birth_certificate']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/birth_certificate/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['birth_certificate']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['birth_certificate']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}

			if ($_FILES['caste_certificate']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['caste_certificate']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/caste_certificate/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['caste_certificate']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['caste_certificate']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}

			if ($_FILES['transfer_certificate']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['transfer_certificate']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/transfer_certificate/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['transfer_certificate']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['transfer_certificate']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}

			// if ($_FILES['character_certificate']['size'] > 0) {



				// $today              = strtotime("now");


				// // print_r($_SERVER);
			    // $name=$_FILES['character_certificate']['name'];
			    // $file=explode('.', $name);
			    // $ext = end($file); //extension of file
			    // $target_path = $today.".".$ext ;
			    // $target_path1 = WWW_ROOT . "uploads/students/images/character_certificate/".$today.".".$ext ;
			    // //$filename=$user_id.'.'.$file[1];
			    // $tmp=$_FILES['character_certificate']['tmp_name'];
			    // move_uploaded_file($tmp, $target_path1);
			    // //$profilepic="profilepic/".$filename;
		       
		       // $details_json['character_certificate']    =   $target_path;
		       


		       // // echo $target_path;	
		       // // echo $ext;
			// }


			if ($_FILES['academic_qualification']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['academic_qualification']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/academic_qualification/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['academic_qualification']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['academic_qualification']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}


			if ($_FILES['student_photo']['size'] > 0) {



				$today              = strtotime("now");


				// print_r($_SERVER);
			    $name=$_FILES['student_photo']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/students/images/student_photo/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['student_photo']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
			    //$profilepic="profilepic/".$filename;
		       
		       $details_json['picture_link']    =   $target_path;
		       


		       // echo $target_path;	
		       // echo $ext;
			}


			$details_json['temp']    =   'temp';

			$students 				=		$Students->get($id);

			$students->first_name	=		$this->request->data['first_name'];
			$students->last_name	=		$this->request->data['last_name'];
			$students->birthday		=		date("Y-m-d",strtotime($this->request->data['dob']));
			$students->gender_type	=		$this->request->data['gender'];
			$students->details_json =		json_encode($details_json);
			$students->is_active	=		1;
			$students->admission_no =		$this->request->data['admission_no'];
			$students->joining_date =		date("Y-m-d",strtotime($this->request->data['joining_date']));
			// $students->mobile 		=		$this->request->data['mobile'];

			if(!empty($this->request->data['aadhar'])) {
			$students->aadhar_card	=		$this->request->data['aadhar'];
			}


			$students->country		=		$this->request->data['country'];
		// ##course section	$students->course_id	=		$this->request->data['course_id'];
			$students->handicap	=			$this->request->data['handicap'];

			$Students->save($students);
			///// everything works fine till here
			//problem from here 
			if($students->isNew()){

			}else{

				$students_id = $student_details['class_studentid'];
				
				$classStudents=$ClassStudents->get($students_id);

				$classStudents->class_id	=	$this->request->data['class_id'];
				$classStudents->year 		=	date('Y', strtotime($students->joining_date));

				

				$classStudents->is_active	=	1;

				$ClassStudents->save($classStudents);
			}

			if($classStudents->isNew()){
				
			}else{

				if($this->request->data['exempted_amount'] > 0 AND !empty($feeid) ){


					$fee_exemptTable = TableRegistry::get('fee_exemptions');
					$feeid = $student_details['feeexemption'];
					$fee_exempt=$fee_exemptTable->get($feeid);

		            $fee_exempt->student_id=$students_id;
		            $fee_exempt->exempted_on=$this->request->data['fee_exemption'];
		            $fee_exempt->amount=$this->request->data['exempted_amount'];
		            $fee_exempt->reason=$this->request->data['exemption_reason'];
		            $fee_exempt->is_active=1;

		            $fee_exemptTable->save($fee_exempt);
					
		        }
				
				elseif($this->request->data['exempted_amount'] > 0 AND empty($feeid) )
				{


					$fee_exemptTable = TableRegistry::get('fee_exemptions');

					$fee_exempt=$fee_exemptTable->newEntity();

		            $fee_exempt->student_id=$students_id;
		            $fee_exempt->exempted_on=$this->request->data['fee_exemption'];
		            $fee_exempt->amount=$this->request->data['exempted_amount'];
		            $fee_exempt->reason=$this->request->data['exemption_reason'];
		            $fee_exempt->is_active=1;

		            $fee_exemptTable->save($fee_exempt);
		        }




				

				

			}	
			

				$this->redirect('/students/index/');

				$message = 'Student Profile Updated Succesfully';
				




				

				

		}	

		
		
        $this->set('message',$message);
		
		
		
	}
	

	public function admissiondetails($student_id){

		$students 					= 		TableRegistry::get('students');

		$student_detail=$students->find('all')->select(['admission_no','joining_date','first_name','last_name','birthday','gender_type','details_json','aadhar_card','country','handicap','marital_status','course_id'])->where(['id'=>$student_id])->first();

		$this->set('student_detail', $student_detail);
		
	}
	////---------------------------anecdote-----------------------------------
	
	public function anecdote() {
		$http = new Client();
		$teacherlist_response = $http->get(TEACHER_LIST);
		$classlist_response = $http->get(CLASS_LIST);
		$studentlist_response = $http->get(ALL_STUDENT_LIST);


		$this->set('teacherlist', $teacherlist_response->json);
        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
			if ($this->request->is('post')) 
			{

				//$class_id=$this->request->data['class_id'];
				$student_id	= $this->request->data['student_id'];
				$anecdote = $this->request->data['anecdote'];
				$user_id = $this->request->data['user_id'];

				if(!empty($student_id) &&!empty ($anecdote) )
				{

					$anecdotesTable = TableRegistry::get('anecdotes');
					
					$newanecdote = $anecdotesTable->newEntity();
					$newanecdote->student_id = $student_id;
					$newanecdote->anecdote = $anecdote;
					$newanecdote->user_id = $user_id;
					
					if($anecdotesTable->save($newanecdote)) {
						
						
						
						$returnArray = array(
		    			"status"	=> "200",
		    			"message"	=> "Anecdote Succesfully Uploaded",
		    			"details"	=> array()
						);
					}
						else{
						$returnArray = array(
		    			"status"	=> "400",
		    			"message"	=> "Unable to Upload",
		    			"details"	=> array()
						);
						}
					
				$this->set("response", $returnArray); 
					// $student_details = $studentsTable->find("all")
										// ->select(['id',
													// 'student_name'=> "concat(students.first_name,' ',students.last_name)"
												  // ])
										// ->where(['classes.id' => $class_id, 'students.id'	=>	$student_id])
										// ->join([
													// 'table' => 'class_students',
													// 'type' => 'LEFT',
													// 'conditions' => 'students.id = class_students.student_id'])
										// ->join([
													// 'table' => 'classes',
													// 'type' => 'LEFT',
													// 'conditions' => 'class_students.class_id = classes.id'])
										// ->first();
					
					// $this->set("student_details", $student_details);
				}
			}
	}
	
	////---------------------------editanecdote-----------------------------------
	
	public function editanecdote($id) 
	{
		$array[0] = $id;
		$http = new Client();
		$teacherlist_response = $http->get(TEACHER_LIST);
		
		$studentlist_response = $http->get(ALL_STUDENT_LIST);


		$this->set('teacherlist', $teacherlist_response->json);
        
        $this->set('studentlist', $studentlist_response->json);
		
		$anecdotesTable = TableRegistry::get('anecdotes');
		
		$anecdote_details = $anecdotesTable->find("all")
											->where	([	'anecdotes.id' => $id])
											->select([	'student_name'=> "concat(students.first_name,' ',students.last_name)",
														'teacher_name'=> 'users.name',
														'anecdote_details' => 'anecdotes.anecdote' ])
											->join 	([ 	'table' => 'students',
														'type' => 'LEFT',
														'conditions' => 'anecdotes.student_id = students.id' ])
											->join 	([ 	'table' => 'users',
														'type' => 'LEFT',
														'conditions' => 'anecdotes.user_id = users.id' ])
											->first();
		$this->set('anecdote_details', $anecdote_details);
		
			if ($this->request->is('post')) 
			{

				//$class_id=$this->request->data['class_id'];
				//$student_id	= $this->request->data['student_id'];
				$anecdote = $this->request->data['anecdote'];
				//$user_id = $this->request->data['user_id'];

				if(!empty ($anecdote) )
				{
					$anecdotesTable = TableRegistry::get('anecdotes');
					
					
					$editanecdote = $anecdotesTable->get($id);
					//$editanecdote->student_id = $student_id;
					$editanecdote->anecdote = $anecdote;
					//$editanecdote->user_id = $user_id;
					
					if($anecdotesTable->save($editanecdote)) {
						
						
						
						$returnArray = array(
		    			"status"	=> "200",
		    			"message"	=> "Anecdote Succesfully Uploaded",
		    			"details"	=> array()
						);
					}
						else{
						$returnArray = array(
		    			"status"	=> "400",
		    			"message"	=> "Unable to Upload",
		    			"details"	=> array()
						);
						}
					
				$this->set("response", $returnArray); 

				}
			}
	}
	
	public function deleteanecdote($id)
	{
		$array[0] = $id;
		$anecdotes_table = TableRegistry::get('anecdotes');
		$entity = $anecdotes_table->get($id);
		if($anecdotes_table->delete($entity))
		{
			$this->redirect(array("action" => "index"));
			$returnArray = array(
							"status"	=> "200",
							"message"	=> "The Anecdote has been deleted",
							"details"	=> array()
							);
			$this->set("response", $returnArray);
			
		}
		$this->redirect('/students/anecdoteslist/');
	}
	public function anecdoteslist()
	{	$http = new Client();
		$teacherlist_response = $http->get(TEACHER_LIST);
		$studentlist_response = $http->get(ALL_STUDENT_LIST);

		$this->set('teacherlist', $teacherlist_response->json);
		$this->set('studentlist', $studentlist_response->json);
		
		if ($this->request->is('post')) 
		{	
			$user_id = $this->request->data['user_id'];
			$student_id = $this->request->data['student_id'];
			$anecdotes_table = TableRegistry::get('anecdotes');
			if(!empty ($student_id))
			{
				$anecdotes_list =   $anecdotes_table->find("all")
													->where(['anecdotes.student_id' => $student_id ])
													//->orWhere(['user_id'=> $user_id])
													->order(['anecdotes.id' => 'desc'])
													->select(['id', 'anecdote', 'created_date', 'teacher_name' => 'users.name'])
													->join ([
																'table' => 'users',
																'type' => 'LEFT',
																'conditions' => 'anecdotes.user_id = users.id'
															])
													->toArray();
				$this->set("anecdotes_list",$anecdotes_list);
			}
			// if(!empty ($student_id) OR !empty ($user_id))
			// {
				// $anecdotes_list =   $anecdotes_table->find("all")
													// ->where(['student_id' => $student_id])
													// ->andWhere([ 'user_id'=> $user_id])
													// ->order(['id' => 'desc'])
													// ->select(['id', 'anecdote'])
													// ->toArray();
				// $this->set("anecdotes_list",$anecdotes_list);
			// }
		}
	}

}