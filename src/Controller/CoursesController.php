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

class CoursesController extends AppController
{

	public function index(){



       	$coursesTable = TableRegistry::get('courses');


		if ($this->request->is('post')) {

		    $course = $this->request->data['course'];
        	$total_subjects = $this->request->data['total_subjects'];
        	$remarks = $this->request->data['remarks'];
        	$marking_type = $this->request->data['marking_type'];

	        if(isset($course,$total_subjects,$marking_type)){



	         	$courses  	=	$coursesTable->newEntity();
	         	$courses->course_name = $course;
	         	$courses->total_subjects = $total_subjects;

	         	if(!empty($remarks)){
	         		$courses->remark = $remarks;
	         	}

	         	$courses->mark_type = $marking_type;


				if($coursesTable->save($courses)){

					$courseadd_message = "Course Added Successfully" ;

				}else{
					$courseadd_message = "Unable To Upload Course" ;
				}
	        }
	        else{
					$courseadd_message = "Unable To Upload Course" ;
	        }
	    }

	    $course_list = $coursesTable->find("all")
	    							->select(['course_name', 
	    									  'total_subjects', 
	    									  'remark',
											  'id'])
	    							->order(['id'=>'desc'])
	    							->toArray();

	    if(empty($course_list))
	    	$course_list[] = array('course_name' => '','total_subjects'=>'','remarks'=>'');

	   	if(empty($courseadd_message))
	    	$courseadd_message = "Upload a Course" ;

	    $this->set('course_list', $course_list);
		$this->set('status', $courseadd_message);




    }

// editcourse begins here

	public function editcourse($id= null) {
		$array[0]= $id;
		
		$coursesTable = TableRegistry::get('courses');
		
		$course_list = $coursesTable->find("all")
									->where(['id'=>$id])
									->select(['course_name',
											  'total_subjects',
											  'remark',
											  'mark_type'])
									->first();
		$this->set('course_list', $course_list);
		
		if($this->request->is('post')) {
			$editcourse = $coursesTable->get($id);
			
			$editcourse->course_name = $this->request->data['course'];
	        $editcourse->total_subjects =  $this->request->data['total_subjects'];
			$editcourse->remark = $this->request->data['remarks'];
			$editcourse->mark_type = $this->request->data['marking_type'];
			
				if($coursesTable->save($editcourse)){

					$this->redirect(array("action" => "index"));
				}
		}
	}

    public function subjects(){

    	$subjectsTable = TableRegistry::get('subjects');


		if ($this->request->is('post')) {
			
			




	        if(isset($this->request->data['subject'])){

				$subject = $this->request->data['subject'];
				$remarks = $this->request->data['remarks'];

	         	$subjects  	=	$subjectsTable->newEntity();
	         	$subjects->name = $subject;

	         	if(!empty($remarks)){
	         		$subjects->remark = $remarks;
	         	}

				if($subjectsTable->save($subjects)){

					$subjectadd_message = "Subject Added Successfully" ;

				}else{
					$subjectadd_message = "Unable To Upload Subject" ;
				}
	        }
	        else{
					$subjectadd_message = "Unable To Upload Subject" ;
	        }
	    }

		$subject_list = $subjectsTable->find("all")
	    							->select(['name', 
	    									  'remark',
											  'id'])
	    							->order(['id'=>'desc'])
	    							->toArray();

	    if(empty($subject_list))
	    	$subject_list;

	   	if(empty($subjectadd_message))
	    	$subjectadd_message = "Upload a Subject" ;

	    $this->set('subject_list', $subject_list);
		$this->set('status', $subjectadd_message);
		


    }
	
	public function editsubject($id= null)
	{ 
		$array[0]= $id;
		
		$subjectsTable = TableRegistry::get('subjects');
		
		$subject_list = $subjectsTable->find("all")
									->where(['id'=>$id])
	    							->select(['name', 
	    									  'remark',
											  'id'])
	    							->first();
									
		$this->set('subject_list', $subject_list);
			
		if($this->request->is('post')) {
			$editsub = $subjectsTable->get($id);
			
			$editsub->name = $this->request->data['name'];
			$editsub->remark = $this->request->data['remark'];
			   
			   if($subjectsTable->save($editsub)) {
				   $this->redirect(array("action" => "subjects"));
					
				}
		
		}

	}

	
	
