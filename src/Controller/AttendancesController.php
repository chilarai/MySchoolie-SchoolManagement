<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class AttendancesController extends AppController
{
	
	protected function read_and_delete_first_line($filename) {

	  $file = file($filename);
	  $output = $file[0];
	  unset($file[0]);
	  file_put_contents($filename, $file);
	  return $output;
	}
	
	public function index()
	{

		$classTable = TableRegistry::get('classes');


		$class_list = $classTable->find("all")->select(['id', 'class', 'section']);


		$this->set("classes", $class_list);

		if ($this->request->is('post')) {

		 	$class_id = $this->request->data['class_id'];
		 	$date1 = $this->request->data['date1'];
		 	$date2 = $this->request->data['date2'];


		 	$time = strtotime($date1);

			$newformat1 = date('Y-m-d',$time);

			$time = strtotime($date2);

			$newformat2 = date('Y-m-d',$time);

		 	//echo $newformat1.$newformat2;


		 	if(isset($class_id,$date1,$date2)){


		 	 	$attendance = TableRegistry::get('attendance_details');

		 	 	$query = $attendance->query();


		 	 	$date1 = $this->request->data['date1'];
		 	 	$date2 = $this->request->data['date2'];

		 	 	date_default_timezone_set('Asia/Calcutta');
				//$date = date("Y-m-d");

		 	 	$data = $query->find("all")
		 	 							->where(['classes.id' => $class_id, 'students.is_active' => 1])
		 	 						     ->where(function ($exp, $q) {
						        return $exp->addCase(
						            [

						                $q->newExpr()->between('date', date("Y-m-d",strtotime($this->request->data['date1'])) , 
						                							   date("Y-m-d",strtotime($this->request->data['date2']))  )

						            ]
						        );
						    })
		 	 						 ->select(['student_id','first_name'=>'students.first_name',
		 	 						 		   'last_name'=>'students.last_name',
		 	 						 		   'class'=>'classes.class', 
		 	 						 		   'section'=>'classes.section', 		 	 						 		    
		 	 						 		   'status'=>'attendance_type', 
		 	 						 		   'date'=>'date'])
		 	 			->join([
					        'table' => 'students',
					        'type' => 'LEFT',
					        'conditions' => 'attendance_details.student_id = students.id'
					    ])
		 	 			->join([
					        'table' => 'class_students',
					        'type' => 'LEFT',
					        'conditions' => 'class_students.student_id = students.id'
					    ])
					    ->join([
					        'table' => 'classes',
					        'type' => 'LEFT',
					        'conditions' => 'class_students.class_id = classes.id'
					    ])
					    ->order(['classes.id' => 'DESC','date'=>'DESC'])
					    ->toArray();

						$control = 0;
						$date_check = "";
						foreach ($data as $key => $value) 
						{
								$new_date = $value['date']->day."-".$value['date']->month;
								
								if($date_check != $new_date){
	
									$control = 0;
								}
								
								if($control == 0){
									$date_check = $new_date;
									$array[$new_date][$date_check] = $new_date;
									$control++;
								}
								
								$array[$new_date][$value['student_id']] = $value['status'];
								

						}


		 	 	if(!empty($data))
				{

		 	 		
					$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Attendance Report",
			 	 		"details"	=> $array
						);

					//report generation
			 	 		
						
						
						$ex_keys = array_keys($array);
						$required_key = $ex_keys[0];
						//$unset_key = unset($required_key[0]);

						$student_ids = array_keys($array[$required_key]);
						$this->set("student_ids", $student_ids);
						$this->set("required_key", $required_key);
						$students_table = TableRegistry::get('students');
						$student_names = $students_table->find("all")
										->select(['student_name'=> "concat(students.first_name,' ',students.last_name)"])
										->where(['students.id IN' => $student_ids])
										->toArray();
					//report generation
			 	 		if ($this->request->data['view_download'] == 0)
						{
							$this->response->download('export.csv');

							$_serialize = 'array';
							$this->set(compact('array', '_serialize'));
							$this->viewBuilder()->className('CsvView.Csv');
							$_header = ["date"];
							
							foreach($student_names as $student_names){
								 $_header[] = $student_names->student_name; 
							  }

							
							//$_extract = ['status'];
							$this->set(compact('data', '_serialize', '_header'));
						}
						else
						{	
							
							$_serialize = 'array';
							$this->set(compact('array', '_serialize'));
							$this->set("data",$data);
							
							$this->set("student_names",$student_names);
						}
		 	 	}
		 	 	else{
		 	 		$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "No Record Found",
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

    public function upload(){
        
        $http = new Client();
		$response = $http->get(CLASS_LIST);

		$ClassStudents = TableRegistry::get('ClassStudents');
		if($this->request->is('post')){
			$http = new Client();
			$responses = $http->post(ADD_ATTENDANCES_CSV, ['class_id'=>$this->request->data['class_&_sections'],'date'=>$this->request->data['event_date'],'upload_file'=>$this->request->data['filename']]);

			
			
			$this->set('status', $responses->code);
			$this->set('responses', $responses->json);
			}

		$this->set('status', $response->code);
		$this->set('response', $response->json);
    }



    public function uploadcsv(){



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

		//$this->viewBuilder()->layout('ajax');
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		


		
		if ($this->request->is('post')) {


			$class_id=$this->request->data['class_id'];
			//$file=$_FILES['upload_file']['tmp_name'];
			$file = $this->request->data['upload_file'];
			$file=$file['tmp_name'];

		 	if(isset($class_id, $file)){


				$ClassStudents = TableRegistry::get('ClassStudents');
				$AttendancesTable = TableRegistry::get('Attendances');
				$AttendanceDetailTable = TableRegistry::get('attendance_details');

				$this->read_and_delete_first_line($file);
				
				$handle=fopen($file,'r');
				while ($data=fgetcsv($handle)) {
				
				$classstudent=$ClassStudents->find('all')->where(['roll_no'=>$data[0],'class_id' => $class_id])->first();


				$dailyattendance = $AttendanceDetailTable->newEntity();
				$dailyattendance->student_id = $classstudent->student_id;
				$dailyattendance->date = date('Y-m-d',strtotime($data[2]));
				$dailyattendance->attendance_type = $data[1];
				$dailyattendance->is_active = 1;

				if($AttendanceDetailTable->save($dailyattendance)){
				


				
				
					$this->set('message', "successful");

					

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Insert Succesful",
			 	 		"details"	=> array()
			 	 		);
 				}
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
		$this->set('message',$message);
        $this->set('classlist', $classlist_response->json);
	}
	public function editattendance()
	{
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		$studentlist_response = $http->get(ALL_STUDENT_LIST);


		
		
		if($this->request->is('post'))
		{	
			//$class_id = $this->request->data['class_id'];
			$student_id = $this->request->data['student_id'];
			$date = $this->request->data['date'];
			$type = $this->request->data['type'];
			
			$attendance_details_table = TableRegistry::get('attendance_details');
			
			$attendance = $attendance_details_table->find("all")
												->select(['id'])
												->where(['student_id' => $student_id, 'date' => date('Y-m-d',strtotime($date))])
												->first();
			
			$attendance_id = $attendance->id;

			//$this->set("attendance_id", $attendance_id);
			if (empty($attendance_id))
			{
				$update_attendance = $attendance_details_table->newEntity();
				
				$update_attendance->student_id = $student_id;
				$update_attendance->is_active = 1;
				$update_attendance->date = date('Y-m-d',strtotime($date));
				$update_attendance->attendance_type = $this->request->data['attendance'];
				if($attendance_details_table->save($update_attendance))
				{
					

						

							$returnArray = array(
							"status"	=> "200",
							"message"	=> "Attendance has been added for the selected date",
							"details"	=> array()
							);
				}
				else
				{
							$returnArray = array(
							"status"	=> "403",
							"message"	=> "Unexpected Error: Attendance could not be added",
							"details"	=> array()
							);
				}
						
			}
			else
			{
				$update_attendance = $attendance_details_table->get($attendance_id);
			
				$update_attendance->attendance_type = $this->request->data['attendance'];
				if($attendance_details_table->save($update_attendance))
				{
					

						

							$returnArray = array(
							"status"	=> "200",
							"message"	=> "Attendance has been updated",
							"details"	=> array()
							);
				}
				else
				{
							$returnArray = array(
							"status"	=> "403",
							"message"	=> "Unexpected Error:  Attendance cannot be updated",
							"details"	=> array()
							);
				}
			}
		}
		$this->set("response", $returnArray);
        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
	}
	
	public function classattendance()
	{	
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		
		if($this->request->is('post'))
		{	
			$class_id = $this->request->data['class_id'];
			$date = $this->request->data['date'];
			$attendance = $this->request->data['attendance'];
			$student_id = $this->request->data['student_id'];
			if(!empty($class_id) AND empty($date))
			{
				$students_table = TableRegistry::get('students');
				$class_students_table = TableRegistry::get('class_students');
				
				$class_id = $this->request->data['class_id'];
				$students = $class_students_table->find("all")
													->select(['student_id'])
													->where(['class_id' => $class_id])
													->toArray();
				foreach ($students as $key => $value) 
				{
					$student_ids[$key]=$value['student_id'];
				}
				//$this->set('student_ids', $student_ids);
				$students_list = $students_table->find("all")
												->where(['students.id IN' => $student_ids])
												->andWhere(['is_active' => 1])
												->select(['student_name'=> "concat(students.first_name,' ',students.last_name)", 'id'])
												->toArray();
				$this->set('students_list', $students_list);
			}
			if(!empty($date))
			{	
				$attendance_details_table = TableRegistry::get('attendance_details');
				foreach ($attendance as $key => $value)
				{
					$newattendance = $attendance_details_table->newEntity();
					
					$newattendance->student_id = $student_id[$key];
					$newattendance->attendance_type = $attendance[$key];
					$newattendance->date = date('Y-m-d',strtotime($date));
					$newattendance->is_active = 1;
					
					
						if($attendance_details_table->save($newattendance))
						{
							
							$returnArray = array(
								"status"	=> "200",
								"message"	=> "Attendance uploaded successfully",
								"details"	=> array()
								);



						}
						else
						{

							$returnArray = array(
								"status"	=> "400",
								"message"	=> "Unable to upload menu",
								"details"	=> array()	
								);
						}
							$this->set('message', $returnArray);
					
					
					
				}
			}
			
		}
		$this->set('classlist', $classlist_response->json);
	}
	//----------------------------------------------------------bus attendance form generate------------------------------------------------------------------
	
	public function busattendanceform()
	
	{
		$fleet_routesTable = TableRegistry::get('fleet_routes'); 
				
				$routes_list = $fleet_routesTable->find("all")
												->select([
														  'id' => 'fleet_routes.id',
														  'routes_id' => 'routes.id',
														  
														  'name' => "concat(routes.name, '|', fleet_routes.session)"])
												 ->join ([
															'table' => 'routes',
															'type' => 'LEFT',
															'conditions' => 'fleet_routes.route_id = routes.id' ])
												->toArray();
				$this->set("routes_list", $routes_list);
				
		if($this->request->is('post')) 
		{
					$passengersTable = TableRegistry::get('passengers');
					$fleet_routesTable = TableRegistry::get('fleet_routes');
					$route_id = $this->request->data['route_id'];
					
					$query = $fleet_routesTable->query();

					$data = $query->find("all") ->where(['fleet_routes.id' => $route_id])
												->select(['roll_no' => 'class_students.roll_no',
														  'student_name' => "concat(students.first_name,' ',students.last_name)",
														  'class' => 'classes.class',
														  'section' => 'classes.section',
														  'status' => "concat('')"])
												->join ([
															'table' => 'passengers',
															'type' => 'LEFT',
															'conditions' => 'fleet_routes.id = passengers.fleet_route_id' ])
												->join([
															'table' => 'users',
															'type' => 'LEFT',
															'conditions' => 'fleet_routes.user_id = users.id'])
												->join ([
															'table' => 'students',
															'type' => 'LEFT',
															'conditions' => 'passengers.student_id = students.id'])
												->join ([ 
															'table' => 'fleets',
															'type' => 'LEFT',
															'conditions' => 'fleet_routes.fleet_id = fleets.id'])
												->join([
															'table' => 'class_students',
															'type' => 'LEFT',
															'conditions' => 'students.id = class_students.student_id'])
												->join([
															'table' => 'classes',
															'type' => 'LEFT',
															'conditions' => 'class_students.class_id = classes.id'])
												->toArray();
					
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
			 	 	
						 $this->response->download('attendanceform.csv');
						 $_serialize = 'data';
						 $this->set(compact('data', '_serialize'));
						 $this->viewBuilder()->className('CsvView.Csv');
						 $_header = ['Name', 'Roll Number','Class','Section','Status'];
						 $_extract = ['student_name', 'roll_no','class','section', 'status'];
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
		} 	 $this->set("response", $returnArray);
	}
	//--------------------------------------------- csv bus attendance upload -------------------------------------------------------------
	
	public function busattendance()
	{
		
		
		if ($this->request->is('post')) {
			
			$file = $this->request->data['upload_file'];
			$file=$file['tmp_name'];
			

		 	try { if(isset($file)){


		 		
				$class_studentsTable = TableRegistry::get('class_students');
				$classTable = TableRegistry::get('classes');
				$passengersTable = TableRegistry::get('passengers');
				$bus_attendance_detailsTable = TableRegistry::get('bus_attendance_details');
				
				$this->read_and_delete_first_line($file);

				$handle=fopen($file,'r');
				while ($data=fgetcsv($handle))
				{
					
				
				
					$class_id = $classTable->find("all")->where(['class' =>$data[2], 'section' =>$data[3]])->select(['id'])->first();
					
					
					
					$classstudent = $class_studentsTable->find("all")->where(['roll_no' => $data[1], 'class_id'=> $class_id->id])->select(['student_id'])->first();
					
					$passengers_id = $passengersTable->find("all")->where(['student_id' => $classstudent->student_id])->select(['id'])->first(); 
					
					$dailyattendance = $bus_attendance_detailsTable->newEntity();
					
					$dailyattendance->passenger_id = $passengers_id->id;
					
					$dailyattendance->date = date('Y-m-d',strtotime($this->request->data['event_date']));
					$dailyattendance->attendance_type = $data[4];
					if($bus_attendance_detailsTable->save($dailyattendance))
					{
					

					

						

							$returnArray = array(
							"status"	=> "200",
							"message"	=> "Update Succesful",
							"details"	=> array()
							);
					} else {
							$returnArray = array(
							"status"	=> "400",
							"message"	=> "Update Unsuccesful",
							"details"	=> array()
							);
					}
				}	fclose($handle);
			} }
			catch(\Exception $m) {
							$returnArray = array(
							"status"	=> "400",
							"message"	=> "Update Unsuccesful, Check File Format",
							"details"	=> array()
							);
				
				
			}
			
	$this->set('message', $returnArray);
      
				
		}
	}
	//-------------------------------------------------------------------report generate----------------------------------------------------------------

	public function busattendancereport() 
	{
		$fleet_routesTable = TableRegistry::get('fleet_routes'); 
				
				$routes_list = $fleet_routesTable->find("all")
												->select([
														  'id' => 'fleet_routes.id',
														  'routes_id' => 'routes.id',
														  
														  'name' => "concat(routes.name, '|', fleet_routes.session)"])
												 ->join ([
															'table' => 'routes',
															'type' => 'LEFT',
															'conditions' => 'fleet_routes.route_id = routes.id' ])
												->toArray();
				$this->set("routes_list", $routes_list);
		
		if($this->request->is('post')) 
		{  
			$route_id = $this->request->data['route_id'];
		 	$date1 = $this->request->data['date1'];
		 	$date2 = $this->request->data['date2'];
			
			$time = strtotime($date1);

			$newformat1 = date('Y-m-d',$time);

			$time = strtotime($date2);

			$newformat2 = date('Y-m-d',$time);

		 	//echo $newformat1.$newformat2;


		 	if(isset($route_id,$date1,$date2))
			{
				$bus_attendance_detailsTable = TableRegistry::get('bus_attendance_details');
				
				$query = $bus_attendance_detailsTable->query();
				
				$date1 = $this->request->data['date1'];
		 	 	$date2 = $this->request->data['date2'];

		 	 	date_default_timezone_set('Asia/Calcutta');
				//$date = date("Y-m-d");

		 	 	$data = $query->find("all")
		 	 							->where(['fleet_routes.id' => $route_id])
		 	 						     ->where(function ($exp, $q) {
						        return $exp->addCase(
						            [

						                $q->newExpr()->between('date', date("Y-m-d",strtotime($this->request->data['date1'])) , 
						                							   date("Y-m-d",strtotime($this->request->data['date2']))  )

						            ]
						        );
						    })
		 	 						 ->select(['first_name'=>'students.first_name',
		 	 						 		   'last_name'=>'students.last_name',
		 	 						 		   'class'=>'classes.class', 
		 	 						 		   'section'=>'classes.section', 		 	 						 		    
		 	 						 		   'status'=>'attendance_type', 
		 	 						 		   'date'=>'date'
											   ])
		 	 			->join([
					        'table' => 'passengers',
					        'type' => 'LEFT',
					        'conditions' => 'bus_attendance_details.passenger_id = passengers.id'
					    ])
						->join([
					        'table' => 'fleet_routes',
					        'type' => 'LEFT',
					        'conditions' => 'passengers.fleet_route_id = fleet_routes.id'
					    ])
						->join ([
								'table' => 'routes',
								'type' => 'LEFT',
								'conditions' => 'fleet_routes.route_id = routes.id' ])
						->join([
					        'table' => 'students',
					        'type' => 'LEFT',
					        'conditions' => 'passengers.student_id = students.id'
					    ])
		 	 			->join([
					        'table' => 'class_students',
					        'type' => 'LEFT',
					        'conditions' => 'class_students.student_id = students.id'
					    ])
					    ->join([
					        'table' => 'classes',
					        'type' => 'LEFT',
					        'conditions' => 'class_students.class_id = classes.id'
					    ])
					    ->order(['classes.id' => 'DESC','date'=>'DESC'])
					    ->toArray();
				//--------------------------------------------
				
						$fleet_routesTable = TableRegistry::get('fleet_routes'); 
				
				$routes_name = $fleet_routesTable->find("all")
												->where(['fleet_routes.id' => $route_id])
												->select([
														  'name' => "concat(routes.name, '|', fleet_routes.session)"])
												 ->join ([
															'table' => 'routes',
															'type' => 'LEFT',
															'conditions' => 'fleet_routes.route_id = routes.id' ])
												->first();
				$this->set("routes_name",$routes_name);
				$csvfilename = $routes_name['name'].".csv";
				
				//--------------------------------------------
						if(!empty($data)){

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Attendance Report",
			 	 		"details"	=> $data
			 	 		// "exam"	=> $data->exam,
			 	 		// "rollno"	=> $data->rollno,
			 	 		// "class_id"	=> $data->class_id,
			 	 		// "result"	=> json_decode($data->result_json,true),
			 	 		// "created_date"	=> $data->created_date,
			 	 		);

					//report generation
			 	 		$this->response->download($csvfilename);

						$_serialize = 'data';
						$this->set(compact('data', '_serialize'));
						$this->viewBuilder()->className('CsvView.Csv');
						$_header = ['first_name', 'last_name','class','section', 
									'status','date(M/D/YYYY)'];
						$_extract = ['first_name', 'last_name','class','section', 
									'status','date'];
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
	
	public function workingdays()
	{
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);


		
       
		if($this->request->is('post'))
		{
			$workingdays_table = TableRegistry::get('working_days');
			
			$addworkingdays = $workingdays_table->newEntity();
			
			$addworkingdays->class_id = $this->request->data['class_id'];
			$addworkingdays->working_days = $this->request->data['days'];
			$addworkingdays->month = $this->request->data['month'];
			
			if($workingdays_table->save($addworkingdays)) {	
						
				$returnArray = array(
				"status"	=> "200",
				"message"	=> "Working Days Succesfully Uploaded",
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
					
			
		}
		$this->set('classlist', $classlist_response->json);
		$this->set("response", $returnArray); 
	}

}