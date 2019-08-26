<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class StaffsController extends AppController
{

	public function index(){

        $teachersTable = TableRegistry::get('users');

        if($this->request->is("get")){

            $teacher_details = $teachersTable->find("all")
                                             ->where(['users.user_type_id'=>4])
                                             ->select(['teacher_id'=>'users.id',
                                                       'teacher_name'=> 'users.name',
                                                       'mobile'=>'users.mobile',
													   'class_id'=>'classes.id',
                                                       'class'=>'classes.class',
                                                       'section'=>'classes.section',
													   'email'=>'user_details.email'
                                                      ])
											->join([
                                                        'table' => 'class_teachers',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'users.id = class_teachers.user_id'])
											->join([
                                                        'table' => 'classes',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'class_teachers.class_id = classes.id'])
                                             ->join([
                                                        'table' => 'user_details',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'users.id = user_details.user_id'])
                                            ->toArray();
											
			$this->set("teacher_details", $teacher_details);
            if(!empty($teacher_details)){

                $returnArray = array(
                    "status"    => "200",
                    "message"   => "List of All Teachers",
                    "details"   => array(
                        "teacher_list"  => $teacher_details
                        )
                    );
            }
            else{
                $returnArray = array(
                    "status"    => "400",
                    "message"   => "Teachers details not found",
                    "details"   => array()
                );
            }
            
        }
        else{

            $returnArray = array(
                "status"    => "403",
                "message"   => "Invalid method",
                "details"   => array()
            );
        }

        $this->set("response", $returnArray);
        
    }



    public function leaves(){
    	$http = new Client();
        $response = $http->get(TEACHER_LEAVE_LIST);

        $this->set('status', $response->code);
        $this->set('response', $response->json);
    }

    public function editaccept($id=null){
            $http = new Client();
            $response = $http->post(LEAVE_ACCEPT, ['leave_id'=>$id]);
            
            $status=$response->json;
    
           return $this->redirect(['controller' => 'staffs','action' => 'leaves']);
    }

    public function editreject($id=null){
    
            $http = new Client();
            $response = $http->post(LEAVE_REJECT, ['leave_id'=>$id]);
            
            
        return $this->redirect(['controller' => 'staffs','action' => 'leaves']);
       
    }

    public function otherstaffs(){
    	
        $teachersTable = TableRegistry::get('users');

        if($this->request->is("get")){

            $teacher_details = $teachersTable->find("all")
                                             ->where(['users.user_type_id'=>7])
                                             ->select(['teacher_id'=>'users.id',
                                                       'teacher_name'=> 'users.name',
                                                       'mobile'=>'users.mobile',
													   'email'=>'user_details.email'
													   
                                                      ])
                              
                                             ->join([
                                                        'table' => 'user_details',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'users.id = user_details.user_id'])
                                            ->toArray();
											
			$this->set("teacher_details", $teacher_details);
            if(!empty($teacher_details)){

                $returnArray = array(
                    "status"    => "200",
                    "message"   => "List of All Teachers",
                    "details"   => array(
                        "teacher_list"  => $teacher_details
                        )
                    );
            }
            else{
                $returnArray = array(
                    "status"    => "400",
                    "message"   => "Teachers details not found",
                    "details"   => array()
                );
            }
            
        }
        else{

            $returnArray = array(
                "status"    => "403",
                "message"   => "Invalid method",
                "details"   => array()
            );
        }

        $this->set("response", $returnArray);
        
    }

    public function salarystructure(){

        if ($this->request->is('get')) {
    

            $salary_structuresTable = TableRegistry::get('salary_structures');

            
            $salary_structure_details = $salary_structuresTable->find("all")
                                             ->where(['is_active'=>1])
                                             ->select(['grade'=>'grade',
                                                       'basic'=> 'basic',
                                                       'hra'=>'hra',
                                                       'conveyance'=>'conveyance',
                                                       'deduction'=>'deduction',
                                                       'total'=>'total',
                                                      ])
                                            ->toArray();        

            $this->set('salary_structure_details',$salary_structure_details);
            $this->set('status', "200");
            $this->set('message', "Salary Structure");            

        }        
        else{

            $this->set('status', "300");
            $this->set('message', "Upload Salary Structure");


        }
    

    }



    public function vacancy(){

        $vacanciesTable = TableRegistry::get('vacancies');

        if($this->request->is('post')){
            


            $new_vacancy=$vacanciesTable->newEntity();
            $new_vacancy->course_id= $this->request->data['course_id'];
            $new_vacancy->employment_type= $this->request->data['type'];
            $new_vacancy->vacancy= $this->request->data['total_seats'];
            $new_vacancy->qualification= $this->request->data['qualification'];
            $new_vacancy->closing_date= $this->request->data['final_closing_date'];


            $vacanciesTable->save($new_vacancy);

            if($new_vacancy->isNew()){

                $message = 'Unable to Save Information';
                $status  = 400;

            }else{


                $message = 'Vacancies Succesfully';
                $status  = 200;

            }

        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }



        $vacancy_detail=$vacanciesTable->find('all')
                                 ->select(['course_name'=>'courses.course_name','employment_type','vacancy','qualification','date_closing'=>'date(closing_date)'])
                                ->join([
                                        'table' => 'courses',
                                        'type' => 'LEFT',
                                        'conditions' => 'courses.id = vacancies.course_id'])
                                 ->toArray();

        $coursesTable = TableRegistry::get('courses');

        $course_list = $coursesTable->find("all")
                        ->select(['id','course_name', 
                                  'total_subjects', 
                                  'remark'])
                        ->order(['id'=>'desc'])
                        ->toArray();


        $this->set('course_list', $course_list);
        $this->set('vacancy_detail', $vacancy_detail);

        // $this->set('teacher_detail', $teacher_detail);




        $this->set('status',$status);
        $this->set('message',$message);
    }

 

    public function relieving(){

    	$teachersTable = TableRegistry::get('users');

        if($this->request->is("post")){


            // echo(sizeof($student_details));

            $resignationsTable = TableRegistry::get('resignations');

            $resignation=$resignationsTable->newEntity();
            $resignation->user_id=$this->request->data['user_id'];
            $resignation->resign_date=date('Y-m-d',strtotime($this->request->data['resignation_date']));
            $resignation->reason=$this->request->data['reason'];
            $resignation->remarks=$this->request->data['remarks'];

            $resignationsTable->save($resignation);

            if($resignation->isNew()){

                $message = 'Unable to Save Information';
                $status  = 400;

            }else{




            	$teachersTable->updateAll(
                      array(
                        'users.is_active' => 0
                      ), 
                      array('users.id' => $this->request->data['user_id']));



            	$user_detailsTable = TableRegistry::get('user_details');

            	$user_detailsTable->updateAll(
                      array(
                        'user_details.is_active' => 0
                      ), 
                      array('user_details.user_id' => $this->request->data['user_id']));


            	$class_teachersTable = TableRegistry::get('class_teachers');

            	$class_teachersTable->updateAll(
                      array(
                        'class_teachers.is_active' => 0
                      ), 
                      array('class_teachers.user_id' => $this->request->data['user_id']));


            	$attendance_teachersTable = TableRegistry::get('attendance_teachers');

            	$attendance_teachersTable->updateAll(
                      array(
                        'attendance_teachers.is_active' => 0
                      ), 
                      array('attendance_teachers.user_id' => $this->request->data['user_id']));




                $message = 'Teacher Resigned Succesfully';
                $status  = 200;

            }

        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }





        $teacher_details = $teachersTable->find("all")
                                         ->where(['users.user_type_id'=>4,
                                         			'users.is_active'=>1	])
                                         ->select(['teacher_id'=>'users.id',
                                                   'teacher_name'=> 'users.name',
                                                   'mobile'=>'users.mobile'
                                                  ])
                          
                                         ->join([
                                                    'table' => 'user_details',
                                                    'type' => 'LEFT',
                                                    'conditions' => 'users.id = user_details.user_id'])
                                        ->toArray();


        $this->set('status',$status);
        $this->set('message',$message);
        $this->set('teacher_details',$teacher_details);
    }

    public function accounts(){

    }

    public function recruitment(){

    	

        if($this->request->is('post')){

			if ($_FILES['photograph']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['photograph']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/profile/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['photograph']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['photograph']    =   $target_path;
			}
			   
            if ($_FILES['birth_certificate']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['birth_certificate']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/birth_certificate/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['birth_certificate']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['birth_certificate']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }

            if ($_FILES['caste_certificate']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['caste_certificate']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/caste_certificate/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['caste_certificate']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['caste_certificate']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }

            if ($_FILES['marksheet']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['marksheet']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/marksheet/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['marksheet']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['marksheet']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }

            // if ($_FILES['character_certificate']['size'] > 0) {



            //     $today              = strtotime("now");


            //     // print_r($_SERVER);
            //     $name=$_FILES['character_certificate']['name'];
            //     $file=explode('.', $name);
            //     $ext = end($file); //extension of file
            //     $target_path = $today.".".$ext ;
            //     $target_path1 = WWW_ROOT . "uploads/teachers/images/character_certificate/".$today.".".$ext ;
            //     //$filename=$user_id.'.'.$file[1];
            //     $tmp=$_FILES['character_certificate']['tmp_name'];
            //     move_uploaded_file($tmp, $target_path1);
            //     //$profilepic="profilepic/".$filename;
               
            //    $other_detail['character_certificate']    =   $target_path;
               


            //    // echo $target_path;    
            //    // echo $ext;
            // }

            if ($_FILES['resume']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['resume']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/resume/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['resume']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['resume']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }

            //for academic qualification
            for($i = 1; $i <= 5; $i++){

                if(strlen(trim($this->request->data['exam_'.$i])) > 0){
                    
                    if(sizeof($this->request->data['file_'.$i]['size'])>0){

                        $new_file_name = time().rand()."_".$this->request->data['file_'.$i]['name'];
                        move_uploaded_file($this->request->data['file_'.$i]['tmp_name'], WWW_ROOT . "uploads/teachers/images/academic_qualification/".$new_file_name);
                    }

                    $academic_details_array[] = array(
                        'exam'          => $this->request->data['exam_'.$i],
                        'board'         => $this->request->data['board_'.$i],
                        'year'          => $this->request->data['year_'.$i],
                        'percentage'    => $this->request->data['percentage_'.$i],
                        'attachment'    => $new_file_name
                    );
                    
                }


                if(strlen(trim($this->request->data['org_'.$i])) > 0){
                    
                    $experience_details_array[] = array(
                        'organization'          => $this->request->data['org_'.$i],
                        'from'         => $this->request->data['from_'.$i],
                        'to'          => $this->request->data['to_'.$i],
                        'designation'    => $this->request->data['desg_'.$i],
                        'description'    => $this->request->data['desc_'.$i]
                    );
                    
                }

            }
            //end academic qualifcation
            if(isset($academic_details_array))
            $other_detail['academic_details_array']     =   $academic_details_array;

            if(isset($experience_details_array))
            $other_detail['experience_details_array']     =   $experience_details_array;


            $other_detail['blood_group']     =   $this->request->data['blood_group'];
            $other_detail['caste']    =   $this->request->data['caste'];
            $other_detail['gender']    =   $this->request->data['gender'];
            $other_detail['dob']    =   $this->request->data['dob'];
            $other_detail['applied_for']    =   $this->request->data['applied_for'];
            $other_detail['joining_date']    =   $this->request->data['joining_date'];
            $other_detail['spouse_name']    =   $this->request->data['spouse_name'];
            $other_detail['spouse_occupation']    =   $this->request->data['spouse_occupation'];
            $other_detail['address']    =   $this->request->data['address'];
            $other_detail['father_name']    =   $this->request->data['father_name'];
            $other_detail['mother_name']    =   $this->request->data['mother_name'];
            $other_detail['probation']    =   $this->request->data['probation'];
            $other_detail['contract']    =   $this->request->data['contract'];
            $other_detail['confirmation']    =   $this->request->data['confirmation'];

            //saving In Users Table
			$user_type_id = $this->request->data['user_type_id'];
            $users = TableRegistry::get('Users');
            $UserDetails = TableRegistry::get('UserDetails');
            
            $user=$users->newEntity();
            $user->mobile   =   $this->request->data['mobile'];
            $user->password =   md5(1234);
            $user->name     =   $this->request->data['first_name'].' '.$this->request->data['last_name'];
            $user->user_type_id = $user_type_id;
            $user->is_active=1;

            $users->save($user);


            //Saving In User_details Table

            $userdetails=$UserDetails->newEntity();

            $userdetails->id=$user->id;
            $userdetails->user_id=$user->id;
            $userdetails->user_type_id=$user_type_id;

   

            $userdetails->firstname=$this->request->data['first_name'];

            $userdetails->lastname=$this->request->data['last_name'];

            $userdetails->email =   $this->request->data['email'];
            $userdetails->mobile    =   $this->request->data['mobile'];
            $userdetails->other_details= json_encode($other_detail);
            $userdetails->is_active=1;

            $UserDetails->save($userdetails);


            $attendancesTable = TableRegistry::get('attendance_teachers');

            $attendances=$attendancesTable->newEntity();
            $attendances->user_id=$user->id;
            $attendances->year=date("Y");
            $attendances->is_active=1;

            $attendancesTable->save($attendances);


            //Salary Structure Record Insertion | START
            $salary_structure_userTable = TableRegistry::get('salary_structure_user');

            $newsalary=$salary_structure_userTable->newEntity();
            $newsalary->user_id=$user->id;
            $newsalary->salary_structure_id=$this->request->data['salary_structure_id'];


            $salary_structure_userTable->save($newsalary);
            //Salary Structure Record Insertion | END


            //vacancy_user start
            $vacancy_usersTable = TableRegistry::get('vacancy_users');

            $new_vacancy_user=$vacancy_usersTable->newEntity();
            $new_vacancy_user->vacancy_id= $this->request->data['vacancy_id'];
            $new_vacancy_user->user_id=$user->id;

            $vacancy_usersTable->save($new_vacancy_user);
            //vacancy_users end



            //decrement vacancies | START

            $vacancyTable = TableRegistry::get('vacancies');

            $vacancy_count=$vacancyTable->find('all')
                            ->where(['vacancies.id' => $this->request->data['vacancy_id']])
                         ->first();

            $vacancy_count->vacancy = $vacancy_count['vacancy'] - 1;

            $vacancyTable->save($vacancy_count);

            //decrement vacancies | END




            if($userdetails->isNew()){

                $message = 'Unable to Save Information';
                $status  = 400;

            }else{


                $message = 'Teacher Record Inserted Succesfully';
                $status  = 200;

            }

        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }

        $vacanciesTable = TableRegistry::get('vacancies');

        $vacancy_detail=$vacanciesTable->find('all')
                            ->where(['vacancies.vacancy >' => 0])
                             ->select(['id','course_name'=>'courses.course_name','employment_type','vacancy','qualification','date_closing'=>'date(closing_date)'])
                            ->join([
                                    'table' => 'courses',
                                    'type' => 'LEFT',
                                    'conditions' => 'courses.id = vacancies.course_id'])
                             ->toArray();

        
        $salary_structuresTable = TableRegistry::get('salary_structures');
        
        $salary_structure_details = $salary_structuresTable->find("all")
                                         ->where(['is_active'=>1])
                                         ->select(['grade'=>'grade',
                                         			'salary_structure_id'=>'id'

                                                  ])
                                        ->toArray();  

        

        $this->set('salary_structure_details',$salary_structure_details);
        $this->set('vacancy_detail',$vacancy_detail);
        $this->set('status',$status);
        $this->set('message',$message);
    }



    public function view($teacher_id){

        $teachers                   =       TableRegistry::get('user_details');

        $teacher_detail=$teachers->find('all')
                                 ->select(['id','firstname','lastname','email','mobile','other_details'])
                                 ->where(['id'=>$teacher_id])
                                 ->first();

        $this->set('teacher_detail', $teacher_detail);
		

        $attendances_table      =       TableRegistry::get('attendance_teacher_details'); 

        $attendance_present_select=$attendances_table->find('all')
                                                     ->select([
                                                        'monthno'=>'MONTHNAME(date)',
                                                        'monthname'=>'MONTH(date)',
                                                        'count_present'=>'COUNT(distinct id)']
                                                        )
                                                    ->where(['user_id'=>$teacher_id,'attendance_type'=>'present'])
                                                    ->group(['monthno','monthname'])
                                                    ->order(['monthname'])
                                                    ->toArray();

        $attendance_absent_select=$attendances_table->find('all')
                                                     ->select([
                                                        'monthno'=>'MONTHNAME(date)',
                                                        'monthname'=>'MONTH(date)',
                                                        'count_absent'=>'COUNT(distinct id)']
                                                        )
                                                    ->where(['user_id'=>$teacher_id,'attendance_type'=>'absent'])
                                                    ->group(['monthno','monthname'])
                                                    ->order(['monthname'])
                                                    ->toArray();

        foreach($attendance_present_select as $present_keys){
            $p_month_number = $present_keys['monthno'];
            $p_attendance_count = $present_keys['count_present'];
            $keys[] = $p_month_number;

            $complete_p_attendace[$p_month_number] = $p_attendance_count;
        }

        foreach($attendance_absent_select as $absent_keys){
            $a_month_number = $absent_keys['monthno'];
            $a_attendance_count = $absent_keys['count_absent'];
            $keys[] = $a_month_number;

            $complete_a_attendace[$a_month_number] = $a_attendance_count;
        }

        // print_r(array_unique($keys));
        
        foreach(array_unique($keys) as $key){

            if(array_key_exists($key, $complete_p_attendace)){

                $final_attendance[$key]['present'] = $complete_p_attendace[$key];
            }
            else{
                 $final_attendance[$key]['present'] = 0;
            }


            if(array_key_exists($key, $complete_a_attendace)){

                $final_attendance[$key]['absent'] = $complete_a_attendace[$key];
            }
            else{
                 $final_attendance[$key]['absent'] = 0;
            }
        }

        // pr($final_attendance);



        $this->set('attendance_detail', $final_attendance);





    }

    public function newsalary(){


      

        if ($this->request->is('post')) {

          //  $student_id = $this->request->data['student_id'];

            $usersTable = TableRegistry::get('users');

        

            $teacher_detail_salary = $usersTable->find("all")
                                          ->where(['users.user_type_id' => 4,
                                                    'users.is_active'=>1
                                                  ])
                                          ->select(['salary_status_id'=>'salary_status_user.id', 
                                                    'name'=>'users.name',
                                                    'total_salary'=>'salary_structures.total',
                                                    'status'=>'salary_status_user.status',
                                                    'details_json'=>'user_details.other_details'
                                                  ])
                                            ->join([
                                                  'table' => 'user_details',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'user_details.user_id = users.id'])
                                          ->join([
                                                  'table' => 'salary_status_user',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'salary_status_user.user_id = users.id'])
                                          ->join([
                                                  'table' => 'salary_structure_user',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'salary_structure_user.user_id = users.id'])
                                          ->join([
                                                  'table' => 'salary_structures',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'salary_structures.id = salary_structure_user.salary_structure_id'])
                                          ->toArray();

                                  

          

            $this->set('teacher_detail_salary', $teacher_detail_salary);


        }

        if(empty($message))
            $message = 'Please Enter All the Data';


        $this->set('message',$message);
    }


    public function salarypayment(){


        if ($this->request->is('post')) {

          $salary_status_id = $this->request->data['salary_status_id'];

                                   

            $userTable = TableRegistry::get('users');


            //For Insertion of Fees
            if(isset( $this->request->data['total_salary'])){

                $salary_status_userTable = TableRegistry::get('salary_status_user');

                $salary_status_update = $salary_status_userTable->find("all")
                          ->where(['salary_status_user.id'=> $salary_status_id,
                                   'salary_status_user.status'=>'pending'
                                  ])
                          ->first();

                $salary_status_update->payment_mode = $this->request->data['payment_mode'];

                $salary_status_update->amount_paid = $this->request->data['total_salary'];

                if($salary_status_update->amount_paid > 0){

                    $salary_status_update->datetime = date("Y-m-d H:i:s",strtotime($this->request->data['date']));
                    $salary_status_update->status = 'paid';

                    $salary_status_userTable->save($salary_status_update);

                    $message = 'Salary Updated Successfully';
                }else{

                    $message = 'Unable to Update The Payment';

                }

            }
            //Insertion of Fee Block End

            $salary_status = $userTable->find("all")
                          ->where(['salary_status_user.id'=> $salary_status_id
                                  ])
                           ->select(['salary_status_id'=>'salary_status_user.id', 
                                                    'name'=>'users.name',
                                                    'mobile'=>'users.mobile',
                                                    'basic'=>'salary_structures.basic',
                                                    'hra'=>'salary_structures.hra',
                                                    'conveyance'=>'salary_structures.conveyance',
                                                    'total_salary'=>'salary_structures.total',
                                                    'status'=>'salary_status_user.status',
                                                    'date'=>'salary_status_user.modified_date',
                                                    'paid_salary'=>'salary_status_user.amount_paid',
                                                    'details_json'=>'user_details.other_details'
                                                  ])
                                            ->join([
                                                  'table' => 'user_details',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'user_details.user_id = users.id'])
                                          ->join([
                                                  'table' => 'salary_status_user',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'salary_status_user.user_id = users.id'])
                                          ->join([
                                                  'table' => 'salary_structure_user',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'salary_structure_user.user_id = users.id'])
                                          ->join([
                                                  'table' => 'salary_structures',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'salary_structures.id = salary_structure_user.salary_structure_id'])
                                          ->first();

                $schoolsTable = TableRegistry::get('schools');

                $schoolinfo = $schoolsTable->find("all")
                               ->select(['school_name'=>'name',
                                         'school_detail_json'=>'details_json'
                                        ])
                              ->first();

                

                $this->set('salary_status', $salary_status);
                $this->set('schoolinfo', $schoolinfo);


            }

        if(empty($message))
            $message = 'Please Enter All the Data';

        $http = new Client();


        $this->set('message',$message);


    } 


    public function editstaff($staff_id){

        
        $users = TableRegistry::get('users');


        if($this->request->is('post')){






            //saving In Users Table


            $user = $users->get($staff_id);
            
            // $user = $users->find("all")
                                  // ->where(['users.id'=>$staff_id])
                                  // ->first();

            $user->mobile   =   $this->request->data['mobile'];
            $user->password =   md5(1234);
            $user->name     =   $this->request->data['first_name'].' '.$this->request->data['last_name'];
            $user->user_type_id = 4;
            $user->is_active=1;

            

            $users->save($user);


            //Saving In User_details Table
            $UserDetails = TableRegistry::get('UserDetails');

            $userdetails = $UserDetails->find("all")
                                  ->where(['user_id'=>$staff_id])
                                  ->first();

            $other_detail = json_decode($userdetails->other_details,true);




            //for academic qualification
            for($i = 1; $i <= 5; $i++){

                if(strlen(trim($this->request->data['exam_'.$i])) > 0){
                    
                    if(sizeof($this->request->data['file_'.$i]['size'])>0){

                        $new_file_name = time().rand()."_".$this->request->data['file_'.$i]['name'];
                        move_uploaded_file($this->request->data['file_'.$i]['tmp_name'], WWW_ROOT . "uploads/teachers/images/academic_qualification/".$new_file_name);
                    }

                    $academic_details_array[] = array(
                        'exam'          => $this->request->data['exam_'.$i],
                        'board'         => $this->request->data['board_'.$i],
                        'year'          => $this->request->data['year_'.$i],
                        'percentage'    => $this->request->data['percentage_'.$i],
                        'attachment'    => $new_file_name
                    );
                    
                }


                if(strlen(trim($this->request->data['org_'.$i])) > 0){
                    
                    $experience_details_array[] = array(
                        'organization'          => $this->request->data['org_'.$i],
                        'from'         => $this->request->data['from_'.$i],
                        'to'          => $this->request->data['to_'.$i],
                        'designation'    => $this->request->data['desg_'.$i],
                        'description'    => $this->request->data['desc_'.$i]
                    );
                    
                }
					
            }
            //end academic qualifcation

            if(isset($academic_details_array))
            $other_detail['academic_details_array']     =   $academic_details_array;

            if(isset($experience_details_array))
            $other_detail['experience_details_array']     =   $experience_details_array;
        


            $other_detail['blood_group']     =   $this->request->data['blood_group'];
            $other_detail['caste']    =   $this->request->data['caste'];
            $other_detail['gender']    =   $this->request->data['gender'];
            $other_detail['dob']    =   $this->request->data['dob'];
            $other_detail['joining_date']    =   $this->request->data['joining_date'];
            $other_detail['spouse_name']    =   $this->request->data['spouse_name'];
            $other_detail['spouse_occupation']    =   $this->request->data['spouse_occupation'];
            $other_detail['address']    =   $this->request->data['address'];
            $other_detail['father_name']    =   $this->request->data['father_name'];
            $other_detail['mother_name']    =   $this->request->data['mother_name'];
            $other_detail['probation']    =   $this->request->data['probation'];
            $other_detail['contract']    =   $this->request->data['contract'];
            $other_detail['confirmation']    =   $this->request->data['confirmation'];


            
            //ImageBlock
			if ($_FILES['photograph']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['photograph']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/profile/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['photograph']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['photograph']    =   $target_path;
			 }
            if ($_FILES['birth_certificate']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['birth_certificate']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/birth_certificate/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['birth_certificate']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['birth_certificate']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }

            if ($_FILES['caste_certificate']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['caste_certificate']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/caste_certificate/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['caste_certificate']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['caste_certificate']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }

            if ($_FILES['marksheet']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['marksheet']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/marksheet/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['marksheet']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['marksheet']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }

            // if ($_FILES['character_certificate']['size'] > 0) {



            //     $today              = strtotime("now");


            //     // print_r($_SERVER);
            //     $name=$_FILES['character_certificate']['name'];
            //     $file=explode('.', $name);
            //     $ext = end($file); //extension of file
            //     $target_path = $today.".".$ext ;
            //     $target_path1 = WWW_ROOT . "uploads/teachers/images/character_certificate/".$today.".".$ext ;
            //     //$filename=$user_id.'.'.$file[1];
            //     $tmp=$_FILES['character_certificate']['tmp_name'];
            //     move_uploaded_file($tmp, $target_path1);
            //     //$profilepic="profilepic/".$filename;
               
            //    $other_detail['character_certificate']    =   $target_path;
               


            //    // echo $target_path;    
            //    // echo $ext;
            // }

            if ($_FILES['resume']['size'] > 0) {



                $today              = strtotime("now");


                // print_r($_SERVER);
                $name=$_FILES['resume']['name'];
                $file=explode('.', $name);
                $ext = end($file); //extension of file
                $target_path = $today.".".$ext ;
                $target_path1 = WWW_ROOT . "uploads/teachers/images/resume/".$today.".".$ext ;
                //$filename=$user_id.'.'.$file[1];
                $tmp=$_FILES['resume']['tmp_name'];
                move_uploaded_file($tmp, $target_path1);
                //$profilepic="profilepic/".$filename;
               
               $other_detail['resume']    =   $target_path;
               


               // echo $target_path;    
               // echo $ext;
            }
            //Image Block Done
   

            $userdetails->firstname=$this->request->data['first_name'];

            $userdetails->lastname=$this->request->data['last_name'];

            $userdetails->email =   $this->request->data['email'];
            $userdetails->mobile    =   $this->request->data['mobile'];
            $userdetails->other_details= json_encode($other_detail);
            $userdetails->is_active=1;

            $UserDetails->save($userdetails);






            // Salary Structure Record Insertion | START
            // $salary_structure_userTable = TableRegistry::get('salary_structure_user');

            // $newsalary=$salary_structure_userTable->newEntity();
            // $newsalary->user_id=$user->id;
            // $newsalary->salary_structure_id=$this->request->data['salary_structure_id'];


            // $salary_structure_userTable->save($newsalary);
            // Salary Structure Record Insertion | END










                $message = 'Teacher Record Updated Succesfully';
                $status  = 200;

            

        }
        // GET THE ID TO RETRIEVE THE EXISTING DATA


            

        $user_details = $users->find("all")
                                     ->where(['users.id'=>$staff_id])
                                     ->select(['mobile'=>'user_details.mobile',
                                               'first_name'=>'user_details.firstname',
                                               'last_name'=>'user_details.lastname',
                                               'json_details'=>'user_details.other_details',
                                               'email'=>'user_details.email'                                                  

                                              ])
                                        ->join([
                                              'table' => 'user_details',
                                              'type' => 'LEFT',
                                              'conditions' => 'user_details.user_id = users.id'])
                                         ->join([
                                              'table' => 'salary_structure_user',
                                              'type' => 'LEFT',
                                              'conditions' => 'salary_structure_user.user_id = users.id'])
                                      ->join([
                                              'table' => 'salary_structures',
                                              'type' => 'LEFT',
                                              'conditions' => 'salary_structures.id = salary_structure_user.salary_structure_id'])
                                    ->first();  

        $this->set('user_details',$user_details);

        $salary_structuresTable = TableRegistry::get('salary_structures');
        
        $salary_structure_details = $salary_structuresTable->find("all")
                                         ->where(['is_active'=>1])
                                         ->select(['grade'=>'grade',
                                                    'salary_structure_id'=>'id'

                                                  ])
                                        ->toArray();  

        

        $this->set('salary_structure_details',$salary_structure_details);


        

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }
     
        $this->set('status',$status);
        $this->set('message',$message);
    }
}