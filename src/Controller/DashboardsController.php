<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\Log\Log;
use Cake\Routing\Router;

class DashboardsController extends AppController
{

	public function index(){

		$session = $this->request->session();

		if($session->read('mobile')){

			$students = TableRegistry::get('students');

			$query = $students->query();

			$total_student = $query->find('all')
		 	 						 ->select(['students_total'=>'count(students.id)'])
									 ->where(['is_active' => 1])
		 	 						->first();
		 	unset($query);



		 	$users = TableRegistry::get('users');

			$query = $users->query();

			$total_teachers = $query->find('all')
									->where(['user_type_id' => 4])
									->orWhere(['user_type_id'=>7])
		 	 						 ->select(['teachers_total'=>'count(users.id)'])
		 	 						->first();

		 	unset($query);


		 	$teachers_leave = TableRegistry::get('attendance_teachers');

			$query = $teachers_leave->query();

			$teachers_on_leave = $query->find('all')
									->where(["DATE(`modified_date`) != CURDATE()"])
		 	 						 ->select(['attendance_teachers'=>'count(attendance_teachers.id)'])
		 	 						->first();

		 	unset($query);


		 	$libraryTable = TableRegistry::get('books');

			$query = $libraryTable->query();

			$book_count = $query->find('all')
									->where(["is_active"=>1])
		 	 						 ->select(['total_books'=>'count(books.id)'])
		 	 						->first();



		 	unset($query);


		 	$fleetTable = TableRegistry::get('fleets');

			$query = $fleetTable->query();

			$fleet_count = $query->find('all')
									->where(["is_active"=>1])
		 	 						 ->select(['total_fleets'=>'count(fleets.id)'])
		 	 						->first();

		 	unset($query);


		 	$hostel_roomsTable = TableRegistry::get('hostel_rooms');

			$query = $hostel_roomsTable->query();

			$hosteller_count = $query->find('all')
									->where(["is_active"=>1])
		 	 						 ->select(['total_hosteller'=>'count(hostel_rooms.id)'])
		 	 						->first();

		 	unset($query);


		 	$hostelsTable = TableRegistry::get('hostels');

			$query = $hostelsTable->query();

			$hostel_seats_available = $query->find('all')
									->where(["is_active"=>1])
		 	 						 ->select(['total_seats'=>'sum(hostels.vacancy)'])
		 	 						->first();



		 	unset($query);


		 	$fleetsTable = TableRegistry::get('fleets');

			$query = $fleetsTable->query();

			$fleets_active = $query->find('all')
									->where(["is_active"=>1])
		 	 						 ->select(['total_fleets'=>'count(fleets.id)'])
		 	 						->first();


		 	unset($query);


		 	$appointmentsTable = TableRegistry::get('appointments');

			$query = $appointmentsTable->query();

			$upcoming_appointments = $query->find('all')
									->where(["is_active"=>1,"offered_date >= CURDATE()"])
									->orWhere(["is_active"=>2,"offered_date >= CURDATE()"])
		 	 						 ->select(['appointments'=>'count(appointments.id)'])
		 	 						->first();

			$leavesTable = TableRegistry::get('leaves_teachers');

		 	$leaves_details = $leavesTable->find("all")
		 								->where(["leaves_teachers.is_active"=>1])
										  ->select(['leave_count'=>'count(leaves_teachers.id)',
										  	   ])
										  ->first();

			$this->set("leaves_details", $leaves_details);

        	$returnArray = array(
    			"status"	=> "200",
    			"students"	=> $total_student['students_total'],
    			"teachers"	=> $total_teachers['teachers_total'],
    			"teachers_on_leave"	=> $teachers_on_leave['attendance_teachers'],
    			"username"	=> $session->read('name'),
    			"book_count"=>$book_count['total_books'],
    			"fleet_count"=>$fleet_count['total_fleets'],
    			"hosteller_count"=>$hosteller_count['total_hosteller'],
    			"hostel_vacancy"=>$hostel_seats_available['total_seats'],
    			"fleets_active"=>$fleets_active['total_fleets'],
    			"upcoming_appointments"=>$upcoming_appointments['appointments'],
    			"notification_leave"=>$leaves_details['leave_count']
    		);

		 	$this->set("response", $returnArray);

		 	//pr($session->read('name'));

		}
		else{

         	$this->redirect('/users/login');
    	}
		
	}

}