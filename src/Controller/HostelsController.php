<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class HostelsController extends AppController
{

  public function index(){
        
        $hostelsTable = TableRegistry::get('hostels'); 

        if($this->request->is("get")){

            $hostels_list = $hostelsTable->find("all")
                                         ->select(['hostel_name', 
                                                   'hostel_type', 
                                                   'capacity','vacancy',
                                                   'details_json'])
                                         ->toArray();
        }
        else{
            $hostels_list = array('hostel_name'=>'',
                                  'hostel_type'=>'',
                                  'capacity'=>'',
                                  'vacancy'=>'',
                                  'details_json'=>'');
        }

        $this->set("hostels_list", $hostels_list);       
    }





    public function allotments(){

        $http = new Client();
        $classlist_response = $http->get(CLASS_LIST);



        $hostelsTable = TableRegistry::get('hostels');

        $hostels_list = $hostelsTable->find("all")
                                         ->select(['hostel_name', 
                                                   'hostel_type', 
                                                   'capacity',
                                                   'vacancy',
                                                   'details_json'])
                                         ->toArray();

        if(empty($hostels_list))
            $hostels_list = array('hostel_name'=>'','hostel_type'=>'','capacity'=>'','vacancy'=>'','details_json'=>'');


        if ($this->request->is('post')){

            if(!empty($this->request->data['student_id'])){
                
                $student_detail = $http->post(STUDENT_DETAIL, ['student_id'=>$this->request->data['student_id']]);

                $this->set('student_detail',$student_detail->json);

                $hostelsTable = TableRegistry::get('hostels'); 

                $hostels_list = $hostelsTable->find("all")
                                        ->where(['hostel_type'=> $student_detail->json['details']['gender']])
                                        ->orWhere(['hostel_type' => 'co-ed'])
                                         ->select(['id','hostel_name', 
                                                   'hostel_type', 
                                                   'capacity','vacancy',
                                                   'details_json'])
                                         ->toArray();

                $this->set('student_id',$this->request->data['student_id']);

                $this->set('hostel_detail',$hostels_list);


            }

            if(!empty($this->request->data['student_id']) && !empty($this->request->data['hostel_id']) && !empty($this->request->data['room_no']) && !empty($this->request->data['allotted_from'])){

              $student_id = $this->request->data['student_id'];
              $hostel_id = $this->request->data['hostel_id'];
              $room_no = $this->request->data['room_no'];
              $allotted_from = $this->request->data['allotted_from'];

              //to check if any rooms are available
              $total_room_available = $hostelsTable->find("all")
                                        ->where(['id'=> $hostel_id])
                                         ->select(['vacancy'])
                                         ->first();
                
              $total_room_available = $total_room_available->vacancy;


              //to check if room is already allotted to the student
              $hostel_rooms_Table = TableRegistry::get('hostel_rooms');

              $check_if_allotted = $hostel_rooms_Table->find("all")
                                        ->where(['student_id'=> $student_id])
                                         ->select(['count'=>'count(hostel_rooms.id)'])
                                         ->first();

              $check_if_allotted = $check_if_allotted->count;

              if($total_room_available > 0 && $check_if_allotted == 0){

                $allotment_data                      =  $hostel_rooms_Table->newEntity();

                $allotment_data->hostel_id      =  $hostel_id;
                $allotment_data->student_id     =  $student_id;
                $allotment_data->allotted_from  =  strtotime($allotted_from);
                $allotment_data->room_no        =  $room_no;

                if( $hostel_rooms_Table->save($allotment_data)){
                    
                    $message = 'Hostel Allotted Successfully';
                  

                    $hostelsTable->updateAll(
                      array(
                        'hostels.vacancy' => $total_room_available - 1
                      ), 
                      array('hostels.id' => $hostel_id));
                }


              }
              elseif ($check_if_allotted > 0 ) {

                $message = 'Hostel Already Allotted';
              }
              else{

                $message = 'No rooms are available right now';
              }






            }



        }

        $show_all_hostels = $hostelsTable->find("all")
                                         ->select(['hostel_name', 
                                                   'hostel_type', 
                                                   'capacity',
                                                   'vacancy',
                                                   'details_json'])
                                         ->toArray();

        if(empty($message))
            $message = 'Please Enter All the Data';




        $this->set('message',$message);
        $this->set('classlist', $classlist_response->json);
        $this->set("hostels_list", $hostels_list);
        $this->set("hostels_list_all", $show_all_hostels);


        
    }





    public function outs(){

        $hostelsTable = TableRegistry::get('hostels');

        $hostels_list = $hostelsTable->find("all")
                                         ->select(['id','hostel_name', 
                                                   'hostel_type', 
                                                   'capacity',
                                                   'vacancy',
                                                   'details_json'])
                                         ->toArray();

        $hostel_roomsTable = TableRegistry::get('hostel_rooms');

        $hostel_student_list = $hostel_roomsTable->find("all")
                                         ->select(['hostel_id',
                                                   'student_id', 
                                                   'name'=> "concat(first_name,' ',last_name,' Room No : ',room_no)"])
                                         ->join([
                                                  'table' => 'students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostel_rooms.student_id = students.id'])
                                         ->toArray();

        if(empty($hostel_student_list))
            $hostel_student_list = array('hostel_id'=>'','student_id'=>'','name'=>'');

        if(empty($hostels_list))
            $hostels_list = array('hostel_name'=>'','hostel_type'=>'','capacity'=>'','vacancy'=>'','details_json'=>'');


        if ($this->request->is('post')){

          if(!empty($this->request->data['hostel_id']) && !empty($this->request->data['student_id']) && !empty($this->request->data['leave_from']) && !empty($this->request->data['leave_to'])  && !empty($this->request->data['reason'])  && !empty($this->request->data['leave_with'])   && !empty($this->request->data['reference_address'])   && !empty($this->request->data['contact_number'])){


            $hostel_room_leavesTable = TableRegistry::get('hostel_room_leaves');
            $hostel_student_leave                      =  $hostel_room_leavesTable->newEntity();

            $hostel_student_leave->student_id   = $this->request->data['student_id'];
            $hostel_student_leave->hostel_id    = $this->request->data['hostel_id'];
            $hostel_student_leave->leave_from   = strtotime($this->request->data['leave_from']);
            $hostel_student_leave->leave_to     = strtotime($this->request->data['leave_to']);
            $hostel_student_leave->reason       = $this->request->data['reason'];
            $hostel_student_leave->relation_type   = $this->request->data['leave_with'];
            $hostel_student_leave->reference_contact_no   = $this->request->data['contact_number'];
            $hostel_student_leave->reference_address   = $this->request->data['reference_address'];

            if( $hostel_room_leavesTable->save($hostel_student_leave)){
                
                $message = 'Hostel Leave Applied Successfully';

            }
           else{
                $message = 'Unable to apply for leave';
            }
          }
        }
      



        if(empty($message))
            $message = 'Please Enter All the Data';




        $this->set('message',$message);
        $this->set("hostels_list", $hostels_list);
        $this->set("hostel_student_list", $hostel_student_list);        
    }




    public function ins(){

        $hostel_room_leavesTable = TableRegistry::get('hostel_room_leaves ');


        if ($this->request->is('post')){

          if(!empty($this->request->data['leave_type'])){ 

            $leave_type = $this->request->data['leave_type'];

            if($leave_type == 'upcoming')
              $hostel_on_leave_list = $hostel_room_leavesTable->find("all")
                                         ->where(['hostel_room_leaves.is_active'=> 1])
                                         ->select(['hostel_leave_id'=>'hostel_room_leaves.id',
                                                   'student_id'=>'students.id', 
                                                   'name'=> "concat(first_name,' ',last_name)",
                                                   'rollno'=>'roll_no',
                                                   'class'=>"concat(classes.class,' - ',classes.section)",
                                                   'room' => 'room_no',
                                                   'status'=>'hostel_room_leaves.is_active',
                                                   'name_hostel'=>'hostel_name',
                                                   'back_on'=>'hostel_room_leaves.leave_to'])
                                          ->join([
                                                  'table' => 'students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = hostel_room_leaves.student_id'])
                                         ->join([
                                                  'table' => 'hostel_rooms',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostel_rooms.student_id = students.id'])
                                         ->join([
                                                  'table' => 'class_students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = class_students.student_id'])
                                        ->join([
                                                  'table' => 'classes',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'class_students.class_id = classes.id'])
                                        ->join([
                                                  'table' => 'hostels',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostels.id = hostel_rooms.hostel_id'])
                                         ->toArray();

            elseif ($leave_type == 'today')
              $hostel_on_leave_list = $hostel_room_leavesTable->find("all")
                                         ->where(['NOW() between leave_from and leave_to'])
                                         ->select(['hostel_leave_id'=>'hostel_room_leaves.id',
                                                   'student_id'=>'students.id', 
                                                   'name'=> "concat(first_name,' ',last_name,' Room No : ',room_no)",
                                                   'status'=>'hostel_room_leaves.is_active'])
                                          ->join([
                                                  'table' => 'students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = hostel_room_leaves.student_id'])
                                         ->join([
                                                  'table' => 'hostel_rooms',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostel_rooms.student_id = students.id'])
                                         ->toArray();

            elseif ($leave_type == 'all')
              $hostel_on_leave_list = $hostel_room_leavesTable->find("all")
                                         ->select(['hostel_leave_id'=>'hostel_room_leaves.id',
                                                   'student_id'=>'students.id', 
                                                   'name'=> "concat(first_name,' ',last_name,' Room No : ',room_no)",
                                                   'status'=>'hostel_room_leaves.is_active'])
                                          ->join([
                                                  'table' => 'students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = hostel_room_leaves.student_id'])
                                         ->join([
                                                  'table' => 'hostel_rooms',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostel_rooms.student_id = students.id'])
                                         ->toArray();

            else 
              $hostel_on_leave_list = $hostel_room_leavesTable->find("all")
                                         ->where(['hostel_room_leaves.is_active'=> 0])
                                         ->select(['hostel_leave_id'=>'hostel_room_leaves.id',
                                                   'student_id'=>'students.id', 
                                                   'name'=> "concat(first_name,' ',last_name,' Room No : ',room_no)",
                                                   'status'=>'hostel_room_leaves.is_active'])
                                          ->join([
                                                  'table' => 'students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = hostel_room_leaves.student_id'])
                                         ->join([
                                                  'table' => 'hostel_rooms',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostel_rooms.student_id = students.id'])
                                         ->toArray();



          }



        }





        

        if(empty($message))
            $message = 'Please Enter All the Data';

        if(empty($hostel_on_leave_list))
            $hostel_on_leave_list[] = array('hostel_leave_id'=>'','student_id'=>'','name'=>'','status'=>'2','rollno'=>'','class'=>'','name_hostel'=>'','back_on'=>'');




        $this->set('message',$message);
        $this->set("hostel_on_leave_list", $hostel_on_leave_list);   

        
    }



    
    public function createhostel(){

 
        if ($this->request->is('post')) {

            $hostelsTable = TableRegistry::get('hostels');

            $newhostel=$hostelsTable->newEntity();

            $newhostel->hostel_name=$this->request->data['name'];
            $newhostel->hostel_type=$this->request->data['hostel_type'];
            $newhostel->staff_id=$this->request->data['user_id'];
            $newhostel->capacity=$this->request->data['seats'];
            $newhostel->capacity=$this->request->data['seats'];
            $mess    = $this->request->data['mess'];
            //$notices->attachment=$this->request->data['upload_file'];

            if(!empty($newhostel->hostel_name) && !empty($newhostel->staff_id) && !empty($newhostel->capacity) && !empty($newhostel->hostel_type) ){

                if(isset($this->request->data['breakfast']))
                    $breakfast=$this->request->data['breakfast'];
                else
                    $breakfast=0;


                if(isset($this->request->data['lunch']))
                    $lunch=$this->request->data['lunch'];
                else
                    $lunch=0;

                if(isset($this->request->data['dinner']))
                    $dinner=$this->request->data['dinner'];
                else
                    $dinner=0;

                if(isset($this->request->data['fees']))
                    $fees=$this->request->data['fees'];
                else
                    $fees=0;

                $newhostel->details_json = json_encode(array('fees'=>$fees,'mess'=>$mess,
                                                 'breakfast'=>$breakfast,
                                                 'lunch'=>$lunch,
                                                 'dinner'=>$dinner)); 


                if($hostelsTable->save($newhostel)){
                    
                    $message = 'Hostel Added Successfully';



                }else{

                    $message = 'Unable to Add Hostel';
                            
                }
            }
            else{
                    $message = 'Please Enter All the Data';
            }



        }

        if(empty($message))
            $message = 'This is a get request';


        $http = new Client();

        $teacherlist_response = $http->get(TEACHER_LIST);

        $this->set('message',$message);

        $this->set('teacherlist', $teacherlist_response->json);

    }


  public function modifyleave(){

    $this->viewBuilder()->layout('ajax');

    if ($this->request->is('post')) {

      $leave_id = $this->request->data['hostel_leave_id'];

      if(isset($leave_id)){


        $Leaves = TableRegistry::get('hostel_room_leaves');

        $query = $Leaves->query();

        $user_select = $query->find("all")->where(['id' => $leave_id])->first();

        if(!empty($user_select)){

          $user_select->is_active = 0;
          $Leaves->save($user_select);

            $returnArray = array(
            "status"  => "200",
            "message" => "leave rejected"

            );
        }
        else{
          $returnArray = array(
              "status"  => "403",
              "message" => "No leaves found",
              "details" => array()
            );
        }
        
       }
       else{
        $returnArray = array(
            "status"  => "403",
            "message" => "Invalid parameter",
            "details" => array()
          );
       }
 
        }
        else{

          $returnArray = array(
          "status"  => "403",
          "message" => "Invalid method",
          "details" => array()
          );
        }

        $this->set("response", $returnArray);

  }



    public function reports(){

        $hostelsTable = TableRegistry::get('hostels');

        $hostels_list = $hostelsTable->find("all")
                                         ->select(['id','hostel_name', 
                                                   'hostel_type', 
                                                   'capacity','vacancy',
                                                   'details_json'])
                                         ->toArray();

        if ($this->request->is('post')){

          if(!empty($this->request->data['hostel_id']) && !empty($this->request->data['start_date']) && !empty($this->request->data['end_date']) && !empty($this->request->data['report_type'])){

            $hostel_id = $this->request->data['hostel_id'];
            $start_date = $this->request->data['start_date'];
            $end_date = $this->request->data['end_date'];
            $report_type = $this->request->data['report_type'];


            if($report_type == 'inout'){

              $hostel_room_leavesTable = TableRegistry::get('hostel_room_leaves');

              $hostel_leave_list = $hostel_room_leavesTable->find("all")
                                            ->where(function ($exp, $q) {
                                                return $exp->addCase(
                                                    [

                                                        $q->newExpr()->between('leave_from', strtotime($this->request->data['start_date']) , 
                                                                                                strtotime($this->request->data['end_date'])  )

                                                    ]
                                                );
                                            })
                                            ->orwhere(function ($exp, $q) {
                                                return $exp->addCase(
                                                    [

                                                        $q->newExpr()->between('leave_to', strtotime($this->request->data['start_date']) , 
                                                                                                strtotime($this->request->data['end_date'])  )

                                                    ]
                                                );
                                            })
                                         ->select(['hostel_leave_id'=>'hostel_room_leaves.id',
                                                   'student_id'=>'students.id', 
                                                   'name'=> "concat(first_name,' ',last_name)",
                                                   'rollno'=>'roll_no',
                                                   'class'=>"concat(classes.class,' - ',classes.section)",
                                                   'room' => 'room_no',
                                                   'status'=>'hostel_room_leaves.is_active',
                                                   'name_hostel'=>'hostel_name',
                                                   'leave_from'=>'hostel_room_leaves.leave_from',
                                                   'leave_to'=>'hostel_room_leaves.leave_to'])
                                          ->join([
                                                  'table' => 'students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = hostel_room_leaves.student_id'])
                                         ->join([
                                                  'table' => 'hostel_rooms',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostel_rooms.student_id = students.id'])
                                         ->join([
                                                  'table' => 'class_students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = class_students.student_id'])
                                        ->join([
                                                  'table' => 'classes',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'class_students.class_id = classes.id'])
                                        ->join([
                                                  'table' => 'hostels',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostels.id = hostel_rooms.hostel_id'])
                                         ->toArray();

              $this->set('hostel_leave_list',$hostel_leave_list);
            }

            elseif ($report_type == 'occupancy'){


              $hostel_roomsTable = TableRegistry::get('hostel_rooms');

              $hostel_room_list = $hostel_roomsTable->find("all")
                                         // ->where(['NOW() between leave_from and leave_to'])
                                            ->where(function ($exp, $q) {
                                                return $exp->addCase(
                                                    [

                                                        $q->newExpr()->between('allotted_from', $this->request->data['start_date'] , 
                                                                                                $this->request->data['end_date']  )

                                                    ]
                                                );
                                            })
                                         ->select(['student_id'=>'students.id', 
                                                   'name'=> "concat(first_name,' ',last_name)",
                                                   'rollno'=>'roll_no',
                                                   'class'=>"concat(classes.class,' - ',classes.section)",
                                                   'room_no'=>'hostel_rooms.room_no',
                                                   'name_hostel'=>'hostel_name',
                                                   'allotted_on'=>'hostel_rooms.allotted_from'])
                                          ->join([
                                                  'table' => 'hostels',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'hostels.id = hostel_rooms.hostel_id'])
                                          ->join([
                                                  'table' => 'students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = hostel_rooms.student_id'])
                                         ->join([
                                                  'table' => 'class_students',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'students.id = class_students.student_id'])
                                         ->join([
                                                  'table' => 'classes',
                                                  'type' => 'LEFT',
                                                  'conditions' => 'class_students.class_id = classes.id'])
                                         ->toArray();

                $this->set('hostel_room_list',$hostel_room_list);
            }
          }        

        }

        $this->set('hostel_detail',$hostels_list);

    }

}