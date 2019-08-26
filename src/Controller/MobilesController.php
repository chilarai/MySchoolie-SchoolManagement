<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
use Cake\Routing\Router;
use Cake\Network\Http\Client;


class MobilesController extends AppController
{

	public function editstudent($id = null)
	{

		$this->viewBuilder()->layout('mobile');
		
		
		$array[0] = $id;
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
										   'parent_user_id'=>'user_parent.id',
										   'parent_password'=>'user_parent.password'
										   

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
		
		if($this->request->is('post'))
		{	
			$password = md5($this->request->data['password']);
			$confirm_password = $student_details->parent_password;
			if($password == $confirm_password)
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

				//$students->first_name	=		$this->request->data['first_name'];
				//$students->last_name	=		$this->request->data['last_name'];
				//$students->birthday		=		date("Y-m-d",strtotime($this->request->data['dob']));
				//$students->gender_type	=		$this->request->data['gender'];
				$students->details_json =		json_encode($details_json);
				$students->is_active	=		1;
				
				// $students->mobile 		=		$this->request->data['mobile'];

				if(!empty($this->request->data['aadhar']))
				$students->aadhar_card	=		$this->request->data['aadhar'];
				else
				$students->aadhar_card	=		"NA";


				$students->country		=		$this->request->data['country'];
			// ##course section	$students->course_id	=		$this->request->data['course_id'];
				//$students->handicap	=			$this->request->data['handicap'];

			if($Students->save($students))
			{
				$message = "<p style='color:#1371de;'>Success! Changes have been updated.</p>";
				$this->set("message",$message);
			}
				///// everything works fine till here
				
				

			}
			if($password != $confirm_password)
			{
				$message = "<p style='color:red;'>Wrong Password</p>";
				$this->set("message",$message);
			}
		}
			
	}
		
	public function editstaff()
	{

		$this->viewBuilder()->layout('mobile');
			
			
	}

}
?>	