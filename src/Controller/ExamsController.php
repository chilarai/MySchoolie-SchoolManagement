<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class ExamsController extends AppController
{

	protected function read_and_delete_first_line($filename) {

	  $file = file($filename);
	  $output = $file[0];
	  unset($file[0]);
	  file_put_contents($filename, $file);
	  return $output;
	}

	public function index(){

		$examsTable = TableRegistry::get('exams');

		if($this->request->is('post')){

			
			$newexam=$examsTable->newEntity();

			$newexam->name = $this->request->data['exam'];
			$newexam->remark = $this->request->data['remarks'];

			if($examsTable->save($newexam)){

				$this->set('message', "Exam Created Successfully");

			}
				

		}

		$this->set('message', "Exam List");

		$exam_list = $examsTable->find("all")->select(['name', 'remark', 'id'])->toArray();

		$this->set('exam_list', $exam_list);
		

        
    }
	
	public function edit($id= null) {
		// getting the id for the row via get request
		$array[0]= $id;
		
		//selecting the row corresponding to the edit tab according to its id
		$exam_list = $this->Exams->find("all")->where(['id'=>$id])->select(['name', 'remark', 'id'])->first(); 

		$this->set('exam_list', $exam_list);
		
		
		$examsTable = TableRegistry::get('exams');
		

		if($this->request->is('post')){
			
			$examsedit = $examsTable->get($id); //defining the id for the row to be updated
			
			$examsedit->name = $this->request->data['exam'];
			$examsedit->remark = $this->request->data['remarks'];
			
			if($examsTable->save($examsedit)) { 
				
				$this->redirect(array("action" => "index"));
			}
		}
		
	}
	
	
		

    public function results(){

		$http = new Client();
		$response1 = $http->get(CLASS_LIST);
		$exams_list = $http->get(EXAMS_LIST);
		
		if($this->request->is('post')){
			

			$http = new Client();
			$responses = $http->post(VIEW_RESULT_BY_STUDENT, ['class_id'=>$this->request->data['class_id'],'exam_id'=>$this->request->data['exam_id'], 'rollno' => $this->request->data['rollno']]);

			$this->set('status', $responses->code);
			$this->set('responses', $responses->json);
		}


		$this->set('status', $response1->code);
		$this->set('response1', $response1->json);
		$this->set('exams_list', $exams_list->json);

        
    }


    public function marksystem(){
        
    }


    public function viewresultbystudentapi(){



		$this->viewBuilder()->layout('ajax');

		if ($this->request->is('post')) {

		 	$class_id = $this->request->data['class_id'];
		 	$rollno = $this->request->data['rollno'];
		 	$exam_id = $this->request->data['exam_id'];

		 	if(isset($class_id,$rollno)){


		 	 	$results = TableRegistry::get('results');

		 	 	$query = $results->query();

		 	 	$user_select = $query->find("all")->where(['class_id' => $class_id,'rollno'	=>	$rollno,'exam_id'	=>	$exam_id])->select(['id', 'exam_id', 'rollno', 'class_id','result_json','created_date'])->first();

		 	 	//pr($user_select);

		 	 	if(!empty($user_select)){

		 	 			$returnArray = array(
			 	 		"status"	=> "200",
			 	 		"message"	=> "Marks Details",
			 	 		"details"	=> $user_select->id,
			 	 		"exam"	=> $user_select->exam,
			 	 		"rollno"	=> $user_select->rollno,
			 	 		"class_id"	=> $user_select->class_id,
			 	 		"result"	=> json_decode($user_select->result_json,true),
			 	 		"created_date"	=> $user_select->created_date,
			 	 		);
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



	public function uploadresultcsvapi(){

		
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

		$this->viewBuilder()->layout('ajax');
		if ($this->request->is('post')) {
			
			$exams=$this->request->data['exam_id'];
			$class_id=$this->request->data['class_id'];
			//$file=$_FILES['upload_file']['tmp_name'];
			$file = $this->request->data['upload_file'];
			$file=$file['tmp_name'];

		 	if(isset($class_id, $file)){


				$Results = TableRegistry::get('Results');

				// $this->read_and_delete_first_line($file);

				$handle=fopen($file,'r');
				while ($data=fgetcsv($handle)) {

					if (!isset($header)) {
				        $header = $data;
				        continue;
				    }
				    $all_rows[] = array_combine($header, $data);

 				}


 				foreach ($all_rows as $key => $value) {

 		
					$result=$Results->newEntity();
					$result->exam_id=$exams;
					$result->rollno=$value['roll_no'];
					$result->class_id=$class_id;


					unset($value['roll_no']);
					$result->result_json=json_encode($value);


					$result->year= date("Y");
					$result->is_active=1;

					if($Results->save($result)){
					}
					
					$this->set('message', "successful");

					

	 	 			$returnArray = array(
		 	 		"status"	=> "200",
		 	 		"message"	=> "Insert Succesful",
		 	 		"details"	=> array()
		 	 		);

 					
 				}

 				//pr($all_rows);

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



	public function newresults(){

		$http = new Client();
		$response = $http->get(CLASS_LIST);
		$exams_list = $http->get(EXAMS_LIST);




		
		if($this->request->is('post')){

			$http = new Client();
			$responses = $http->post(ADD_RESULTS_CSV, ['class_id'=>$this->request->data['class_&_sections'],'exam_id'=>$this->request->data['exam_id'],'upload_file'=>$this->request->data['filename']]);
			
			$status = 200;
			$message = 'Result Uploaded Successfully';





		}
		else{

			$status = 403;
			$message = 'Upload Result';
		}

		

		$this->set('status', $status);
		$this->set('message', $message);
		$this->set('response', $response->json);  //required for lisitng class
		$this->set('exams_list', $exams_list->json); //required for listing exams

	}

}
