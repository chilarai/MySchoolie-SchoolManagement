<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;



class FeesController extends AppController{


    public function index(){



        $feesTable = TableRegistry::get('fee_structures');

        if($this->request->is("get")){

            $fee_list = $feesTable->find("all")
                                    ->toArray();


                
                $this->set('fee_list',$fee_list);
            
            
        }
        else{

                $status    = "403";
                $message   = "Invalid method";

        }

        
    }

    public function exemptions(){
        
        $fee_exemptTable = TableRegistry::get('fee_exemptions');

        if ($this->request->is('post')) {

            $fee_exempt=$fee_exemptTable->newEntity();

            $fee_exempt->student_id=$this->request->data['student_id'];
            $fee_exempt->exempted_on=$this->request->data['exempted_on'];
            $fee_exempt->amount=$this->request->data['amount'];
            $fee_exempt->reason=$this->request->data['reason'];
            $fee_exempt->is_active=1;




            if($fee_exemptTable->save($fee_exempt)){
                
                $message = 'Fee Exempted Successfully';
                $status  =  200;


            }else{

                $message = 'Unable to exempt fee';
                $status  =  400;       
            }
        }
        else{
                $message = 'Please Enter Exemption Details';
                $status  =  403;
        }

        $exempt_list = $fee_exemptTable->find("all")
                                    ->where(['fee_exemptions.is_active'=>1])
                                     ->select(['student_name'=> "concat(students.first_name,' ',students.last_name)",
                                               'class_id'=>'classes.id',
                                               'class'=>'classes.class',
                                               'section'=>'classes.section',
                                               'rollno'=>'class_students.roll_no',
                                               'exemptedon'=>'exempted_on',
                                               'exemption_reason'=>'fee_exemptions.reason',
                                               'exempted_fee'=>'(fee_structures.total_fee -fee_exemptions.amount)',
                                               'actual_fee'=>'fee_structures.total_fee',
                                               'concession'=>'fee_exemptions.amount',
                                               'date'=>'date(fee_exemptions.modified_date)',
                                              ])
                                     ->join([
                                                'table' => 'students',
                                                'type' => 'LEFT',
                                                'conditions' => 'fee_exemptions.student_id = students.id'])
                                     ->join([
                                                'table' => 'class_students',
                                                'type' => 'LEFT',
                                                'conditions' => 'students.id = class_students.student_id'])
                                     ->join([
                                                'table' => 'classes',
                                                'type' => 'LEFT',
                                                'conditions' => 'class_students.class_id = classes.id'])
                                     ->join([
                                                'table' => 'fee_structures',
                                                'type' => 'LEFT',
                                                'conditions' => 'fee_structures.class = classes.class'])

                                    ->toArray();




        


        $http = new Client();
        $classlist_response = $http->get(CLASS_LIST);
        $studentlist_response = $http->get(ALL_STUDENT_LIST);

        $this->set('message',$message);
        $this->set('status',$status);
        $this->set('exempt_list', $exempt_list);
        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
    }

