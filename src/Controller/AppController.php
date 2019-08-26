<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Log\Log;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $session = $this->request->session();
		//for edit student
		if ($this->request->params['action'] == 'login' || $this->request->params['action'] == 'editstudent' || $this->request->params['action'] != 'intro')
		{
			
		}
		// end for edit student
        if ($this->request->params['action'] != 'login'  AND $this->request->params['action'] != 'editstudent' AND $this->request->params['action'] != 'intro')
        {
            // execute beforeFilter logic
            

            if($session->read('mobile')){



                $this->set("username", $session->read('name'));


                //Dashboard Notification Code 

                $leavesTable = TableRegistry::get('leaves_teachers');

                $leaves_details = $leavesTable->find("all")
                                            ->where(["leaves_teachers.is_active"=>1])
                                              ->select(['leave_count'=>'count(leaves_teachers.id)',
                                                   ])
                                              ->first();

                $appointmentsTable = TableRegistry::get('appointments');

                $query = $appointmentsTable->query();

                $upcoming_appointments = $query->find('all')
                                        ->where(["is_active"=>1,"offered_date >= CURDATE()"])
                                        ->orWhere(["is_active"=>2,"offered_date >= CURDATE()"])
                                         ->select(['appointments'=>'count(appointments.id)'])
                                        ->first();

                $total_notification = $upcoming_appointments['appointments'] + $leaves_details['leave_count'];


                $notification_bar = array(
                    "status"    => "200",
                    "upcoming_appointments"=>$upcoming_appointments['appointments'],
                    "notification_leave"=>$leaves_details['leave_count'],
                    "total_notification"=>$total_notification
                );

                $this->set("notification_bar", $notification_bar);

               





            }       
            else{

                $this->redirect('/users/login');
            }

        }
    }
}



