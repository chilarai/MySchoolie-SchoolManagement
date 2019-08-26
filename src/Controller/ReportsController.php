<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Network\Session\DatabaseSession;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\Log\Log;
use Cake\Routing\Router;
use Cake\Network\Http\Client;

class ReportsController extends AppController
{

	public function index()
	{
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		$studentlist_response = $http->get(ALL_STUDENT_LIST);

        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
		
		if ($this->request->is('post')) {

			
			$term = $this->request->data['term'];
			$class_id=$this->request->data['class_id'];
			$student_id	=$this->request->data['student_id'];


			if(!empty($student_id))
			{

				$reportsTable = TableRegistry::get('reports');
				
				$student_details = $reportsTable->find("all")
												->select([	'id',
															'reports_json',
															'teacher_id',
															'wordsketch',
															'atsjs',
															'class_id',
															'createddate',
															'student_name'=> "concat(students.first_name,' ',students.last_name)",
															'teacher_name'=> 'users.name',])
												->where(['term'=>$term, 'student_id'	=>	$student_id])
												->join([
															'table' => 'students',
															'type' => 'LEFT',
															'conditions' => 'student_id = students.id'])
												->join([
															'table' => 'users',
															'type' => 'LEFT',
															'conditions' => 'teacher_id = users.id'])
												->last();
				
				$this->set("student_details",$student_details);
				
				$reports_json = json_decode($student_details['reports_json'],true);
		
				$this->set("reports_json",$reports_json);
				
				$attendancesTable = TableRegistry::get('attendance_details');
				
				$attendance_present_select = $attendancesTable->find("all")
															   ->select([
																		
																		//'monthno'=>'MONTHNAME(date)',
																		//'monthname'=>'MONTH(date)',
																		'count_present'=>'COUNT(distinct id)'])
																->where(['student_id'=>$student_id, 'attendance_type'=>'present'])
																//->andWhere(['MONTH(date)'=>date('m',time())])
																//->group(['monthname','monthno'])
																//->order(['monthname'])
																->toArray();
				//MONTH(date('Y-m-d',time()));
				
				$attendance_absent_select = $attendancesTable->find("all")
															   ->select([
																		
																		//'monthno'=>'MONTHNAME(date)',
																		//'monthname'=>'MONTH(date)',
																		'count_absent'=>'COUNT(distinct id)'])
																->where(['student_id'=>$student_id, 'attendance_type'=>'absent'])
																//->andWhere(['MONTH(date)'=>date('m',time())])
																//->group(['monthname','monthno'])
																//->order(['monthname'])
																->toArray();
				
				$this->set("attendance_present_select", $attendance_present_select);
				$this->set("attendance_absent_select", $attendance_absent_select);
																
				// check format $total_attendance = $attendance_absent_select->count_absent + $attendance_present_select->count_present;
				// foreach($attendance_present_select as $present_keys){
            // $p_month_number = $present_keys['monthno'];
            // $p_attendance_count = $present_keys['count_present'];
            // $keys[] = $p_month_number;

            // $complete_p_attendace[$p_month_number] = $p_attendance_count;
        // }

        // foreach($attendance_absent_select as $absent_keys){
            // $a_month_number = $absent_keys['monthno'];
            // $a_attendance_count = $absent_keys['count_absent'];
            // $keys[] = $a_month_number;

            // $complete_a_attendace[$a_month_number] = $a_attendance_count;
        // }

        // // print_r(array_unique($keys));
        
        // foreach(array_unique($keys) as $key){

            // if(array_key_exists($key, $complete_p_attendace)){

                // $final_attendance[$key]['present'] = $complete_p_attendace[$key];
            // }
            // else{
                 // $final_attendance[$key]['present'] = 0;
            // }


            // if(array_key_exists($key, $complete_a_attendace)){

                // $final_attendance[$key]['absent'] = $complete_a_attendace[$key];
            // }
            // else{
                 // $final_attendance[$key]['absent'] = 0;
            // }
        // }

        // pr($final_attendance);



        //$this->set('attendance_detail', $final_attendance);
			}
		}
	}
	
