<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;

class InfosController extends AppController
{

	public function index(){
        
    }

    public function appinfo(){


		// $this->viewBuilder()->layout('ajax');

		if($this->request->is("get")){

			$returnArray = array(
				"status"	=> "200",
    			"message"	=> "App details",
    			"details"	=> array(
    				"api_version"	=>	"1.0.1",
    				"app_name"		=> "My Schoolie",
    				"website"		=> "http://myschoolie.in",
    				"contact"		=> "8130431891",
    				"about_app"		=> "A new way forward",
    				"logo"			=> BASE_URL."img/logo.png"  
    				)
				
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

    public function school(){

		if($this->request->is("post")){


			$schoolsTable = TableRegistry::get('schools');
			$school_details = $schoolsTable->find("all")->where(['id' => 1])->first();
			$school_details->name = $this->request->data['schoolname'];

			$website = $this->request->data['schoolwebsite'];
			$address = $this->request->data['schooladdress'];
			$phone = $this->request->data['schoolphone'];
			$email = $this->request->data['schoolemail'];
			$school_timing = $this->request->data['schooltime'];
			$lat = $this->request->data['schoollat'];
			$lon = $this->request->data['schoollon'];
			$alt_phone = $this->request->data['schoolaltphone'];

			if (!empty($this->request->data['upload_file']['size'] > 0)) {

				$today              = strtotime("now");


			    $name=$_FILES['upload_file']['name'];
			    $file=explode('.', $name);
			    $ext = end((explode(".", $name))); //extension of file
			    $target_path = WWW_ROOT . "uploads/images/".$today.".".$ext ;
			    //$filename=$user_id.'.'.$file[1];
			    $tmp=$_FILES['upload_file']['tmp_name'];
			    move_uploaded_file($tmp, $target_path);
			    //$profilepic="profilepic/".$filename;
		       
			    $logo    =   $today.".".$ext ;

			    unlink(WWW_ROOT."uploads/images/".$this->request->data['schoollogo']);
			       


			     
			}
			else{

				$logo =  $this->request->data['schoollogo'];

			}

			$detail_array = array('logo' => $logo,
                                  'website'	=> $website,
                                  'address'	=> $address,
                                  'phone'	=> $phone,
                                  'email'	=> $email,
                                  'school_timing'	=> $school_timing,
                                  'lat'=>$lat,
                                  'lon'=>$lon,
                                  'alt_phone'=>$alt_phone	
								 );
			$school_details->details_json	=	json_encode($detail_array);


			//pr($this->request->data);
			//pr($school_details->details_json );

			$schoolsTable->save($school_details);
		}


			$http = new Client();
			$response = $http->get(SCHOOL_INFO);

			$this->set('status', $response->code);
			$this->set('response', $response->json);
	}



		public function schoolapi(){

		$this->viewBuilder()->layout('ajax');

		$schoolsTable = TableRegistry::get('Schools');

		if($this->request->is("get")){

			$school_details = $schoolsTable->find("all")->where(['id' => 1])->first();

			if(!empty($school_details)){

				$returnArray = array(
					"status"	=> "200",
					"message"	=> "School details",
					"details"	=> array(
						"school_name"	=> $school_details->name,
						"other_details"	=> json_decode($school_details->details_json, true)
						)
					);
			}
			else{
	 	 		$returnArray = array(
	    			"status"	=> "403",
	    			"message"	=> "School details not found",
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

/*
 *	APP INFORMATION
 *	About the application
 */


	public function appinfoapi(){


		$this->viewBuilder()->layout('ajax');

		if($this->request->is("get")){

			$returnArray = array(
				"status"	=> "200",
    			"message"	=> "App details",
    			"details"	=> array(
    				"api_version"	=>	"1.0.1",
    				"app_name"		=> "My Schoolie",
    				"website"		=> "http://myschoolie.in",
    				"contact"		=> "8130431891",
    				"about_app"		=> "A new way forward",
    				"logo"			=> "http://myschoolie.in/logo.png" 
    				)
				
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




}