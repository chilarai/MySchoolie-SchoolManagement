<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class CalendarsController extends AppController
{

	public function index(){
        
    }

    	public function newevent(){
        
    }

	public function calendar(){
        
    }
	public function newtimetable()
	{
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		


		
        $this->set('classlist', $classlist_response->json);
        
	}
	public function timetableview()
	{
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		


		
        $this->set('classlist', $classlist_response->json);
        
	}

	public function timetable($course_id)
	{
		$array[0] = $course_id;
		
        $TimetablesTable = TableRegistry::get('Timetables');
        $CourseSubjectsTable = TableRegistry::get('CourseSubjects');

        $subjects = $CourseSubjectsTable->find('all')
										->select(['Subjects.name', 'Subjects.id'])
										->where(['CourseSubjects.course_id'=>$course_id, 'CourseSubjects.is_active'=>1])
										->contain(['Subjects']);

        $this->set('subjects', $subjects);
		
		$selected_list = $TimetablesTable->find("all")
										->select(['id', 'timetable_json'])
										->where(['course_id' => $course_id])
										->first();
		$this->set("selected_list", $selected_list);
		
		$timetable_json = json_decode($selected_list['timetable_json'],true);
		
		$this->set("timetable_json",$timetable_json);
		
		if($this->request->is("post"))
		{
			$checkempty = $TimetablesTable->find("all")
										->select(['id', 'timetable_json'])
										->where(['course_id' => $course_id])
										->first();
			$idcheck = $checkempty->id;
			
			if(empty ($idcheck))
			{	
				$TimetablesTable = TableRegistry::get('Timetables');
				
				$timetable_json['d1p1'] = $this->request->data['d1p1'];
				$timetable_json['d1p2'] = $this->request->data['d1p2'];
				$timetable_json['d1p3'] = $this->request->data['d1p3'];
				$timetable_json['d1p4'] = $this->request->data['d1p4'];
				$timetable_json['d1p5'] = $this->request->data['d1p5'];
				$timetable_json['d1p6'] = $this->request->data['d1p6'];
				$timetable_json['d1p7'] = $this->request->data['d1p7'];
				$timetable_json['d1p8'] = $this->request->data['d1p8'];
				$timetable_json['d1p9'] = $this->request->data['d1p9'];
				
				$timetable_json['d2p1'] = $this->request->data['d2p1'];
				$timetable_json['d2p2'] = $this->request->data['d2p2'];
				$timetable_json['d2p3'] = $this->request->data['d2p3'];
				$timetable_json['d2p4'] = $this->request->data['d2p4'];
				$timetable_json['d2p5'] = $this->request->data['d2p5'];
				$timetable_json['d2p6'] = $this->request->data['d2p6'];
				$timetable_json['d2p7'] = $this->request->data['d2p7'];
				$timetable_json['d2p8'] = $this->request->data['d2p8'];
				$timetable_json['d2p9'] = $this->request->data['d2p9'];
				
				$timetable_json['d3p1'] = $this->request->data['d3p1'];
				$timetable_json['d3p2'] = $this->request->data['d3p2'];
				$timetable_json['d3p3'] = $this->request->data['d3p3'];
				$timetable_json['d3p4'] = $this->request->data['d3p4'];
				$timetable_json['d3p5'] = $this->request->data['d3p5'];
				$timetable_json['d3p6'] = $this->request->data['d3p6'];
				$timetable_json['d3p7'] = $this->request->data['d3p7'];
				$timetable_json['d3p8'] = $this->request->data['d3p8'];
				$timetable_json['d3p9'] = $this->request->data['d3p9'];
				
				$timetable_json['d4p1'] = $this->request->data['d4p1'];
				$timetable_json['d4p2'] = $this->request->data['d4p2'];
				$timetable_json['d4p3'] = $this->request->data['d4p3'];
				$timetable_json['d4p4'] = $this->request->data['d4p4'];
				$timetable_json['d4p5'] = $this->request->data['d4p5'];
				$timetable_json['d4p6'] = $this->request->data['d4p6'];
				$timetable_json['d4p7'] = $this->request->data['d4p7'];
				$timetable_json['d4p8'] = $this->request->data['d4p8'];
				$timetable_json['d4p9'] = $this->request->data['d4p9'];
				
				$timetable_json['d5p1'] = $this->request->data['d5p1'];
				$timetable_json['d5p2'] = $this->request->data['d5p2'];
				$timetable_json['d5p3'] = $this->request->data['d5p3'];
				$timetable_json['d5p4'] = $this->request->data['d5p4'];
				$timetable_json['d5p5'] = $this->request->data['d5p5'];
				$timetable_json['d5p6'] = $this->request->data['d5p6'];
				$timetable_json['d5p7'] = $this->request->data['d5p7'];
				$timetable_json['d5p8'] = $this->request->data['d5p8'];
				$timetable_json['d5p9'] = $this->request->data['d5p9'];
				
				$timetable_json['d6p1'] = $this->request->data['d6p1'];
				$timetable_json['d6p2'] = $this->request->data['d6p2'];
				$timetable_json['d6p3'] = $this->request->data['d6p3'];
				$timetable_json['d6p4'] = $this->request->data['d6p4'];
				$timetable_json['d6p5'] = $this->request->data['d6p5'];
				$timetable_json['d6p6'] = $this->request->data['d6p6'];
				$timetable_json['d6p7'] = $this->request->data['d6p7'];
				$timetable_json['d6p8'] = $this->request->data['d6p8'];
				$timetable_json['d6p9'] = $this->request->data['d6p9'];
				
				$addtimetable = $TimetablesTable->newEntity();			
				$addtimetable->timetable_json = json_encode($timetable_json);
				
				$addtimetable->course_id = $course_id;
				$addtimetable->is_active = "1";
				
				$TimetablesTable->save($addtimetable);
				
			} else {
				$TimetablesTable = TableRegistry::get('Timetables');
				
				$findid = $TimetablesTable->find("all")
										->select(['id', 'timetable_json'])
										->where(['course_id' => $course_id])
										->first();
				$id = $findid->id;
				$timetable_json['d1p1'] = $this->request->data['d1p1'];
				$timetable_json['d1p2'] = $this->request->data['d1p2'];
				$timetable_json['d1p3'] = $this->request->data['d1p3'];
				$timetable_json['d1p4'] = $this->request->data['d1p4'];
				$timetable_json['d1p5'] = $this->request->data['d1p5'];
				$timetable_json['d1p6'] = $this->request->data['d1p6'];
				$timetable_json['d1p7'] = $this->request->data['d1p7'];
				$timetable_json['d1p8'] = $this->request->data['d1p8'];
				$timetable_json['d1p9'] = $this->request->data['d1p9'];
				
				$timetable_json['d2p1'] = $this->request->data['d2p1'];
				$timetable_json['d2p2'] = $this->request->data['d2p2'];
				$timetable_json['d2p3'] = $this->request->data['d2p3'];
				$timetable_json['d2p4'] = $this->request->data['d2p4'];
				$timetable_json['d2p5'] = $this->request->data['d2p5'];
				$timetable_json['d2p6'] = $this->request->data['d2p6'];
				$timetable_json['d2p7'] = $this->request->data['d2p7'];
				$timetable_json['d2p8'] = $this->request->data['d2p8'];
				$timetable_json['d2p9'] = $this->request->data['d2p9'];
				
				$timetable_json['d3p1'] = $this->request->data['d3p1'];
				$timetable_json['d3p2'] = $this->request->data['d3p2'];
				$timetable_json['d3p3'] = $this->request->data['d3p3'];
				$timetable_json['d3p4'] = $this->request->data['d3p4'];
				$timetable_json['d3p5'] = $this->request->data['d3p5'];
				$timetable_json['d3p6'] = $this->request->data['d3p6'];
				$timetable_json['d3p7'] = $this->request->data['d3p7'];
				$timetable_json['d3p8'] = $this->request->data['d3p8'];
				$timetable_json['d3p9'] = $this->request->data['d3p9'];
				
				$timetable_json['d4p1'] = $this->request->data['d4p1'];
				$timetable_json['d4p2'] = $this->request->data['d4p2'];
				$timetable_json['d4p3'] = $this->request->data['d4p3'];
				$timetable_json['d4p4'] = $this->request->data['d4p4'];
				$timetable_json['d4p5'] = $this->request->data['d4p5'];
				$timetable_json['d4p6'] = $this->request->data['d4p6'];
				$timetable_json['d4p7'] = $this->request->data['d4p7'];
				$timetable_json['d4p8'] = $this->request->data['d4p8'];
				$timetable_json['d4p9'] = $this->request->data['d4p9'];
				
				$timetable_json['d5p1'] = $this->request->data['d5p1'];
				$timetable_json['d5p2'] = $this->request->data['d5p2'];
				$timetable_json['d5p3'] = $this->request->data['d5p3'];
				$timetable_json['d5p4'] = $this->request->data['d5p4'];
				$timetable_json['d5p5'] = $this->request->data['d5p5'];
				$timetable_json['d5p6'] = $this->request->data['d5p6'];
				$timetable_json['d5p7'] = $this->request->data['d5p7'];
				$timetable_json['d5p8'] = $this->request->data['d5p8'];
				$timetable_json['d5p9'] = $this->request->data['d5p9'];
				
				$timetable_json['d6p1'] = $this->request->data['d6p1'];
				$timetable_json['d6p2'] = $this->request->data['d6p2'];
				$timetable_json['d6p3'] = $this->request->data['d6p3'];
				$timetable_json['d6p4'] = $this->request->data['d6p4'];
				$timetable_json['d6p5'] = $this->request->data['d6p5'];
				$timetable_json['d6p6'] = $this->request->data['d6p6'];
				$timetable_json['d6p7'] = $this->request->data['d6p7'];
				$timetable_json['d6p8'] = $this->request->data['d6p8'];
				$timetable_json['d6p9'] = $this->request->data['d6p9'];
				
				$edittimetable = $TimetablesTable->get($id);			
				$edittimetable->timetable_json = json_encode($timetable_json);
				
				$edittimetable->course_id = $course_id;
				$edittimetable->is_active = "1";
				
				$TimetablesTable->save($edittimetable);
			}
		}

    }

    public function viewtimetable($course_id)
	{
		$array[0] =$id;
		
		$TimetablesTable = TableRegistry::get('Timetables');
		
		$timetable_list = $TimetablesTable->find("all")
										->select(['id', 'timetable_json'])
										->where(['course_id' => $course_id])
										->first();
		$this->set("timetable_list", $timetable_list);
		
		$timetable_json = json_decode($timetable_list['timetable_json'],true);
		
		$this->set("timetable_json",$timetable_json);
		
		//$CourseSubjectsTable = TableRegistry::get('CourseSubjects');
		
		// $subjects = $CourseSubjectsTable->find('all')
										// ->select(['Subjects.name', 'Subjects.id'])
										// ->where(['CourseSubjects.course_id'=>$course_id, 'CourseSubjects.is_active'=>1])
										// ->contain(['Subjects']);

        // $this->set('subjects', $subjects);
		
		$subjectsTable = TableRegistry::get('subjects');
		
		
		//print_r (array_unique($timetable_json));
		$subjects_list = $subjectsTable->find("all")
										->select(['name', 'id'])
										->where(['id IN' => $timetable_json])
										->toArray();

		
		//$this->set("subjects_list", $subjects_list);
		
		foreach ($subjects_list as $key => $value) {
			$subjects[$value['id']]=$value['name'];
		}
		
		$this->set("subjects", $subjects);
		
		
		
		
		
		
		
		
		
		
		
		
	}

	public function freeteachers(){
        
    }

	public function assignteacher(){
        
    }


}