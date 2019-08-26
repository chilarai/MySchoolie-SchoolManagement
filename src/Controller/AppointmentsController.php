<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;



class AppointmentsController extends AppController
{

	public function index(){

		if ($this->request->is('post')){



			if(!empty($this->request->data['type'])){
				
				$type = $this->request->data['type'];
				$http = new Client();
				$appointment_list = $http->post(APPOINTMENT_LIST, ['type'=>$type]);

				 $this->set('appointment_list', $appointment_list->json);
								
			}
		}
        
    }


    public function requestbyparent(){
		// $this->viewBuilder()->layout('ajax');
		$appointmentsTable = TableRegistry::get('appointments');
		if ($this->request->is('post')) {
			$appointments=$appointmentsTable->newEntity();
			$appointments->student_id=$this->request->data['student_id'];
			$appointments->user_detail_id=$this->request->data['user_detail_id'];
			$appointments->subject=$this->request->data['subject'];
			$appointments->class_id=$this->request->data['class_id'];
			$appointments->requested_date	=$this->request->data['requested_date'];
			$appointments->offered_date=$this->request->data['requested_date'];
			$appointments->is_active=1;


		 	$query = $appointmentsTable->query();
		 	//will delete all appointment from this particular user_id
			$query->delete()
    			  ->where(['user_detail_id' => $this->request->data['user_detail_id'],
    			  		   'student_id'	=> $this->request->data['student_id']])
    			  ->execute();

			if($appointmentsTable->save($appointments)){
				$returnArray = array(
		    			"status"	=> "200",
		    			"message"	=> "Successfull",
		    			"details"	=> array()
		    		);
			}else{
				$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "Appointment Could Not Be Created",
		    			"details"	=> array()
		    		);
		    			
			}


		}else{

        	$returnArray = array(
    			"status"	=> "403",
    			"message"	=> "Invalid method",
    			"details"	=> array()
    		);
        }
        $this->set("response", $returnArray);

	}


	


	public function modifyappointment(){

		$this->viewBuilder()->layout('ajax');

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
		$this->log(  $this->request->query , 'debug');


		//______________________________debug_data________________________

		if ($this->request->is('post')) {

			$Connector = ConnectionManager::get('default');


			$status = $this->request->data['appointment_status'];
			$appointment_id = $this->request->data['appointment_id'];

		 	if(!empty($appointment_id) && !empty($status)){


		 	 	$appointments = TableRegistry::get('appointments');

		 	 	$query = $appointments->query();

		 	 	$Connector->execute("UPDATE appointments
									 SET is_active = ".$status." 
									 WHERE id = ".$appointment_id);

		 	 					//pr($Connector);
		    	$returnArray = array(
				"status"	=> "200",
				"message"	=> "Appointment Updated Succefully",
				"details"	=> array()
				);
		 	 								

		 	 	
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




	public function editappointment($id){

        $appointmentsTable = TableRegistry::get('appointments');


        if ($this->request->is('post')) {



            $appointment_detail = $appointmentsTable->get($id);

            $appointment_detail->subject = $this->request->data['subject'];
            $appointment_detail->teacher_remarks = $this->request->data['teacher_remarks'];
            $appointment_detail->offered_date = strtotime($this->request->data['date']);
            $appointment_detail->is_active = $this->request->data['status'];



            $appointmentsTable->save($appointment_detail);

            if($appointment_detail->isNew()){

                $message = 'Appointment Could not be Edited';
                $status  = 400;

            }else{



                $message = 'Appointment updated Succesfully';
                $status  = 200;

            }
        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;


        }
        

        $appointment_detail_get = $appointmentsTable->find("all")->where(['appointments.id' => $id])
		 	 							 ->select(['appointment_id'=>'appointments.id',
		 	 							 		   'student_name'=> "concat(students.first_name,' ',students.last_name)",
		 	 							 		   'parent_name' => 'users_parent.name',
		 	 							 		   'teacher_name' => "concat(users_teacher.firstname,' ',users_teacher.lastname)",
		 	 							 		   'class'=>"concat(classes.class,' ',classes.section)", 
		 	 							 		   'subject' => 'appointments.subject', 
		 	 							 		   'date' =>'date(appointments.offered_date)',
		 	 							 		   'type'=>'appointments.is_active',
		 	 							 		   'teacher_remarks'=>'teacher_remarks'])		
										 ->join([
											        'table' => 'students',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.student_id = students.id '])
										 ->join([
											        'table' => 'class_students',
											        'type' => 'LEFT',
											        'conditions' => 'students.id = class_students.student_id '])
										 ->join([
											        'table' => 'classes',
											        'type' => 'LEFT',
											        'conditions' => 'class_students.class_id = classes.id '])
										 ->join([
											        'table' => 'user_details',
											        'alias' => 'users_teacher',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.teacher_id = users_teacher.id '])
										 
										 ->join([
											        'table' => 'users',
											        'alias' => 'users_parent',
											        'type' => 'LEFT',
											        'conditions' => 'appointments.user_detail_id = users_parent.id'])
						 	 			->first();


        $this->set("appointment_detail_get", $appointment_detail_get);








        $this->set('status',$status);
        $this->set('message',$message);

    }

}