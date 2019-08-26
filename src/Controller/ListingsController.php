<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Network\Session\DatabaseSession;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\Log\Log;
use Cake\Routing\Router;

class ListingsController extends AppController
{

	protected function read_and_delete_first_line($filename) {

	  $file = file($filename);
	  $output = $file[0];
	  unset($file[0]);
	  file_put_contents($filename, $file);
	  return $output;
	}

	public function classlist(){

		$this->viewBuilder()->layout('ajax');

		$schoolsTable = TableRegistry::get('classes');

		if($this->request->is("get")){

			$school_details = $schoolsTable->find("all")->select(['id', 'class', 'section'])->toArray();

			if(!empty($school_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Classes",
					"details"	=> array(
						"class_list"	=> $school_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "School details not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}
	//vendor list added by Abhishek

	public function vendorlist() 
	{
		$this->viewBuilder()->layout('ajax');

		$vendorTable = TableRegistry::get('fleet_vendors');

		if($this->request->is("get")){
			
			$vendor_details = $vendorTable->find("all")->toArray();
			
			if(!empty($vendor_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Vendors",
					"details"	=> array(
						"vendor_list"	=> $vendor_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Vendor details not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}
			


	public function teacherlist(){

		$this->viewBuilder()->layout('ajax');

		$usersTable = TableRegistry::get('users');

		if($this->request->is("get")){

			$teacher_details = $usersTable->find("all")->where(['user_type_id' => 4,'is_active'=>1])->select(['id', 'name'])->toArray();

			if(!empty($teacher_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Teachers",
					"details"	=> array(
						"teacher_list"	=> $teacher_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Teachers details not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}

	public function subjectlist(){

		$this->viewBuilder()->layout('ajax');

		$schoolsTable = TableRegistry::get('subjects');

		if($this->request->is("get")){

			$school_details = $schoolsTable->find("all")->select(['id', 'name'])->toArray();

			if(!empty($school_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Subjects",
					"details"	=> array(
						"subject_list"	=> $school_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Subject  details not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}



	public function uploadclassapi(){

		$this->viewBuilder()->layout('ajax');
		if ($this->request->is('post')) {



			//$file=$_FILES['upload_file']['tmp_name'];
			$file = $this->request->data['upload_file'];
			$file=$file['tmp_name'];

		 	if(isset($file)){


				$classesTable = TableRegistry::get('classes');

				$this->read_and_delete_first_line($file);

				$handle=fopen($file,'r');
				while ($data=fgetcsv($handle)) {

					//pr($data);
					$classes=$classesTable->newEntity();
					$classes->class=$data[0];
					$classes->section=$data[1];
					$classes->is_active=1;

					if($classesTable->save($classes)){

					}
				
					$this->set('message', "successful");

					

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Insert Succesful",
			 	 		"details"	=> array()
			 	 		);
 				}

 				fclose($handle);

 			}
        }
        else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
	}

	public function assignmentlist(){

		$this->viewBuilder()->layout('ajax');

		if ($this->request->is('post')) {

		 	$type = $this->request->data['type'];

		 	if(isset($type)){


		 	 	$assignments = TableRegistry::get('assignments');

		 	 	$query = $assignments->query();


		 	 	if($type == 1)
		 	 		$user_select = $query->find("all")->where(['submission_date < CURDATE()'])
		 	 							 ->select(['id','subject_name'=> 'subjects.name','date_submission' => 'date(submission_date)', 'homework','date_created'=>'date(assignments.created_date)','attachment_link','attachment_type'])		
				 	 					 ->join([
									        'table' => 'subjects',
									        'type' => 'LEFT',
									        'conditions' => 'assignments.subject_id = subjects.id'])
				 	 					 ->toArray();
		 	 	elseif($type == 2)
		 	 	 	$user_select = $query->find("all")->where(['submission_date = CURDATE()'])
		 	 	 									  ->select(['id','subject_name'=> 'subjects.name','date_submission' => 'date(submission_date)', 'homework','date_created'=>'date(assignments.created_date)','attachment_link','attachment_type'])		
							 	 					 ->join([
												        'table' => 'subjects',
												        'type' => 'LEFT',
												        'conditions' => 'assignments.subject_id = subjects.id'])
							 	 					 ->toArray();
		 	 	elseif($type == 3)
			 	 	$user_select = $query->find("all")->where(['submission_date >= CURDATE()'])
			 	 						->select(['id','subject_name'=> 'subjects.name','date_submission' => 'date(submission_date)', 'homework','date_created'=>'date(assignments.created_date)','attachment_link','attachment_type'])		
				 	 					 ->join([
									        'table' => 'subjects',
									        'type' => 'LEFT',
									        'conditions' => 'assignments.subject_id = subjects.id'])
				 	 					 ->toArray();
			 	elseif($type == 4)
			 	 	$user_select = $query->find("all")
			 	 						 ->select(['id','subject_name'=> 'subjects.name','date_submission' => 'date(submission_date)', 'homework','date_created'=>'date(assignments.created_date)','attachment_link','attachment_type'])		
				 	 					 ->join([
									        'table' => 'subjects',
									        'type' => 'LEFT',
									        'conditions' => 'assignments.subject_id = subjects.id'])
				 	 					 ->toArray();


		 	 	if(!empty($user_select)){

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Assignment details",
			 	 		"details"	=> $user_select
			 	 		);
		 	 	}
		 	 	else{
		 	 		$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "No Assignment Found",
		    			"details"	=> array()
		    		);
		 	 	}
		 	 	
		 	 }
		 	 else{
		 	 	$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Invalid parameter",
	    			"details"	=> array()
	    		);
		 	 }
 
        }
        else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);

	}

	public function allstudentlist(){

		$this->viewBuilder()->layout('ajax');

		$schoolsTable = TableRegistry::get('students');

		if($this->request->is("get")){

			$school_details = $schoolsTable->find("all")
							->select(['id','name'=> "concat(students.first_name,' ',students.last_name)", 'class_section' =>"concat(classes.class,' ',classes.section)"])
							->where(['students.is_active' => 1])
							->join([	'table' => 'class_students',
										'type' => 'LEFT',
										'conditions' => 'students.id = class_students.student_id'])
							->join([	'table' => 'classes',
										'type' => 'LEFT',
										'conditions' => 'class_students.class_id = classes.id'])													
							->toArray();

			if(!empty($school_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Students",
					"details"	=> array(
						"student_list"	=> $school_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Students details not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}

	public function studentlist(){

		//_______________________________debug_data_______________________
      

		//CakeLog::write('debug', 'Where is this message going?');

       	date_default_timezone_set('Asia/Calcutta');

		Log::config('mylog', [
		    'className' => 'File',
		    'path' => LOGS,
		    'levels' => ['notice', 'info', 'debug'],
		    'file' => 'mylog',
			]);

		$this->log(   Router::url( $this->here, true ), 'debug');
		$this->log(  $this->request->data , 'debug');
		//$this->log(  $this->request->query , 'debug');


		//______________________________debug_data________________________

		$this->viewBuilder()->layout('ajax');

		$schoolsTable = TableRegistry::get('students');

		if($this->request->is("post")){

			$class_id = $this->request->data['class_id'];

			$school_details = $schoolsTable->find("all")
										   ->where(['classes.id' => $class_id])
										   ->select(['id','name'=> "concat(first_name,' ',last_name)"])
											->join([
												        'table' => 'class_students',
												        'type' => 'LEFT',
												        'conditions' => 'students.id = class_students.student_id'])
											->join([
												        'table' => 'classes',
												        'type' => 'LEFT',
												        'conditions' => 'class_students.class_id = classes.id'])
							 	 			->toArray();

			if(!empty($school_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Students",
					"details"	=> array(
						"student_list"	=> $school_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Students details not found",
	    			"details"	=> array(
						"student_list"	=>  array('id' => '','name' => '' )
						)
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array(
						"student_list"	=> array()
						)
    		);
        }

        $this->set("response", $returnArray);
		
	}


	public function feedbacklist(){

		$this->viewBuilder()->layout('ajax');

		$feedbacksTable = TableRegistry::get('notices');

		if($this->request->is("get")){

			$school_details = $feedbacksTable->find("all")
											 ->select(['student_name'=> "concat(students.first_name,' ',students.last_name)",
											 		   'class'=>"concat(classes.class,' ',classes.section)",
											 		   'rollno'=>'class_students.roll_no',	
													   'teacher_name'=> "users.name",
													   'heading'=>"heading",
													   'details'=>'details',
													   'attachment_link',
													   'attachment_type',
													   'date_created'=>'date(notices.created_date)'
													  ])							 	 
											 ->join([
												        'table' => 'students',
												        'type' => 'LEFT',
												        'conditions' => 'notices.student_id = students.id'])
											 ->join([
												        'table' => 'users',
												        'type' => 'LEFT',
												        'conditions' => 'notices.user_id = users.id'])
											 ->join([
												        'table' => 'class_students',
												        'type' => 'LEFT',
												        'conditions' => 'students.id = class_students.student_id'])
											 ->join([
												        'table' => 'classes',
												        'type' => 'LEFT',
												        'conditions' => 'class_students.class_id = classes.id'])
							 	 			->toArray();

			if(!empty($school_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Notices",
					"details"	=> array(
						"notice_list"	=> $school_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Notices not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}


	public function completelist(){

		$this->viewBuilder()->layout('ajax');

		$studentsTable = TableRegistry::get('students');

		if($this->request->is("get")){

			$student_details = $studentsTable->find("all")
											 ->select(['student_id'=>'students.id',
											 		   'student_name'=> "concat(students.first_name,' ',students.last_name)",
													   'teacher_name'=> 'user_teacher.name',
													   'parent_name'=>'user_parent.name',
													   'teacher_id'=>'user_teacher.id',
													   'parent_id'=>'user_parent.id',
													   'class_id'=>'classes.id',
													   'class'=>'classes.class',
													   'section'=>'classes.section'

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

							 	 			->toArray();

							 	 			// echo(sizeof($student_details));

			if(!empty($student_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Students",
					"details"	=> array(
						"student_list"	=> $student_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Students details not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}


	public function appointmentlist(){

		$this->viewBuilder()->layout('ajax');

		if ($this->request->is('post')) {

		 	$type = $this->request->data['type'];

		 	if(isset($type)){


		 	 	$appointments = TableRegistry::get('appointments');

		 	 	$query = $appointments->query();


		 	 	if($type == 1)
		 	 		$user_select = $query->find("all")->where(['offered_date > CURDATE()'])
		 	 							 ->select(['appointment_id'=>'appointments.id',
		 	 							 		   'student_name'=> "concat(students.first_name,' ',students.last_name)",
												   'details_json'=>'students.details_json',
												   'student_id'=>'students.id',
		 	 							 		   'parent_name' => 'users.name', 
		 	 							 		   'subject' => 'appointments.subject', 
		 	 							 		   'date' =>'date(appointments.offered_date)',
		 	 							 		   'type'=>'appointments.is_active'])		
										 ->join([
											        'table' => 'students',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.student_id = students.id '])
										 ->join([
											        'table' => 'users',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.user_detail_id = users.id'])
						 	 			->toArray();
		 	 	elseif($type == 2)
		 	 	 	$user_select = $query->find("all")->where(['offered_date < CURDATE()'])
		 	 	 									  ->select(['appointment_id'=>'appointments.id',
		 	 							 		   'student_name'=> "concat(students.first_name,' ',students.last_name)",
												   'details_json'=>'students.details_json',
												   'student_id'=>'students.id',
		 	 							 		   'parent_name' => 'users.name', 
		 	 							 		   'subject' => 'appointments.subject', 
		 	 							 		   'date' =>'date(appointments.offered_date)',
		 	 							 		   'type'=>'appointments.is_active'])		
										 ->join([
											        'table' => 'students',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.student_id = students.id '])
										 ->join([
											        'table' => 'users',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.user_detail_id = users.id'])
						 	 			->toArray();
		 	 	elseif($type == 3)
			 	 	$user_select = $query->find("all")->where(['offered_date = CURDATE()'])
			 	 						 ->select(['appointment_id'=>'appointments.id',
		 	 							 		   'student_name'=> "concat(students.first_name,' ',students.last_name)",
												   'details_json'=>'students.details_json',
												   'student_id'=>'students.id',
		 	 							 		   'parent_name' => 'users.name', 
		 	 							 		   'subject' => 'appointments.subject', 
		 	 							 		   'date' =>'date(appointments.offered_date)',
		 	 							 		   'type'=>'appointments.is_active'])		
										 ->join([
											        'table' => 'students',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.student_id = students.id '])
										 ->join([
											        'table' => 'users',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.user_detail_id = users.id'])
						 	 			->toArray();
			 	elseif($type == 4)
			 	 	$user_select = $query->find("all")
			 	 						 ->select(['appointment_id'=>'appointments.id',
		 	 							 		   'student_name'=> "concat(students.first_name,' ',students.last_name)",
												   'details_json'=>'students.details_json',
												   'student_id'=>'students.id',
		 	 							 		   'parent_name' => 'users.name', 
		 	 							 		   'subject' => 'appointments.subject', 
		 	 							 		   'date' =>'date(appointments.offered_date)',
		 	 							 		   'type'=>'appointments.is_active'])		
										 ->join([
											        'table' => 'students',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.student_id = students.id '])
										 ->join([
											        'table' => 'users',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.user_detail_id = users.id'])
						 	 			->toArray();


		 	 	if(!empty($user_select)){

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Appointment details",
			 	 		"details"	=> $user_select
			 	 		);
		 	 	}
		 	 	else{
		 	 		$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "No Appointment Found",
		    			"details"	=> array()
		    		);
		 	 	}
		 	 	
		 	 }
		 	 else{
		 	 	$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Invalid parameter",
	    			"details"	=> array()
	    		);
		 	 }
 
        }
        else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);

	}

public function teacherleavelist(){

		$this->viewBuilder()->layout('ajax');

		$leavesTable = TableRegistry::get('leaves_teachers');

		if($this->request->is("get")){

			$leaves_details = $leavesTable->find("all")
										  ->select(['leave_id'=>'leaves_teachers.id',
										  	   'user_id'=>'leaves_teachers.user_id',
		 	 						 		   'leaves_teachers.leave_reason',
		 	 						 		   'leaves_teachers.leave_from',
		 	 						 		   'leaves_teachers.leave_to', 
		 	 						 		   'leaves_teachers.is_active', 
		 	 						 		   'leaves_teachers.created_date', 
		 	 						 		   'teacher_firstname'=>'user_details.firstname',
		 	 						 		   'teacher_lastname'=>'user_details.lastname'])
										  ->join([
									        'table' => 'user_details',
									        'type' => 'LEFT',
									        'conditions' => 'leaves_teachers.user_id = user_details.user_id'])
										  ->toArray();

			if(!empty($leaves_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Teachers Leave",
					"details"	=> array(
						"class_list"	=> $leaves_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Teachers Leaves not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}


	public function acceptleaveteacher(){

		$this->viewBuilder()->layout('ajax');

		if ($this->request->is('post')) {

		 	$leave_id = $this->request->data['leave_id'];

		 	if(isset($leave_id)){


		 	 	$Leaves = TableRegistry::get('leaves_teachers');

		 	 	$query = $Leaves->query();

		 	 	$user_select = $query->find("all")->where(['id' => $leave_id])->first();

		 	 	if(!empty($user_select)){

		 	 		$user_select->is_active = 2;
		 	 		$Leaves->save($user_select);

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "leave accepted"

			 	 		);
		 	 	}
		 	 	else{
		 	 		$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "No leaves found",
		    			"details"	=> array()
		    		);
		 	 	}
		 	 	
		 	 }
		 	 else{
		 	 	$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Invalid parameter",
	    			"details"	=> array()
	    		);
		 	 }
 
        }
        else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);

	}


	public function rejectleaveteacher(){

		$this->viewBuilder()->layout('ajax');

		if ($this->request->is('post')) {

		 	$leave_id = $this->request->data['leave_id'];

		 	if(isset($leave_id)){


		 	 	$Leaves = TableRegistry::get('leaves_teachers');

		 	 	$query = $Leaves->query();

		 	 	$user_select = $query->find("all")->where(['id' => $leave_id])->first();

		 	 	if(!empty($user_select)){

		 	 		$user_select->is_active = 3;
		 	 		$Leaves->save($user_select);

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "leave rejected"

			 	 		);
		 	 	}
		 	 	else{
		 	 		$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "No leaves found",
		    			"details"	=> array()
		    		);
		 	 	}
		 	 	
		 	 }
		 	 else{
		 	 	$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Invalid parameter",
	    			"details"	=> array()
	    		);
		 	 }
 
        }
        else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);

	}


	public function studentdetail(){

		$this->viewBuilder()->layout('ajax');

		if ($this->request->is('post')) {

		 	$student_id = $this->request->data['student_id'];

		 	if(isset($student_id)){


		 	 	$studentsTable = TableRegistry::get('students');


				$user_select = $studentsTable->find("all")
											->where(['students.id'=>$student_id])
											 ->select(['student_id'=>'students.id',
											 			'gender'=>'students.gender_type',
											 		   'student_name'=> "concat(students.first_name,' ',students.last_name)",
													   'teacher_name'=> 'user_teacher.name',
													   'parent_name'=>'user_parent.name',
													   'teacher_id'=>'user_teacher.id',
													   'parent_id'=>'user_parent.id',
													   'class_id'=>'classes.id',
													   'class'=>'classes.class',
													   'section'=>'classes.section'

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

							 	 			->first();

		 	 	if(!empty($user_select)){

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "student_detail",
			 	 		"details" => $user_select

			 	 		);
		 	 	}
		 	 	else{
		 	 		$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "No details Found",
		    			"details"	=> array()
		    		);
		 	 	}
		 	 	
		 	 }
		 	 else{
		 	 	$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Invalid parameter",
	    			"details"	=> array()
	    		);
		 	 }
 
        }
        else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);

	}

	public function examslist(){

		$this->viewBuilder()->layout('ajax');

		$examsTable = TableRegistry::get('exams');

		if($this->request->is("get")){

			$exam_details = $examsTable->find("all")->select(['id', 'name', 'remark'])->toArray();

			if(!empty($exam_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "List of All Exams",
					"details"	=> array(
						"exams_list"	=> $exam_details
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Exams details not found",
	    			"details"	=> array()
	    		);
	 	 	}
			
		}
		else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }

        $this->set("response", $returnArray);
		
	}




}