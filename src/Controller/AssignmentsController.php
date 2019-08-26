<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;


class AssignmentsController extends AppController
{

	public function index(){

		if ($this->request->is('post')){
			$type = $this->request->data['type'];

			if(!empty($type)){
				$http = new Client();
				$assignment_list = $http->post(ASSIGNMENT_LIST, ['type'=>$type]);

				 $this->set('assignment_list', $assignment_list->json);
			}

		}

        
    }

    public function upload()
	{

    	$assignmentsTable = TableRegistry::get('assignments');

		if ($this->request->is('post')) 
		{
			$assignments=$assignmentsTable->newEntity();

			$assignments->user_detail_id=$this->request->data['user_id'];
			$assignments->subject_id=$this->request->data['subject_id'];
			$assignments->submission_date=strtotime($this->request->data['submission_date']);
			$assignments->homework	=$this->request->data['description'];
			$assignments->class_id=$this->request->data['class_id'];
			//$assignments->attachment=$this->request->data['upload_file'];
			$assignments->year=date("Y"); 
			$assignments->is_active=1;

			if(!empty($assignments->submission_date) && !empty($assignments->class_id ) && !empty($assignments->user_detail_id) && !empty($assignments->subject_id ) && !empty($assignments->user_detail_id )){

				if ($_FILES['upload_file']['size'] > 0) {



					$today              = strtotime("now");

					$name=$_FILES['upload_file']['name']; //need to mention enctype multiform data $_FILES will be used to get files from form print $_FILES to know more about the array it outputs 
					$file=explode('.', $name);
					$ext = end($file); //extension of file
					$target_path = $today.".".$ext ;
					$target_path1 = WWW_ROOT . "uploads/assignments/images/".$today.".".$ext ;
				//	$filename=$user_id.'.'.$file[1];
					$tmp=$_FILES['upload_file']['tmp_name'];
					move_uploaded_file($tmp, $target_path1);
				//	$profilepic="profilepic/".$filename;

					$assignments->attachment_link    =   $target_path;
					
					$assignments->attachment_type = $ext; 
			       


			       // echo $target_path;	
			       // echo $ext;
				}

				if($assignmentsTable->save($assignments)){
					
					$message = 'Assignment Updated Successfully';
					$this->redirect(array("action" => "index"));



				}else{

					$message = 'Unable to update assignment';
			    			
				}
			}
			else{
					$message = 'Unable to update assignment';
			}

		}

		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		$teacherlist_response = $http->get(TEACHER_LIST);
		$subjectlist_response = $http->get(SUBJECT_LIST);

        $this->set('classlist', $classlist_response->json);
        $this->set('teacherlist', $teacherlist_response->json);
        $this->set('subjectlist', $subjectlist_response->json);
    }
	
	public function editassignment($id = null)
	{	
		$array[0]= $id;
		

    	$assignmentsTable = TableRegistry::get('assignments');
		
		$assignments = $assignmentsTable->find("all")
										->where(['id'=>$id])
										->select(['id',
												   'user_detail_id',
												   'subject_id',
												   'class_id',
												   'submission_date',
												   'homework',
												   'attachment_link'])
										->first();
		$this->set("assignments", $assignments);

		if ($this->request->is('post')) 
		{
			$assignments=$assignmentsTable->get($id);
			
			$assignments->user_detail_id=$this->request->data['user_id'];
			$assignments->subject_id=$this->request->data['subject_id'];
			$assignments->submission_date=strtotime($this->request->data['submission_date']);
			$assignments->homework	=$this->request->data['description'];
			$assignments->class_id=$this->request->data['class_id'];
			//$assignments->attachment=$this->request->data['upload_file'];
			$assignments->year=date("Y"); 
			$assignments->is_active=1;

			if(!empty($assignments->submission_date) && !empty($assignments->class_id ) && !empty($assignments->user_detail_id) && !empty($assignments->subject_id ) && !empty($assignments->user_detail_id )){

				if ($_FILES['upload_file']['size'] > 0) {



					$today = strtotime("now");

					$name=$_FILES['upload_file']['name']; //need to mention enctype multiform data $_FILES will be used to get files from form print $_FILES to know more about the array it outputs 
					$file=explode('.', $name);
					$ext = end($file); //extension of file
					$target_path = $today.".".$ext ;
					$target_path1 = WWW_ROOT . "uploads/assignments/images/".$today.".".$ext ;
					$filename=$user_id.'.'.$file[1];
					$tmp=$_FILES['upload_file']['tmp_name'];
					move_uploaded_file($tmp, $target_path1);
					$profilepic="profilepic/".$filename;

					$assignments->attachment_link    =   $target_path;
					
					$assignments->attachment_type = $ext; 
			       


			       // echo $target_path;	
			       // echo $ext;
				}

				if($assignmentsTable->save($assignments)){
					
					$this->redirect(array("action" => "index"));



				}else{

					$message = 'Unable to update assignment';
			    			
				}
			}
			else{
					$message = 'Unable to update assignment';
			}

		}

		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		$teacherlist_response = $http->get(TEACHER_LIST);
		$subjectlist_response = $http->get(SUBJECT_LIST);

        $this->set('classlist', $classlist_response->json);
        $this->set('teacherlist', $teacherlist_response->json);
        $this->set('subjectlist', $subjectlist_response->json);
    }
		
	

}