    public function collection(){
     
      

        if ($this->request->is('post')) {

          $student_id = $this->request->data['student_id'];

                                   

            $fee_student_statusTable = TableRegistry::get('fee_student_status');

            $fee = $fee_student_statusTable->find("all")
                          ->where(['fee_student_status.student_id'=> $student_id
                                  ])
                           ->select(['fee_student_status_id'=>'fee_student_status.id',
                           			 'student_name'=> "concat(students.first_name,' ',students.last_name)",
                                     'class_id'=>'classes.id',
                                     'class'=>'classes.class',
                                     'section'=>'classes.section',
                                     'rollno'=>'class_students.roll_no',
                                     'exemptedon'=>'exempted_on',
                                     'exemption_reason'=>'fee_exemptions.reason',
                                     'exempted_fee'=>'(fee_structures.total_fee -fee_exemptions.amount)',
                                     'actual_fee'=>'fee_structures.total_fee',
                                     'concession'=>'fee_exemptions.amount',
                                     'payment_date'=>'date(fee_student_status.datetime)',
                                     'fee_status'=>'fee_student_status.status'
                                    ])
                           ->join([
                                      'table' => 'students',
                                      'type' => 'LEFT',
                                      'conditions' => 'fee_student_status.student_id = students.id'])
                           ->join([
                                      'table' => 'class_students',
                                      'type' => 'LEFT',
                                      'conditions' => 'students.id = class_students.student_id'])
                           ->join([
                                      'table' => 'classes',
                                      'type' => 'LEFT',
                                      'conditions' => 'class_students.class_id = classes.id'])
                           ->join([
                                      'table' => 'fee_structures',
                                      'type' => 'LEFT',
                                      'conditions' => 'fee_structures.class = classes.class'])
                            ->join([
                                      'table' => 'fee_exemptions',
                                      'type' => 'LEFT',
                                      'conditions' => 'fee_exemptions.student_id = students.id'])

                          ->toArray();

            

            $this->set('fee', $fee);


        }

        if(empty($message))
            $message = 'Please Enter All the Data';

        $http = new Client();
        $classlist_response = $http->get(CLASS_LIST);
        $studentlist_response = $http->get(ALL_STUDENT_LIST);

        $this->set('message',$message);
        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);

    }


    public function reports(){
        
    }  

    public function payment(){


		if ($this->request->is('post')) {

          $fee_student_status_id = $this->request->data['fee_status_id'];

                                   

	        $fee_student_statusTable = TableRegistry::get('fee_student_status');


	        //For Insertion of Fees
	        if(isset( $this->request->data['total_fee'])){

	        	$fee_status_update = $fee_student_statusTable->find("all")
	                      ->where(['fee_student_status.id'=> $fee_student_status_id,
	                      		   'fee_student_status.status'=>'pending'
	                              ])
	                      ->first();

	            if($this->request->data['payment_mode'] == 1 ) $fee_status_update->payment_mode = 'cash';
	            elseif($this->request->data['payment_mode'] == 2 ) $fee_status_update->payment_mode = 'credit card';
	            elseif($this->request->data['payment_mode'] == 3 ) $fee_status_update->payment_mode = 'debit card';
	            elseif($this->request->data['payment_mode'] == 4 ) $fee_status_update->payment_mode = 'net banking';

	            $fee = $fee_student_statusTable->find("all")
	                      ->where(['fee_student_status.id'=> $fee_student_status_id
	                              ])
	                       ->select(['fee_student_status_id'=>'fee_student_status.id',
	                       			 'student_name'=> "concat(students.first_name,' ',students.last_name)",
	                                 'class_id'=>'classes.id',
	                                 'class'=>'classes.class',
	                                 'section'=>'classes.section',
	                                 'rollno'=>'class_students.roll_no',
	                                 'exemptedon'=>'exempted_on',
	                                 'exemption_reason'=>'fee_exemptions.reason',
	                                 'exempted_fee'=>'(fee_structures.total_fee -fee_exemptions.amount)',
	                                 'actual_fee'=>'fee_structures.total_fee',
	                                 'concession'=>'fee_exemptions.amount',
	                                 'payment_date'=>'date(fee_student_status.datetime)',
	                                 'fee_status'=>'fee_student_status.status',
	                             	 'student_details_json'=>'students.details_json',
	                             	 'fee_details_json'=>'fee_structures.fee_detail_json',
	                             	 'parent_phone'=>'users.mobile',
	                             	 'invoice_created_date'=>'date(fee_student_status.created_date)'
	                                ])
	                       ->join([
	                                  'table' => 'students',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'fee_student_status.student_id = students.id'])
	                       ->join([
	                                  'table' => 'class_students',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'students.id = class_students.student_id'])
	                       ->join([
	                                  'table' => 'classes',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'class_students.class_id = classes.id'])
	                       ->join([
	                                  'table' => 'fee_structures',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'fee_structures.class = classes.class'])
	                        ->join([
	                                  'table' => 'fee_exemptions',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'fee_exemptions.student_id = students.id'])
	                    	->join([
								        'table' => 'parent_students',
								        'type' => 'LEFT',
								        'conditions' => 'students.id = parent_students.student_id'])
							 ->join([
								        'table' => 'users',
								        'type' => 'LEFT',
								        'conditions' => 'parent_students.user_id = users.id'])
	                          ->first();


	            if(is_null($fee['exempted_fee'])) $total_fee = $fee['actual_fee'];
	            else $total_fee = $fee['exempted_fee'];

	            if($total_fee == $this->request->data['total_fee']){

	            	$fee_status_update->amount = $total_fee;
	            	$fee_status_update->datetime = date("Y-m-d H:i:s");
	            	$fee_status_update->status = 'paid';

	            	$fee_student_statusTable->save($fee_status_update);

	            	$message = 'Payment Updated Successfully';
	            }

	            $message = 'Unable to Update The Payment';

	        }
	        //Insertion of Fee Block End

	        $fee = $fee_student_statusTable->find("all")
	                      ->where(['fee_student_status.id'=> $fee_student_status_id
	                              ])
	                       ->select(['fee_student_status_id'=>'fee_student_status.id',
	                       			 'student_name'=> "concat(students.first_name,' ',students.last_name)",
	                                 'class_id'=>'classes.id',
	                                 'class'=>'classes.class',
	                                 'section'=>'classes.section',
	                                 'rollno'=>'class_students.roll_no',
	                                 'exemptedon'=>'exempted_on',
	                                 'exemption_reason'=>'fee_exemptions.reason',
	                                 'exempted_fee'=>'(fee_structures.total_fee -fee_exemptions.amount)',
	                                 'actual_fee'=>'fee_structures.total_fee',
	                                 'concession'=>'fee_exemptions.amount',
	                                 'payment_date'=>'date(fee_student_status.datetime)',
	                                 'fee_status'=>'fee_student_status.status',
	                             	 'student_details_json'=>'students.details_json',
	                             	 'fee_details_json'=>'fee_structures.fee_detail_json',
	                             	 'parent_phone'=>'users.mobile',
	                             	 'invoice_created_date'=>'date(fee_student_status.created_date)'
	                                ])
	                       ->join([
	                                  'table' => 'students',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'fee_student_status.student_id = students.id'])
	                       ->join([
	                                  'table' => 'class_students',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'students.id = class_students.student_id'])
	                       ->join([
	                                  'table' => 'classes',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'class_students.class_id = classes.id'])
	                       ->join([
	                                  'table' => 'fee_structures',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'fee_structures.class = classes.class'])
	                        ->join([
	                                  'table' => 'fee_exemptions',
	                                  'type' => 'LEFT',
	                                  'conditions' => 'fee_exemptions.student_id = students.id'])
	                    	->join([
								        'table' => 'parent_students',
								        'type' => 'LEFT',
								        'conditions' => 'students.id = parent_students.student_id'])
							 ->join([
								        'table' => 'users',
								        'type' => 'LEFT',
								        'conditions' => 'parent_students.user_id = users.id'])
	                          ->first();

	            $schoolsTable = TableRegistry::get('schools');

	            $schoolinfo = $schoolsTable->find("all")
	                           ->select(['school_name'=>'name',
	                                     'school_detail_json'=>'details_json'
	                                    ])
	                          ->first();

	            

	            $this->set('fee', $fee);
	            $this->set('schoolinfo', $schoolinfo);


	        }

        if(empty($message))
            $message = 'Please Enter All the Data';

        $http = new Client();


        $this->set('message',$message);


    } 

    
}


?>