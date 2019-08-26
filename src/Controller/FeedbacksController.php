<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class FeedbacksController extends AppController
{

	public function index(){

		$http = new Client();
		$feedbacklist_response = $http->get(FEEDBACK_LIST);

		 $this->set('feedbacklist', $feedbacklist_response->json);


    }

    public function newfeedback(){
        
    	$noticesTable = TableRegistry::get('notices');

		if ($this->request->is('post')) {

			$notices=$noticesTable->newEntity();
			
			$notices->class_id=$this->request->data['class_id'];
			$notices->user_id=$this->request->data['user_id'];
			$notices->user_detail_id=$this->request->data['user_id'];
			$notices->heading=$this->request->data['heading'];
			$notices->details=$this->request->data['details'];
			$notices->student_id	=$this->request->data['student_id'];
			//$notices->attachment=$this->request->data['upload_file'];
			$notices->year=2017;
			$notices->is_active=1;

			if(!empty($notices->user_id) && !empty($notices->user_detail_id ) && !empty($notices->heading) && !empty($notices->details ) && !empty($notices->student_id )){

				if ($_FILES['upload_file']['size'] > 0) {



					$today              = strtotime("now");

					$notices->attachment_type=strtok($_FILES['upload_file']['type'], '/');
					// print_r($_SERVER);
				    $name=$_FILES['upload_file']['name'];
				    $file=explode('.', $name);
				    $ext = end($file); //extension of file
				    $target_path = $today.".".$ext ;
				    $target_path1 = WWW_ROOT . "uploads/notices/images/".$today.".".$ext ;
				    //$filename=$user_id.'.'.$file[1];
				    $tmp=$_FILES['upload_file']['tmp_name'];
				    move_uploaded_file($tmp, $target_path1);
				    //$profilepic="profilepic/".$filename;
			       
			       $notices->attachment_link    =   $target_path;
			       


			       // echo $target_path;	
			       // echo $ext;
				}

				if($noticesTable->save($notices)){
					
					$message = 'Notice Updated Successfully';



				}else{

					$message = 'Unable to update notice';
			    			
				}
			}
			else{
					$message = 'Unable to update notice';
			}



		}

		if(empty($message))
			$message = 'Please Enter All the Data';

		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		$teacherlist_response = $http->get(TEACHER_LIST);
		$studentlist_response = $http->get(ALL_STUDENT_LIST);

		$this->set('message',$message);
        $this->set('classlist', $classlist_response->json);
        $this->set('teacherlist', $teacherlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
    }
	
	public function editlist($id = null) 
	{
		$array[0]= $id;
		
		$noticesTable = TableRegistry::get('notices');
		
		$notices_list = $noticesTable->find("all")
									->where(['id'=>$id])
									->select(['user_id',
											  'user_detail_id',
											  'student_id',
											  'heading',
											  'details',
											  'class_id',
											  'attachment_link'])
									->first();
		
		$this->set("notices_list",$notices_list);
		if ($this->request->is('post')) {

			$notices=$noticesTable->get($id);
			
			$notices->class_id=$this->request->data['class_id'];
			$notices->user_id = $this->request->data['user_id'];
			$notices->user_detail_id = $this->request->data['user_id'];
			$notices->heading = $this->request->data['heading'];
			$notices->details = $this->request->data['details'];
			$notices->student_id = $this->request->data['student_id'];
			//$notices->attachment=$this->request->data['upload_file'];
			$notices->year=date("Y"); 
			$notices->is_active=1;

			if(!empty($notices->user_id) && !empty($notices->user_detail_id ) && !empty($notices->heading) && !empty($notices->details ) && !empty($notices->student_id )){

				if ($_FILES['upload_file']['size'] > 0) {



					$today              = strtotime("now");

					$notices->attachment_type=strtok($_FILES['upload_file']['type'], '/');
					// print_r($_SERVER);
				    $name=$_FILES['upload_file']['name'];
				    $file=explode('.', $name);
				    $ext = end($file); //extension of file
				    $target_path = $today.".".$ext ;
				    $target_path1 = WWW_ROOT . "uploads/notices/images/".$today.".".$ext ;
				    //$filename=$user_id.'.'.$file[1];
				    $tmp=$_FILES['upload_file']['tmp_name'];
				    move_uploaded_file($tmp, $target_path1);
				    //$profilepic="profilepic/".$filename;
			       
			       $notices->attachment_link    =   $target_path;
			       


			       // echo $target_path;	
			       // echo $ext;
				}

				if($noticesTable->save($notices)){
					
					$this->redirect(array("action" => "index"));



				}else{

					$message = 'Unable to update notice';
			    			
				}
			}
			else{
					$message = 'Unable to update notice';
			}



		}

		if(empty($message))
			$message = 'Please Enter All the Data';

		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		$teacherlist_response = $http->get(TEACHER_LIST);
		$studentlist_response = $http->get(ALL_STUDENT_LIST);

		$this->set('message',$message);
        $this->set('classlist', $classlist_response->json);
        $this->set('teacherlist', $teacherlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
		
	}

}