	public function generatereport()
	{
		$http = new Client();
		$classlist_response = $http->get(CLASS_LIST);
		


		
        $this->set('classlist', $classlist_response->json);
        
	}
	
	public function newreport($classid)
	{
		//$http = new Client();
		//$classlist_response = $http->get(CLASS_LIST);
		//$studentlist_response = $http->get(ALL_STUDENT_LIST);
		
        //$this->set('classlist', $classlist_response->json);
        //$this->set('studentlist', $studentlist_response->json);
		$array[0] = $classid;
		
		$class_students= TableRegistry::get('class_students');
		
		$studentlist = $class_students->find("all")
											->where(['class_id' => $classid])
											->select([	'student_id',
														'student_name'=> "concat(students.first_name,' ',students.last_name)",])
											->join([
														'table' => 'students',
														'type' => 'LEFT',
														'conditions' => 'student_id = students.id'])
											->toArray();
		
		$this->set("studentlist", $studentlist);
		
		if ($this->request->is('post')) 
		{

				
				$student_id	=$this->request->data['student_id'];
				
				if(!empty($classid) && !empty($student_id))
				{
					$class_teachersTable = TableRegistry::get('class_teachers');
					
					$teacher_id = $class_teachersTable->find("all")
														->where(['class_id' => $classid])
														->select(['user_id'])
														->first();
					//$this->set("class_teacher", $class_teacher);
					//print_r ($teacher_id);
					
					$reportsTable = TableRegistry::get('reports');
					
					//English
					$reports_json['Subject']    =   "<h1>English</h1>";
					$reports_json['Sub Heading']    =   "<h1>Comprehension</h1>";
					$reports_json['Is_able_to_grasp_the_main_idea']    =   $this->request->data['Is_able_to_grasp_the_main_idea'];
					$reports_json['Understands_the_text']    =   $this->request->data['Understands_the_text'];
					$reports_json['Is_able_to_Summarize']    =   $this->request->data['Is_able_to_Summarize'];
					$reports_json['Sub Heading']    =   "<h1>Listening Skills</h1>";
					$reports_json['Is_Attentive']    =   $this->request->data['Is_Attentive'];
					$reports_json['Follows_Multiple_Instructions']    =   $this->request->data['Follows_Multiple_Instructions'];
					$reports_json['Sub Heading']    =   "<h1>Speaking Skills</h1>";
					$reports_json['Speaks_fluently_and_confidently']    =   $this->request->data['Speaks_fluently_and_confidently'];
					$reports_json['Has_good_pronunciation']    =   $this->request->data['Has_good_pronunciation'];
					$reports_json['Contributes_to_discussions']    =   $this->request->data['Contributes_to_discussions'];
					$reports_json['Has_a_rich_vocabulary']    =   $this->request->data['Has_a_rich_vocabulary'];
					$reports_json['Sub Heading']    =   "<h1>Reading Skills</h1>";
					$reports_json['Is_interested_in_reading']    =   $this->request->data['Is_interested_in_reading'];
					$reports_json['Reads_with_fluency']    =   $this->request->data['Reads_with_fluency'];
					$reports_json['Understands_contexts']    =   $this->request->data['Understands_contexts'];
					$reports_json['Sub Heading']    =   "<h1>Writing Skills</h1>";
					$reports_json['Writes_legibly_and_neatly']    =   $this->request->data['Writes_legibly_and_neatly'];
					$reports_json['Puts_information_in_vocabulary']    =   $this->request->data['Puts_information_in_vocabulary'];
					$reports_json['Has_creative_expression']    =   $this->request->data['Has_creative_expression'];
					
					//Mathematics
					$reports_json['Subject']    =   "<h1>Mathematics</h1>";
					$reports_json['Has_conceptual_understanding']    =   $this->request->data['Has_conceptual_understanding'];
					$reports_json['Has_operational_skills']    =   $this->request->data['Has_operational_skills'];
					$reports_json['Can_apply_the_operation_efficiently']    =   $this->request->data['Can_apply_the_operation_efficiently'];
					$reports_json['Is_able_to_interpret_word_problems_and_apply_the_correct_operation']    =   $this->request->data['Is_able_to_interpret_word_problems_and_apply_the_correct_operation'];
					$reports_json['Is_able_to_apply_concepts_and_operational_skills_to_solve_problems']    =   $this->request->data['Is_able_to_apply_concepts_and_operational_skills_to_solve_problems'];
					
					//know your world
					$reports_json['Subject']    =   "<h1>Know Your World</h1>";
					$reports_json['Sub Heading']    =   "<h1>Awareness</h1>";
					$reports_json['Exhibits_curiosity']    =   $this->request->data['Exhibits_curiosity'];
					$reports_json['Relates_to_his_her_personal_experience']    =   $this->request->data['Relates_to_his_her_personal_experience'];
					$reports_json['Sub Heading']    =   "<h1>Understanding of Concepts</h1>";
					$reports_json['Can_Recall']    =   $this->request->data['Can_Recall'];
					$reports_json['Understands_texts_and_visuals']    =   $this->request->data['Understands_texts_and_visuals'];
					$reports_json['Is_able_to_organize_and_sequence_information']    =   $this->request->data['Is_able_to_organize_and_sequence_information'];
					$reports_json['Applies_and_Infers']    =   $this->request->data['Applies_and_Infers'];
					$reports_json['Sub Heading']    =   "<h1>Response & Participation</h1>";
					$reports_json['Asks_questions']    =   $this->request->data['Asks_questions'];
					$reports_json['Enjoys_group_work']    =   $this->request->data['Enjoys_group_work'];
					$reports_json['Remains_focussed']    =   $this->request->data['Remains_focussed'];
					$reports_json['Does_research']    =   $this->request->data['Does_research'];
					
					//Physical Education
					$reports_json['Subject']    =   "<h1>Physical Education</h1>";
					$reports_json['Is_fit_and_agile']    =   $this->request->data['Is_fit_and_agile'];
					$reports_json['Is_a_team_player']    =   $this->request->data['Is_a_team_player'];
					$reports_json['Exhibits_sportsmanship']    =   $this->request->data['Exhibits_sportsmanship'];
					$reports_json['Is_interested_in_knowing_the_rules_of_games']    =   $this->request->data['Is_interested_in_knowing_the_rules_of_games'];
					$reports_json['Is_disciplined_and_focussed_and_enthusiastic']    =   $this->request->data['Is_disciplined_and_focussed_and_enthusiastic'];
					
					//Visual Arts
					$reports_json['Subject']    =   "<h1>Visual Arts</h1>";
					$reports_json['Participates_enthusiastically']    =   $this->request->data['Participates_enthusiastically'];
					$reports_json['Observes_and_responds_well_to_design_and_colour']    =   $this->request->data['Observes_and_responds_well_to_design_and_colour'];
					$reports_json['Is_creative_and_imaginative']    =   $this->request->data['Is_creative_and_imaginative'];
					$reports_json['Has_well_developed_motor_skills']    =   $this->request->data['Has_well_developed_motor_skills'];
					
					//Life Skills
					$reports_json['Subject']    =   "<h1>Life Skills</h1>";
					$reports_json['Respectful_and_considerate']    =   $this->request->data['Respectful_and_considerate'];
					$reports_json['Is_team_player']    =   $this->request->data['Is_team_player'];
					$reports_json['Is_self_assured']    =   $this->request->data['Is_self_assured'];
					$reports_json['Accepts_responsibility']    =   $this->request->data['Accepts_responsibility'];
					$reports_json['Is_Expressive']    =   $this->request->data['Is_Expressive'];
					$reports_json['Accepts_challenges_and_changes']    =   $this->request->data['Accepts_challenges_and_changes'];
					
					//Technology
					$reports_json['Subject']    =   "<h1>Technology</h1>";
					$reports_json['Uses_the_available_technology_enthusiastically']    =   $this->request->data['Uses_the_available_technology_enthusiastically'];
					$reports_json['Comfortable_in_understanding_technology']    =   $this->request->data['Comfortable_in_understanding_technology'];
					
					//Work Habits
					$reports_json['Subject']    =   "<h1>Work Habits</h1>";
					$reports_json['Presents_work_neatly']    =   $this->request->data['Presents_work_neatly'];
					$reports_json['Responds_to_instructions']    =   $this->request->data['Responds_to_instructions'];
					$reports_json['Submits_work_promptly']    =   $this->request->data['Submits_work_promptly'];
					$reports_json['Works_Independently']    =   $this->request->data['Works_Independently'];
					$reports_json['Internalizes_concepts']    =   $this->request->data['Internalizes_concepts'];
					$reports_json['Is_able_to_analyze_apply_and_enquire']    =   $this->request->data['Is_able_to_analyze_apply_and_enquire'];
					
					//Music
					$reports_json['Subject']    =   "<h1>Music</h1>";
					$reports_json['Has_a_good_sense_of_melody']    =   $this->request->data['Has_a_good_sense_of_melody'];
					$reports_json['Has_a_good_sense_of_rhythm']    =   $this->request->data['Has_a_good_sense_of_rhythm'];
					$reports_json['Shows_interests_and_makes_effort']    =   $this->request->data['Shows_interests_and_makes_effort'];
					$reports_json['Participates_well_in_a_group']    =   $this->request->data['Participates_well_in_a_group'];
					
					//Dance
					$reports_json['Subject']    =   "<h1>Dance</h1>";
					$reports_json['Has_poise_and_expression']    =   $this->request->data['Has_poise_and_expression'];
					$reports_json['Shows_interest_and_effort']    =   $this->request->data['Shows_interest_and_effort'];
					$reports_json['Has_sense_of_rhythm']    =   $this->request->data['Has_sense_of_rhythm'];
					$reports_json['Participates_well_in_group']    =   $this->request->data['Participates_well_in_group'];
					
					//Hindi
					$reports_json['Subject']    =   "<h1>हिंदी</h1>";
					$reports_json['उप शीर्षक']    =   "<h1>समझ बूझ</h1>";
					$reports_json['मुख्य_विषय_को_समझने_की_क्षमता']    =   $this->request->data['mukhya'];
					$reports_json['पाठ_की_समझ']    =   $this->request->data['paath_ki'];
					$reports_json['पाठ_का_सार_समझने_की_क्षमता']    =   $this->request->data['paath_ka'];
					$reports_json['उप शीर्षक']    =   "<h1>सुनने का कौशल</h1>";
					$reports_json['एकाग्रता']    =   $this->request->data['ek'];
					$reports_json['अनेक_निर्देशों_को_समझने_की_क्षमता']    =   $this->request->data['anek'];
					$reports_json['उप शीर्षक']    =   "<h1>वाक कौशल</h1>";
					$reports_json['आत्मविश्वास_के_साथ_धारा_प्रवाह_बोलना']    =   $this->request->data['aatm'];
					$reports_json['सही_उच्चारण'] = $this->request->data['sahi'];
					$reports_json['चर्चा_में_भाग_लेना']    =   $this->request->data['charcha'];
					$reports_json['प्रचुर_शब्द_भंडार_या_शब्दों_की_जानकारी']    =   $this->request->data['prachur'];
					$reports_json['उप शीर्षक']    =   "<h1>पठन कौशल</h1>";
					$reports_json['पढ़ने_में_रूचि_लेना']    =   $this->request->data['padhne'];
					$reports_json['धारा_प्रवाह_पढ़ना']    =   $this->request->data['dhara'];
					$reports_json['विषय_वस्तु_समझना']    =   $this->request->data['vishya'];
					$reports_json['उप शीर्षक']    =   "<h1>लेखन कौशल</h1>";
					$reports_json['पढ़ने_योग्य_साफ_लेख']    =   $this->request->data['padhneyog'];
					$reports_json['क्रम_से_सही_जानकारी_देना']    =   $this->request->data['kram'];
					$reports_json['नवीन_शब्दों_का_प्रयोग']    =   $this->request->data['navin'];
					$reports_json['रचनात्मक_अभिवक्ति']    =   $this->request->data['rachnatmk'];
										
					$addreport = $reportsTable->newEntity();
					
					$addreport->term    =       $this->request->data['term'];
					$addreport->reports_json    =		json_encode($reports_json);
					
					$addreport->createddate		=		date("Y-m-d",strtotime($this->request->data['date']));
					
					if ($_FILES['atsjs']['size'] > 0) {

						$today              = strtotime("now");


						// print_r($_SERVER);
						$name=$_FILES['atsjs']['name'];
						$file=explode('.', $name);
						$ext = end($file); //extension of file
						$target_path = $today.".".$ext ;
						$target_path1 = WWW_ROOT . "uploads/reports/atsjs/".$today.".".$ext ;
						//$filename=$user_id.'.'.$file[1];
						$tmp=$_FILES['atsjs']['tmp_name'];
						move_uploaded_file($tmp, $target_path1);
						//$profilepic="profilepic/".$filename;
		       
					$addreport->atsjs   	    = 		$target_path;
					}
					$addreport->wordsketch      =       $this->request->data['wordsketch'];
					$addreport->teacher_id      =       $teacher_id->user_id;
					$addreport->class_id        =       $classid;
					$addreport->student_id      =       $student_id;
					
					if($reportsTable->save($addreport))
					{
						$this->redirect('/reports/generatereport/');
					}
					
				}
				
		}
	}
	
