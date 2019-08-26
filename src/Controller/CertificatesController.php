<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class CertificatesController extends AppController
{

	public function index(){


		if($this->request->is("post")){

			if($this->request->data['certificate_type']==2){

				$id=1;

					$this->redirect('/certificates/studenttransfer',$id);
			

			}

			elseif($this->request->data['certificate_type']==1){


					$this->redirect('/certificates/studentcharacter');
			}

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

    public function studenttransfer(){




    }

    public function studentcharacter(){

    }

    
 

    public function assign(){

    }


}