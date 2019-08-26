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
use Cake\Mailer\Email;


class UsersController extends AppController
{

		public function login(){

		 $this->viewBuilder()->layout('authscreen');
		 
		if ($this->request->is('post')) {

			if($this->request->data['mobile']){

					$mobile = $this->request->data['mobile'];
					$password = $this->request->data['password'];
					$user_type_id = 1;

					if(isset($mobile, $password, $user_type_id)){
						$user_select = $this->Users->find("all")->where(['mobile' => $mobile, 'user_type_id' => $user_type_id])->contain(['UserTypes'])->select(['Users.id', 'Users.mobile', 'Users.name', 'Users.password', 'Users.is_active', 'UserTypes.user_type'])->first();
						
						print_r($user_select);

						if(!empty($user_select)){

							if(md5($password) == $user_select->password){
								$returnArray = array(
								"status"	=> "200",
								"message"	=> "user details",
								"details"	=> array(
									"user_id"	=> $user_select->id,
									"mobile"	=> $user_select->mobile,
									"name"		=> $user_select->name,
									"user_type"	=> $user_select->user_type->user_type,
									"is_active"	=> $user_select->is_active
									)
								);

								//session write

								$session = $this->request->session();
								$session->write('mobile',$user_select->mobile);
								$session->write('user_id',$user_select->id);
								$session->write('user_type',$user_select->user_type->user_type);
								$session->write('name',$user_select->name);

								//print_r($session->read('mobile'));
								$this->redirect('/dashboards');




							}
							else{
								$returnArray = array(
									"status"	=> "403",
									"message"	=> "Passwords do not match",
									"details"	=> array()
								);
							}
							
						}
						else{
							$returnArray = array(
								"status"	=> "403",
								"message"	=> "No user found",
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


    public function profile(){

    	if($this->request->is('post')){
		$session= $this->request->session();
		$users=$session->read('user_id');
		$http = new Client();
		$response = $http->post(PASSWORD_CHANGE, ['user_id'=>$users, 'old_password' =>$this->request->data['old_password'],'new_password' =>$this->request->data['new_password'], 'confirm_password' =>$this->request->data['confirm_password']]);
		//pr($response);

		$this->set('status', $response->code);
		$this->set('response', $response->json);
		}
    }


   	public function passwordchangeapi(){

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

		$this->viewBuilder()->layout("ajax");

		$usersTable  = TableRegistry::get('Users');

		if($this->request->is("post")){

			$user_id = $this->request->data['user_id'];
			$new_password = $this->request->data['new_password'];
			$confirm_password = $this->request->data['confirm_password'];
			$old_password = $this->request->data['old_password'];

			if(isset($user_id, $new_password, $confirm_password, $old_password)){


				if($new_password == $confirm_password){
					$user = $usersTable->get($user_id);


					if(md5($old_password) == $user->password){

						$user->password = md5($new_password);

						if($usersTable->save($user)){

							$returnArray = array(
				    			"status"	=> "200",
				    			"message"	=> "Password changed",
				    			"details"	=> array()
				    		);
						}
						else{
							$returnArray = array(
				    			"status"	=> "403",
				    			"message"	=> "Error saving password. Try again",
				    			"details"	=> array()
				    		);
						}
					}
					else{

			        	$returnArray = array(
			    			"status"	=> "403",
			    			"message"	=> "You have entered wrong password",
			    			"details"	=> array()
			    		);
			        }
				}
				else{

		        	$returnArray = array(
		    			"status"	=> "403",
		    			"message"	=> "Passwords do not match",
		    			"details"	=> array()
		    		);
		        }
				
			}
			else{

	        	$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "Invalid parameters",
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

        $this->set('response', $returnArray);
	}

    public function logout(){
    	$this->viewBuilder()->layout("authscreen");
    	$this->request->session()->destroy();
    	$this->redirect('/users/login');
    }

    public function intro(){
    	$this->viewBuilder()->layout("authscreen");
    }



}