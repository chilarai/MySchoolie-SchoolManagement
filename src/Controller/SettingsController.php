<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class SettingsController extends AppController
{

	protected function read_and_delete_first_line($filename) {

	  $file = file($filename);
	  $output = $file[0];
	  unset($file[0]);
	  file_put_contents($filename, $file);
	  return $output;
	}

	public function index(){

    }



    public function uploadstudents(){

        $http = new Client();
        $classlist_response = $http->get(CLASS_LIST);

        $coursesTable 				= 		TableRegistry::get('courses');
        $course_list				=		$coursesTable->find('all')
											  ->select(['id','course_name'])
											  ->toArray();

		if ($this->request->is('post')) {



			$file = $this->request->data['upload_file'];
			$file=$file['tmp_name'];

		 	if(isset($file)){

		 		$this->read_and_delete_first_line($file);

		 		$handle=fopen($file,'r');

				while ($data=fgetcsv($handle)){



					$class_id				=		$this->request->data['class_id'];

					$Students 				= 		TableRegistry::get('students');
					$ClassStudents 			= 		TableRegistry::get('class_students');
					$Users 					= 		TableRegistry::get('user_details');
					$Attendances 			= 		TableRegistry::get('attendances');
					$ParentStudents 		= 		TableRegistry::get('parent_students');

					$details_json['blood_group']    =   $data[2];
					$details_json['caste']    =   $data[10];
					$details_json['address']    =   $data[11].','.$data[12].','.$data[13].','.$data[14];
					$details_json['father_occupation']    =   $data[17];
					$details_json['mother_name']    =   $data[19];
					$details_json['mother_mobile']    =   $data[20];
					$details_json['mother_occupation']    =   $data[21];
					$details_json['fee_exemption']    =  $data[22];
					$details_json['exempted_amount']    =   $data[23];
					$details_json['exemption_reason']    =   $data[24];
					$details_json['special_remarks']    =   $data[27];					


					
					$students 				=		$Students->newEntity();

					$students->first_name	=		$data[0];
					$students->last_name	=		$data[1];
					$students->birthday		=		date("Y-m-d",strtotime($data[4]));
					$students->gender_type	=		$data[3];
					$students->details_json =		json_encode($details_json);
					$students->is_active	=		1;
					$students->admission_no =		$data[26];
					$students->joining_date =		date("Y-m-d",strtotime($data[25]));
					$students->mobile 		=		$data[5];

					if(!empty($data[6]))
					$students->aadhar_card	=		$data[6];
					else
					$students->aadhar_card	=		"NA";


					$students->country		=		$data[7];
					$students->course_id	=		$this->request->data['course_id'];
					$students->handicap	=			$data[8];

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
						$UserDetails = TableRegistry::get('UserDetails');
						
						$user=$users->newEntity();
						$user->mobile	=	$data[16];
						$user->password =	md5(1234);
						$user->name		=	$data[15];
						$user->user_type_id = 5;
						$user->is_active=1;

						$users->save($user);
					}

					if($user->isNew()){

					}else{

						//Saving In User_details Table

						$userdetails=$UserDetails->newEntity();

						$userdetails->id=$user->id;
						$userdetails->user_id=$user->id;
						$userdetails->user_type_id=5;

						$name_father = explode(' ', $user->name	, 2);

						$userdetails->firstname=$name_father[0];

						if(!empty($name_father[1]))
							$userdetails->lastname=$name_father[1];

						$userdetails->email	=	$data[18];
						$userdetails->mobile	=	$data[16];
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


						if($data[23] > 0){


							$fee_exemptTable = TableRegistry::get('fee_exemptions');

							$fee_exempt=$fee_exemptTable->newEntity();

				            $fee_exempt->student_id=$students_id;
				            $fee_exempt->exempted_on=$data[22];
				            $fee_exempt->amount=$data[23];
				            $fee_exempt->reason=$data[24];
				            $fee_exempt->is_active=1;

				            $fee_exemptTable->save($fee_exempt);
				        }

					}


				}

				fclose($handle);

				if($userdetails->isNew()){

	                $message = 'Unable to Save Information';
	                $status  = 400;

	            }else{


	                $message = 'Teacher Record Inserted Succesfully';
	                $status  = 200;

	            }
        	}
        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }


        $this->set('course_list', $course_list);
        $this->set('classlist', $classlist_response->json);


        $this->set('status',$status);
        $this->set('message',$message);
	}


    public function uploadteachers(){
	
		if ($this->request->is('post')) {



			$file = $this->request->data['upload_file'];
			$file=$file['tmp_name'];

		 	if(isset($file)){

		 		$this->read_and_delete_first_line($file);

		 		$handle=fopen($file,'r');

				while ($data=fgetcsv($handle)){



					$other_detail['blood_group']     =   $data[4];
		            $other_detail['caste']    =   $data[7];
		            $other_detail['gender']    =   $data[5];
		            $other_detail['dob']    =   $data[6];
		            $other_detail['highest_qualification']    =   $data[8];
		            $other_detail['qualification_stream']    =   $data[9];
		            $other_detail['university']    =   $data[10];
		            $other_detail['college']    =   $data[11];
		            $other_detail['pass_year']    =   $data[12];
		            $other_detail['applied_for']    =   $data[13];
		            $other_detail['salary_bracket']    =   $data[14];
		            $other_detail['joining_date']    =   $data[15];

		            //saving In Users Table

		            $users = TableRegistry::get('Users');
		            $UserDetails = TableRegistry::get('UserDetails');
		            
		            $user=$users->newEntity();
		            $user->mobile   =   $data[2];
		            $user->password =   md5(1234);
		            $user->name     =   $data[0].' '.$data[1];
		            $user->user_type_id = 4;
		            $user->is_active=1;

		            $users->save($user);


		            //Saving In User_details Table

		            $userdetails=$UserDetails->newEntity();

		            $userdetails->id=$user->id;
		            $userdetails->user_id=$user->id;
		            $userdetails->user_type_id=4;

		   

		            $userdetails->firstname=$data[0];

		            $userdetails->lastname=$data[1];

		            $userdetails->email =   $data[3];
		            $userdetails->mobile    =  $data[2];
		            $userdetails->other_details= json_encode($other_detail);
		            $userdetails->is_active=1;

		            $UserDetails->save($userdetails);

		            $attendancesTable = TableRegistry::get('attendance_teachers');

       				$attendances=$attendancesTable->newEntity();
					$attendances->user_id=$user->id;
					$attendances->year=date("Y");
					$attendances->is_active=1;

					$attendancesTable->save($attendances);


				}

				fclose($handle);

				if($userdetails->isNew()){

	                $message = 'Unable to Save Information';
	                $status  = 400;

	            }else{


	                $message = 'Teacher Record Inserted Succesfully';
	                $status  = 200;

	            }
        	}
        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }


        $this->set('status',$status);
        $this->set('message',$message);
	}


    public function uploadparents(){
		if($this->request->is('post')){
			$http = new Client();
			$response = $http->post(ADD_PARENTS_CSV, ['upload_file'=>$this->request->data['filename']]);
			
			$this->set('status', $response->code);
			$this->set('response', $response->json);
		}
	}


	public function uploadclasssection(){
		
		$http = new Client();
		$response = $http->get(CLASS_LIST);

		if($this->request->is('post')){
			$http = new Client();
			$responses = $http->post(ADD_CLASS_CSV, ['upload_file'=>$this->request->data['filename']]);
			$this->set('status', $responses->code);
			$this->set('responses', $responses->json);
		}
		
		$this->set('status', $response->code);
		$this->set('response', $response->json);

	}


	public function uploadfeestructure(){

		if ($this->request->is('post')) {



			$file = $this->request->data['upload_file'];
			$file=$file['tmp_name'];

		 	if(isset($file)){


				$feeTable = TableRegistry::get('fee_structures');

				$this->read_and_delete_first_line($file);

				$handle=fopen($file,'r');
				while ($data=fgetcsv($handle)) {

					//pr($data);
					$newfee=$feeTable->newEntity();
					$newfee->class=$data[0];
					$newfee->total_fee=$data[2];
					$newfee->branch=$data[1];

					$fee_detail['tution'] = $data[3];
					$fee_detail['computer'] = $data[4];
					$fee_detail['publication'] = $data[5];
					$fee_detail['annual_charges'] = $data[6];
					$fee_detail['transport'] = $data[7];

					$newfee->fee_detail_json=json_encode($fee_detail);


					if($feeTable->save($newfee)){

					}
				
					$this->set('status', "200");
					$this->set('message', "Fee Structure Uploaded successfully");

					

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> " Fee Structure Uploaded successfully",
			 	 		"details"	=> array()
			 	 		);
 				}

 				fclose($handle);

 			}
        }
        else{

			$this->set('status', "300");
			$this->set('message', "Upload Fee Structure");

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Upload Fee Structure",
    			"details"	=> array()
    		);
        }




        $this->set("response", $returnArray);
	}


	public function addsalarystructure(){

		if ($this->request->is('post')) {
	

			$salary_structuresTable = TableRegistry::get('salary_structures');

			$newsalary=$salary_structuresTable->newEntity();
			
			$newsalary->grade=$this->request->data['grade'];
			$newsalary->basic=$this->request->data['basic'];
			$newsalary->hra=$this->request->data['hra'];
			$newsalary->conveyance=$this->request->data['conveyance'];
			$newsalary->deduction=$this->request->data['deduction'];
			$newsalary->total= ($newsalary->basic + $newsalary->hra + $newsalary->conveyance - $newsalary->deduction);			


			if($salary_structuresTable->save($newsalary)){

			}
			
			$this->set('status', "200");
			$this->set('message', "Salary Structure Uploaded successfully");			

 		}        
        else{

			$this->set('status', "300");
			$this->set('message', "Upload Salary Structure");


        }
    }
}