    public function coursesubjects(){

    	$coursesTable = TableRegistry::get('courses');
 		$subjectsTable = TableRegistry::get('subjects');
 		$coursesubjectsTable = TableRegistry::get('course_subjects');

	    $course_list = $coursesTable->find("all")
						->select(['id','course_name', 
								  'total_subjects', 
								  'remark'])
						->order(['id'=>'desc'])
						->toArray();
		
	    $subject_list = $subjectsTable->find("all")
							->select(['id','name', 
									  'remark'])
							->order(['id'=>'desc'])
							->toArray(); 


	 //    if(empty($course_list))
	 //    	$subject_list[] = array('id' => ' ','course_name' => ' ','total_subjects'=>' ', 'remark'=>' ');

	 //		if(empty($subject_list))
	 //    	$subject_list[] = array('id' => ' ','name' => ' ','remark'=>' ');

		if ($this->request->is('post')) {

		    $subject_id = $this->request->data['subject_id'];
        	$course_id = $this->request->data['course_id'];
        	$subject_type = $this->request->data['subject_type'];
        	if(isset($subject_id,$course_id,$subject_type)){

        		
        		$addnew  	=	$coursesubjectsTable->newEntity();

        		$addnew->course_id = $course_id;
        		$addnew->subject_id = $subject_id;
        		$addnew->subject_type = $subject_type;

        		if($coursesubjectsTable->save($addnew)){

					$add_message = "Relation Added Successfully" ;

				}else{
					$add_message = "Unable To Map Relation" ;
				}
        	}
        	else{
					$add_message = "Unable To Map Relation" ;
	        }


        }	


	    $relation_list = $coursesubjectsTable->find("all")
							->select(['course_name'=>'courses.course_name',
									  'subject_name'=>'subjects.name', 
									  'id'
									  ])
							// ->order(['id'=>'desc'])
							->join([
							        'table' => 'courses',
							        'type' => 'LEFT',
							        'conditions' => 'course_subjects.course_id = courses.id'])
				 	 					->join([
							        'table' => 'subjects',
							        'type' => 'LEFT',
							        'conditions' => 'course_subjects.subject_id = subjects.id'])
				 	 		->toArray();

	   	$this->set('subject_list', $subject_list);
		$this->set('course_list', $course_list);
		$this->set('relation_list', $relation_list);
    }
	
	public function deleterelation($id)
	{
		$array[0] = $id;
		$coursesubjectsTable = TableRegistry::get('course_subjects');
		$entity = $coursesubjectsTable->get($id);
		if($coursesubjectsTable->delete($entity))
		{
			$this->redirect(array("action" => "coursesubjects"));
			
		}
	}
	
	public function editrelation($id= null) 
	{
		$array[0]= $id;
		
		$coursesTable = TableRegistry::get('courses');
 		$subjectsTable = TableRegistry::get('subjects');
 		$coursesubjectsTable = TableRegistry::get('course_subjects');

	    $course_list = $coursesTable->find("all")
						->select(['id','course_name', 
								  'total_subjects', 
								  'remark'])
						->order(['id'=>'desc'])
						->toArray();
		
		$this->set('course_list', $course_list);
		
	    $subject_list = $subjectsTable->find("all")
							->select(['id','name', 
									  'remark'])
							->order(['id'=>'desc'])
							->toArray(); 
		
		$this->set('subject_list', $subject_list);
		
		$relation_list = $coursesubjectsTable->find("all")
											 ->where(['id'=>$id])
											 ->select(['id',
													   'course_id',
													   'subject_id',
													   'subject_type'])
											 ->first();
											 
		$this->set('relation_list', $relation_list);
		
		if($this->request->is('post')) 
		{
			$subject_id = $this->request->data['subject_id'];
        	$course_id = $this->request->data['course_id'];
        	$subject_type = $this->request->data['subject_type'];
        	if(isset($subject_id,$course_id,$subject_type)){

        		
        		$edit  	=	$coursesubjectsTable->get($id);

        		$edit->course_id = $course_id;
        		$edit->subject_id = $subject_id;
        		$edit->subject_type = $subject_type;

        		if($coursesubjectsTable->save($edit)){

					$add_message = "Relation Added Successfully" ;
					$this->redirect(array("action" => "coursesubjects"));

				}else{
					$add_message = "Unable To Map Relation" ;
				}
        	}
        	else{
					$add_message = "Unable To Map Relation" ;
	        }

		}
	}
}