	public function newreportiii($classid)
	{
		// $http = new Client();
		// $classlist_response = $http->get(CLASS_LIST);
		// $studentlist_response = $http->get(ALL_STUDENT_LIST);


		
        // $this->set('classlist', $classlist_response->json);
        // $this->set('studentlist', $studentlist_response->json);
		
		$array[0] = $classid;
		
		$class_students= TableRegistry::get('class_students');
		
		$studentlist = $class_students->find("all")
											->where(['class_id' => $classid])
											->select([	'student_id',
														'student_name'=> "concat(students.first_name,' ',students.last_name)",])
											->join([
														'table' => 'students',
														'type' => 'LEFT',
														'conditions' => 'student_id = students.id'])
											->toArray();
		
		$this->set("studentlist", $studentlist);
		
		if ($this->request->is('post')) 
		{

			
			$student_id	=$this->request->data['student_id'];
			
			if(!empty($classid) && !empty($student_id))
			{
				$class_teachersTable = TableRegistry::get('class_teachers');
				
				$teacher_id = $class_teachersTable->find("all")
													->where(['class_id' => $classid])
													->select(['user_id'])
													->first();
				//$this->set("class_teacher", $class_teacher);
				//print_r ($teacher_id);
				
				$reportsTable = TableRegistry::get('reports');
				
				//English
				$reports_json['Subject']    =   "<h1>English</h1>";
				$reports_json['Sub Heading']    =   "<h1>Comprehension</h1>";
				$reports_json['Is_able_to_grasp_the_main_idea']    =   $this->request->data['Is_able_to_grasp_the_main_idea'];
				$reports_json['Understands_the_text']    =   $this->request->data['Understands_the_text'];
				$reports_json['Is_able_to_Summarize']    =   $this->request->data['Is_able_to_Summarize'];
				$reports_json['Sub Heading']    =   "<h1>Listening Skills</h1>";
				$reports_json['Is_Attentive']    =   $this->request->data['Is_Attentive'];
				$reports_json['Follows_Multiple_Instructions']    =   $this->request->data['Follows_Multiple_Instructions'];
				$reports_json['Sub Heading']    =   "<h1>Speaking Skills</h1>";
				$reports_json['Speaks_fluently_and_confidently']    =   $this->request->data['Speaks_fluently_and_confidently'];
				$reports_json['Has_good_pronunciation']    =   $this->request->data['Has_good_pronunciation'];
				$reports_json['Contributes_to_discussions']    =   $this->request->data['Contributes_to_discussions'];
				$reports_json['Has_a_rich_vocabulary']    =   $this->request->data['Has_a_rich_vocabulary'];
				$reports_json['Sub Heading']    =   "<h1>Reading Skills</h1>";
				$reports_json['Is_interested_in_reading']    =   $this->request->data['Is_interested_in_reading'];
				$reports_json['Reads_with_fluency']    =   $this->request->data['Reads_with_fluency'];
				$reports_json['Understands_contexts']    =   $this->request->data['Understands_contexts'];
				$reports_json['Sub Heading']    =   "<h1>Writing Skills</h1>";
				$reports_json['Writes_legibly_and_neatly']    =   $this->request->data['Writes_legibly_and_neatly'];
				$reports_json['Puts_information_in_vocabulary']    =   $this->request->data['Puts_information_in_vocabulary'];
				$reports_json['Has_creative_expression']    =   $this->request->data['Has_creative_expression'];
				
				//Mathematics
				$reports_json['Subject']    =   "<h1>Mathematics</h1>";
				$reports_json['Has_conceptual_understanding']    =   $this->request->data['Has_conceptual_understanding'];
				$reports_json['Has_operational_skills']    =   $this->request->data['Has_operational_skills'];
				$reports_json['Can_apply_the_operation_efficiently']    =   $this->request->data['Can_apply_the_operation_efficiently'];
				$reports_json['Is_able_to_interpret_word_problems_and_apply_the_correct_operation']    =   $this->request->data['Is_able_to_interpret_word_problems_and_apply_the_correct_operation'];
				$reports_json['Is_able_to_apply_concepts_and_operational_skills_to_solve_problems']    =   $this->request->data['Is_able_to_apply_concepts_and_operational_skills_to_solve_problems'];
				
				//Social Studies
				$reports_json['Subject']    =   "<h1>Social Studies</h1>";
				$reports_json['Sub Heading']    =   "<h1>Awareness</h1>";
				$reports_json['Exhibits_curiosity']    =   $this->request->data['Exhibits_curiosity'];
				$reports_json['Relates_to_his_her_personal_experience']    =   $this->request->data['Relates_to_his_her_personal_experience'];
				$reports_json['Sub Heading']    =   "<h1>Understanding of Concepts</h1>";
				$reports_json['Can_Recall']    =   $this->request->data['Can_Recall'];
				$reports_json['Understands_texts_and_visuals']    =   $this->request->data['Understands_texts_and_visuals'];
				$reports_json['Is_able_to_organize_and_sequence_information']    =   $this->request->data['Is_able_to_organize_and_sequence_information'];
				$reports_json['Applies_and_Infers']    =   $this->request->data['Applies_and_Infers'];
				$reports_json['Sub Heading']    =   "<h1>Response & Participation</h1>";
				$reports_json['Asks_questions']    =   $this->request->data['Asks_questions'];
				$reports_json['Enjoys_group_work']    =   $this->request->data['Enjoys_group_work'];
				$reports_json['Remains_focussed']    =   $this->request->data['Remains_focussed'];
				$reports_json['Does_research']    =   $this->request->data['Does_research'];
				
				//Science
				$reports_json['Subject']    =   "<h1>Science</h1>";
				$reports_json['Sub Heading']    =   "<h1>Awareness</h1>";
				$reports_json['Exhibits_curiosity1']    =   $this->request->data['Exhibits_curiosity1'];
				$reports_json['Relates_to_his_her_personal_experience1']    =   $this->request->data['Relates_to_his_her_personal_experience1'];
				$reports_json['Sub Heading']    =   "<h1>Understanding of Concepts</h1>";
				$reports_json['Can_Recall1']    =   $this->request->data['Can_Recall1'];
				$reports_json['Understands_texts_and_visuals1']    =   $this->request->data['Understands_texts_and_visuals1'];
				$reports_json['Is_able_to_organize_and_sequence_information1']    =   $this->request->data['Is_able_to_organize_and_sequence_information1'];
				$reports_json['Applies_and_Infers1']    =   $this->request->data['Applies_and_Infers1'];
				$reports_json['Sub Heading']    =   "<h1>Response & Participation</h1>";
				$reports_json['Asks_questions1']    =   $this->request->data['Asks_questions1'];
				$reports_json['Enjoys_group_work1']    =   $this->request->data['Enjoys_group_work1'];
				$reports_json['Remains_focussed1']    =   $this->request->data['Remains_focussed1'];
				$reports_json['Does_research1']    =   $this->request->data['Does_research1'];
				
				//Physical Education
				$reports_json['Subject']    =   "<h1>Physical Education</h1>";
				$reports_json['Is_fit_and_agile']    =   $this->request->data['Is_fit_and_agile'];
				$reports_json['Is_a_team_player']    =   $this->request->data['Is_a_team_player'];
				$reports_json['Exhibits_sportsmanship']    =   $this->request->data['Exhibits_sportsmanship'];
				$reports_json['Is_interested_in_knowing_the_rules_of_games']    =   $this->request->data['Is_interested_in_knowing_the_rules_of_games'];
				$reports_json['Is_disciplined_and_focussed_and_enthusiastic']    =   $this->request->data['Is_disciplined_and_focussed_and_enthusiastic'];
				
				//Visual Arts
				$reports_json['Subject']    =   "<h1>Visual Arts</h1>";
				$reports_json['Participates_enthusiastically']    =   $this->request->data['Participates_enthusiastically'];
				$reports_json['Observes_and_responds_well_to_design_and_colour']    =   $this->request->data['Observes_and_responds_well_to_design_and_colour'];
				$reports_json['Is_creative_and_imaginative']    =   $this->request->data['Is_creative_and_imaginative'];
				$reports_json['Has_well_developed_motor_skills']    =   $this->request->data['Has_well_developed_motor_skills'];
				
				//Life Skills
				$reports_json['Subject']    =   "<h1>Life Skills</h1>";
				$reports_json['Respectful_and_considerate']    =   $this->request->data['Respectful_and_considerate'];
				$reports_json['Is_team_player']    =   $this->request->data['Is_team_player'];
				$reports_json['Is_self_assured']    =   $this->request->data['Is_self_assured'];
				$reports_json['Accepts_responsibility']    =   $this->request->data['Accepts_responsibility'];
				$reports_json['Is_Expressive']    =   $this->request->data['Is_Expressive'];
				$reports_json['Accepts_challenges_and_changes']    =   $this->request->data['Accepts_challenges_and_changes'];
				
				//Technology
				$reports_json['Subject']    =   "<h1>Life Skills</h1>";
				$reports_json['Uses_the_available_technology_enthusiastically']    =   $this->request->data['Uses_the_available_technology_enthusiastically'];
				$reports_json['Comfortable_in_understanding_technology']    =   $this->request->data['Comfortable_in_understanding_technology'];
				
				//Work Habits
				$reports_json['Subject']    =   "<h1>Work Habits</h1>";
				$reports_json['Presents_work_neatly']    =   $this->request->data['Presents_work_neatly'];
				$reports_json['Responds_to_instructions']    =   $this->request->data['Responds_to_instructions'];
				$reports_json['Submits_work_promptly']    =   $this->request->data['Submits_work_promptly'];
				$reports_json['Works_Independently']    =   $this->request->data['Works_Independently'];
				$reports_json['Internalizes_concepts']    =   $this->request->data['Internalizes_concepts'];
				$reports_json['Is_able_to_analyze_apply_and_enquire']    =   $this->request->data['Is_able_to_analyze_apply_and_enquire'];
				
				//Music
				$reports_json['Subject']    =   "<h1>Music</h1>";
				$reports_json['Has_a_good_sense_of_melody']    =   $this->request->data['Has_a_good_sense_of_melody'];
				$reports_json['Has_a_good_sense_of_rhythm']    =   $this->request->data['Has_a_good_sense_of_rhythm'];
				$reports_json['Shows_interests_and_makes_effort']    =   $this->request->data['Shows_interests_and_makes_effort'];
				$reports_json['Participates_well_in_a_group']    =   $this->request->data['Participates_well_in_a_group'];
				
				//Dance
				$reports_json['Subject']    =   "<h1>Dance</h1>";
				$reports_json['Has_poise_and_expression']    =   $this->request->data['Has_poise_and_expression'];
				$reports_json['Shows_interest_and_effort']    =   $this->request->data['Shows_interest_and_effort'];
				$reports_json['Has_sense_of_rhythm']    =   $this->request->data['Has_sense_of_rhythm'];
				$reports_json['Participates_well_in_group']    =   $this->request->data['Participates_well_in_group'];
				
				//Hindi
				$reports_json['Subject']    =   "<h1>हिंदी</h1>";
				$reports_json['उप शीर्षक']    =   "<h1>समझ बूझ</h1>";
				$reports_json['मुख्य_विषय_को_समझने_की_क्षमता']    =   $this->request->data['mukhya'];
				$reports_json['पाठ_की_समझ']    =   $this->request->data['paath_ki'];
				$reports_json['पाठ_का_सार_समझने_की_क्षमता']    =   $this->request->data['paath_ka'];
				$reports_json['उप शीर्षक']    =   "<h1>सुनने का कौशल</h1>";
				$reports_json['एकाग्रता']    =   $this->request->data['ek'];
				$reports_json['अनेक_निर्देशों_को_समझने_की_क्षमता']    =   $this->request->data['anek'];
				$reports_json['उप शीर्षक']    =   "<h1>वाक कौशल</h1>";
				$reports_json['आत्मविश्वास_के_साथ_धारा_प्रवाह_बोलना']    =   $this->request->data['aatm'];
				$reports_json['सही_उच्चारण'] = $this->request->data['sahi'];
				$reports_json['चर्चा_में_भाग_लेना']    =   $this->request->data['charcha'];
				$reports_json['प्रचुर_शब्द_भंडार_या_शब्दों_की_जानकारी']    =   $this->request->data['prachur'];
				$reports_json['उप शीर्षक']    =   "<h1>पठन कौशल</h1>";
				$reports_json['पढ़ने_में_रूचि_लेना']    =   $this->request->data['padhne'];
				$reports_json['धारा_प्रवाह_पढ़ना']    =   $this->request->data['dhara'];
				$reports_json['विषय_वस्तु_समझना']    =   $this->request->data['vishya'];
				$reports_json['उप शीर्षक']    =   "<h1>लेखन कौशल</h1>";
				$reports_json['पढ़ने_योग्य_साफ_लेख']    =   $this->request->data['padhneyog'];
				$reports_json['क्रम_से_सही_जानकारी_देना']    =   $this->request->data['kram'];
				$reports_json['नवीन_शब्दों_का_प्रयोग']    =   $this->request->data['navin'];
				$reports_json['रचनात्मक_अभिवक्ति']    =   $this->request->data['rachnatmk'];
				
				$addreport = $reportsTable->newEntity();
				
				$addreport->term    =       $this->request->data['term'];
				$addreport->reports_json    =		json_encode($reports_json);
				
				if ($_FILES['atsjs']['size'] > 0) {

						$today              = strtotime("now");


						// print_r($_SERVER);
						$name=$_FILES['atsjs']['name'];
						$file=explode('.', $name);
						$ext = end($file); //extension of file
						$target_path = $today.".".$ext ;
						$target_path1 = WWW_ROOT . "uploads/reports/atsjs/".$today.".".$ext ;
						//$filename=$user_id.'.'.$file[1];
						$tmp=$_FILES['atsjs']['tmp_name'];
						move_uploaded_file($tmp, $target_path1);
						//$profilepic="profilepic/".$filename;
		       
					$addreport->atsjs   	    = 		$target_path;
				}
				$addreport->createddate		=		date("Y-m-d",strtotime($this->request->data['date']));
				$addreport->wordsketch      =       $this->request->data['wordsketch'];
				$addreport->teacher_id      =       $teacher_id->user_id;
				$addreport->class_id        =       $classid;
				$addreport->student_id      =       $student_id;
				
				if($reportsTable->save($addreport))
				{
					$this->redirect('/reports/generatereport/');
				}
				
			}
		}
	}
}

?>