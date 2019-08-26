<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;


class CircularsController extends AppController
{

    public function index(){

		$http = new Client();
		$response = $http->get(CIRCULARLIST);

		$this->set('status', $response->code);
		$this->set('response', $response->json);
	}

	public function upload(){

		if($this->request->is('post')){
			
			$circularsTable = TableRegistry::get('circulars');
			$usersTable = TableRegistry::get('users');


			$circulars  	=	$circularsTable->newEntity();
			$circulars->heading=$this->request->data['heading'];
			$circulars->body=$this->request->data['body'];
			$circulars->event_date=strtotime($this->request->data['event_date']);
			$circulars->year= date("Y");
			$circulars->is_active=1;
			$circulars->event_type=$this->request->data['event_type'];
			$circulars->category=$this->request->data['category'];

			$upload_file = $this->request->data['upload_file'];

			if ($upload_file['size'] > 0) {

				$today              = strtotime("now");

				//$circulars->media_type=$_FILES['upload_file']['type'];
				$circulars->media_type=strtok($upload_file['type'], '/');
				// print_r($_SERVER);
			    $name=$upload_file['name'];
			    $file=explode('.', $name);
			    $ext = end($file); //extension of file
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/circulars/images/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$upload_file['tmp_name'];


			    move_uploaded_file($tmp, $target_path1);

		       
		       $circulars->media_link    =   $target_path;

			}

			$circularsTable->save($circulars);

			//code for fcm begins

			if($circulars->category == 'student'){

				$fcm_select = $usersTable->find("all")->where(['user_type_id' => 5,
																'fcm_id  IS NOT NULL'])
 	 					->select(['user_id'=>'DISTINCT users.id',
					  			'fcm_id'=>'users.fcm_id'])
					    ->toArray();

			}elseif ($circulars->category == 'teacher') {
				
				$fcm_select = $usersTable->find("all")->where(['user_type_id' => 4,'fcm_id  IS NOT NULL'])
 	 					->select(['user_id'=>'DISTINCT users.id',
					  			'fcm_id'=>'users.fcm_id'])
					    ->toArray();

				// pr($fcm_select);
			}else{

				$fcm_select = $usersTable->find("all")->where(['fcm_id  IS NOT NULL'])
 	 					->select(['user_id'=>'DISTINCT users.id',
					  			'fcm_id'=>'users.fcm_id'])
					    ->toArray();

			}



			foreach ($fcm_select as $key => $value) {
						$fcm[] = $value['fcm_id'];

			}
					


			//fcm ids retrieved above

			//$_GET['id'] = $fcm;

			// API access key from Google API's Console
			if(empty($fcm))$fcm='';

			$registrationIds = $fcm;
			// prep the bundle
			$notification = array
			(
			    'title'     => 'New Circular',
			    'body'      => $circulars->heading,
			    'icon'      => "large",
			    'sound'     => 'default',
			    'tag'       => rand(),
			    'color'     => '#3bc0ab'

			);

			$data = array
			(
			    'message' => 'message body',
			    'click_action' => "PUSH_INTENT"
			);

			$fields = array
			(
			    'registration_ids'  => $registrationIds,
			    'notification'      => $notification,
			    'data'              => $data,
			    'priority'          => 'normal'

			);

			$headers = array
			(
			    'Authorization: key=' . API_ACCESS_KEY,
			    'Content-Type: application/json'
			);

			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
			
			//echo $result;




			//code for fcm end


			if($circulars->isNew()){

			}else{

				$message = 'Circular Added Succesfully';


				$status = 200;

			}
		}

		if(empty($message)){

			$message = 'Add Circular Details';
			$status = 403;			
		}


		$this->set("status", $status);
		$this->set("message", $message);

		
	}





	


	public function circularslistapi(){


		$this->viewBuilder()->layout('ajax');


		$circularsTable = TableRegistry::get('Circulars');

		if($this->request->is("get")){

			$circulars_list = $circularsTable->find("all")->order(['id'=>'desc'])->limit(10)->toArray();
			// ->where(['event_date > CURDATE()'])

			foreach($circulars_list as $value){
				 
				$value['media_link'] = BASE_URL.'uploads/circulars/images/'.$value['media_link'];
			}

			$returnArray = array(
				"status"	=> "200",
    			"message"	=> "Circular list",
    			"details"	=> $circulars_list
				
				);



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



	public function edit($id){

		$array[0] = $id;
		$circularsTable = TableRegistry::get('Circulars');

		

			$circular_detail = $circularsTable->find("all")
												->select(['id','category', 'event_type', 'event_date', 'body', 'heading', 'media_link', 'year'])
												->where(['id'=>$id])->first();


				// if(!is_null($circulars_detail['media_link']))
				// $circulars_detail['media_link'] = BASE_URL.'webroot/uploads/circulars/images/'.$circulars_detail['media_link'];



			if($this->request->is("post")){
				
				$circulars_detail = $circularsTable->get($id);
				$circulars_detail->heading = $this->request->data['heading'];
				$circulars_detail->body = $this->request->data['body'];
				$circulars_detail->event_date = strtotime($this->request->data['event_date']);
				$circulars_detail->category=$this->request->data['category'];
				$circulars_detail->event_type=$this->request->data['event_type'];

				$upload_file = $this->request->data['upload_file'];

				if ($upload_file['size'] > 0) {

					$today              = strtotime("now");

					//$circulars->media_type=$_FILES['upload_file']['type'];
					$circulars_detail->media_type=strtok($upload_file['type'], '/');
					// print_r($_SERVER);
				    $name=$upload_file['name'];
				    $file=explode('.', $name);
				    $ext = end($file); //extension of file
				    $target_path = $today.".".$ext ;
				    $target_path1 = WWW_ROOT . "uploads/circulars/images/".$today.".".$ext ;
				    //$filename=$user_id.'.'.$file[1];
				    $tmp=$upload_file['tmp_name'];


				    move_uploaded_file($tmp, $target_path1);

			       
			       $circulars_detail->media_link    =   $target_path;

				}


				if($circularsTable->save($circulars_detail))
				{
					$this->redirect(array("action" => "index"));
				}


				


			}	


		

			$this->set("status", $status);
			$this->set("message", $message);


			


        
        

        $this->set("response", $circular_detail);
		
	}
	public function deletecircular($id)
	{
		$array[0] = $id;
		$circulars_table = TableRegistry::get('circulars');
		$entity = $circulars_table->get($id);
		if($circulars_table->delete($entity))
		{
			$this->redirect(array("action" => "index"));
			
		}
	}



}