<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class FleetsController extends AppController
{

	public function index(){
		
		
       

        $fleetTable = TableRegistry::get('fleets');


        if ($this->request->is('post')) {


            if(isset($this->request->data['vehicle_type'])){


                $new_fleet = $fleetTable->newEntity();

                $new_fleet->vehicle_type = $this->request->data['vehicle_type'];
                $new_fleet->vehicle_no = $this->request->data['vehicle_no'];
                $new_fleet->vehicle_name = $this->request->data['vehicle_name'];
                $new_fleet->gps_no = $this->request->data['device_id'];
				$new_fleet->vendor_id = $this->request->data['vendor_id'];


                $fleetTable->save($new_fleet);

                if($new_fleet->isNew()){

                    $message = 'Fleet Could not be saved';
                    $status  = 400;

                }else{



                    $message = 'Fleet added Succesfully';
                    $status  = 200;

                }
            }

            if(isset($this->request->data['gps_device_id'])){




                    $this->redirect('/fleets/fleettracker');


            }

        }


        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;


        }
		
		
		$http = new Client();
		$vendorlist_response = $http->get(VENDOR_LIST);
		
		$this->set('vendorlist', $vendorlist_response->json);
		        
   //     $driversTable = TableRegistry::get('drivers');
    //    $routesTable = TableRegistry::get('routes');

        $fleet_details = $fleetTable->find("all")->select(['id', 'vehicle_type', 'vehicle_no','vehicle_name','gps_no', 'vendor_id'])->toArray();
        $this->set("fleet_details", $fleet_details);

     //   $route_details = $routesTable->find("all")->select(['id', 'name', 'number'])->toArray();
     //   $this->set("route_details", $route_details);

    //    $driver_details = $driversTable->find("all")->select(['id', 'name', 'license_number','license_expire'=>'date(license_expiry)'])->toArray();
    //    $this->set("driver_details", $driver_details);



        $this->set('status',$status);
        $this->set('message',$message);

    }

    public function drivers(){

        $driversTable = TableRegistry::get('drivers');


        if ($this->request->is('post')) {



            $new_driver = $driversTable->newEntity();

            $new_driver->name = $this->request->data['driver_name'];
            $new_driver->license_number = $this->request->data['license_number'];
            $new_driver->license_expiry = $this->request->data['license_expiry'];
			$new_driver->vendor_id = $this->request->data['vendor_id'];
			



            $driversTable->save($new_driver);

            if($new_driver->isNew()){

                $message = 'Driver Could not be saved';
                $status  = 400;

            }else{



                $message = 'Driver added Succesfully';
                $status  = 200;

            }
        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;


        }
		$http = new Client();
		$vendorlist_response = $http->get(VENDOR_LIST);
		
		$this->set('vendorlist', $vendorlist_response->json);
        


        $driver_details = $driversTable->find("all")->select(['id', 'name', 'license_number','license_expire'=>'date(license_expiry)', 'vendor_id'])->toArray();


        $this->set("driver_details", $driver_details);



        $this->set('status',$status);
        $this->set('message',$message);

    }

 public function routes(){

        $routesTable = TableRegistry::get('routes');


        if ($this->request->is('post')) {



            $new_route = $routesTable->newEntity();

            $new_route->name = $this->request->data['route_name'];
            $new_route->number = $this->request->data['route_number'];
            



            $routesTable->save($new_route);

            if($new_route->isNew()){

                $message = 'Route Could not be saved';
                $status  = 400;

            }else{



                $message = 'Route Added Succesfully';
                $status  = 200;

            }
        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;


        }
        


        $route_details = $routesTable->find("all")->select(['id', 'name', 'number'])->toArray();


        $this->set("route_details", $route_details);



        $this->set('status',$status);
        $this->set('message',$message);

    }


    public function passengers(){
        
        $passengerTable = TableRegistry::get('passengers');

        if ($this->request->is('post')) {

        $fleet_routeTable = TableRegistry::get('fleet_routes');

        $fleet_route_list = $fleet_routeTable->find("all")
                                        ->where(['fleet_routes.route_id' => $this->request->data['route_id'],
                                                'fleet_routes.session' => $this->request->data['session']])
                                         ->select(['fleet_route_id'=>'fleet_routes.id',
                                                   'route_name'=>'routes.name', 
                                                   'route_number'=>'routes.number',
                                                   'vehicle_name'=> 'fleets.vehicle_name',
                                                   'driver_name'=>'drivers.name',
                                                   'timings'=>'fleet_routes.session'])
                                            ->join([
                                                        'table' => 'routes',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'fleet_routes.route_id = routes.id'])
                                            ->join([
                                                        'table' => 'fleets',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'fleet_routes.fleet_id = fleets.id'])
                                            ->join([
                                                        'table' => 'drivers',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'fleet_routes.driver_id = drivers.id'])
                                            ->first();

            if(!empty($fleet_route_list)){

                $new_passenger = $passengerTable->newEntity();

                $new_passenger->student_id = $this->request->data['student_id'];
                $new_passenger->fleet_route_id = $fleet_route_list['fleet_route_id'];
                $new_passenger->drop_address = $this->request->data['drop_address'];



                $passengerTable->save($new_passenger);

                if($new_passenger->isNew()){

                    $message = 'Passenger Could not be saved';
                    $status  = 400;

                }else{



                    $message = 'Passenger added Succesfully';
                    $status  = 200;

                }


            }else{

                $message = 'No vehicle has been assigned on this route in the '.$this->request->data['session'];
                $status  = 400;                
            }     


        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;


        }



        $http = new Client();
        $classlist_response = $http->get(CLASS_LIST);
        $studentlist_response = $http->get(ALL_STUDENT_LIST);

        $routesTable = TableRegistry::get('routes');
        $route_details = $routesTable->find("all")->select(['id', 'name', 'number'])->toArray();
        $this->set("route_details", $route_details);

        $passenger_list = $passengerTable->find("all")
                                         ->select(['route_name'=>'routes.name', 
                                                   'route_number'=>'routes.number',
                                                   'student_name'=> "concat(students.first_name,' ',students.last_name)",
                                                   'roll_no'=>'class_students.roll_no',
                                                   'drop_point'=>'drop_address',
                                                   'drop_timing'=>'fleet_routes.session'])
                                            ->join([
                                                        'table' => 'fleet_routes',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'passengers.fleet_route_id = fleet_routes.id',

                                                                 ])
                                            ->join([
                                                        'table' => 'routes',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'fleet_routes.route_id = routes.id'])
                                            ->join([
                                                        'table' => 'students',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'students.id = passengers.student_id'])
                                            ->join([
                                                        'table' => 'class_students',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'students.id = class_students.student_id'])
                                            ->join([
                                                        'table' => 'classes',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'class_students.class_id = classes.id'])
                                            ->toArray();

        $this->set("passenger_list", $passenger_list);

        $this->set('message',$message);
        $this->set('status',$status);
        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
    }



    public function fleetroutemap(){
        
        $fleet_routeTable = TableRegistry::get('fleet_routes');

        if ($this->request->is('post')) {


        $fleet_route_list = $fleet_routeTable->find("all")
                                        ->where(['fleet_routes.driver_id' => $this->request->data['driver_id'],
                                                'fleet_routes.session' => $this->request->data['session']])
                                        ->orwhere(['fleet_routes.fleet_id' => $this->request->data['fleet_id'],
                                                   'fleet_routes.session' => $this->request->data['session']])
                                         ->select(['route_name'=>'routes.name', 
                                                   'route_number'=>'routes.number',
                                                   'vehicle_name'=> 'fleets.vehicle_name',
                                                   'driver_name'=>'drivers.name',
                                                   'timings'=>'fleet_routes.session'])
                                            ->join([
                                                        'table' => 'routes',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'fleet_routes.route_id = routes.id'])
                                            ->join([
                                                        'table' => 'fleets',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'fleet_routes.fleet_id = fleets.id'])
                                            ->join([
                                                        'table' => 'drivers',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'fleet_routes.driver_id = drivers.id'])
                                            ->first();            

            if(empty($fleet_route_list )){

                $fleet_route = $fleet_routeTable->newEntity();

                $fleet_route->fleet_id = $this->request->data['fleet_id'];
                $fleet_route->route_id = $this->request->data['route_id'];
                $fleet_route->driver_id = $this->request->data['driver_id'];
                $fleet_route->session = $this->request->data['session'];
				$fleet_route->user_id = $this->request->data['escort_id'];



                $fleet_routeTable->save($fleet_route);

                if($fleet_route->isNew()){

                    $message = 'RouteMap Could not be saved';
                    $status  = 400;

                }else{



                    $message = 'RouteMap added Succesfully';
                    $status  = 200;



                }                
            }
            else{

                $message = 'RouteMap Already Exist for this driver or fleet';
                $status  = 400;                
            }

        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;


        }

        $fleet_route_list = $fleet_routeTable->find("all")
             ->select(['route_name'=>'routes.name', 
                       'route_number'=>'routes.number',
                       'vehicle_name'=> 'fleets.vehicle_name',
					   'vehicle_no'=> 'fleets.vehicle_no',
                       'driver_name'=>'drivers.name',
                       'timings'=>'fleet_routes.session',
					   'escort_name'=>'users.name'])
                ->join([
                            'table' => 'routes',
                            'type' => 'LEFT',
                            'conditions' => 'fleet_routes.route_id = routes.id'])
                ->join([
                            'table' => 'fleets',
                            'type' => 'LEFT',
                            'conditions' => 'fleet_routes.fleet_id = fleets.id'])
                ->join([
                            'table' => 'drivers',
                            'type' => 'LEFT',
                            'conditions' => 'fleet_routes.driver_id = drivers.id'])
				->join([
							'table' => 'users',
							'type' => 'LEFT',
							'conditions' => 'fleet_routes.user_id = users.id'])
                ->toArray();


        $this->set("fleet_route_list", $fleet_route_list);

        $fleetTable = TableRegistry::get('fleets');
        $driversTable = TableRegistry::get('drivers');
        $routesTable = TableRegistry::get('routes');
		$staffsTable = TableRegistry::get('users');

        $fleet_details = $fleetTable->find("all")->select(['id', 'vehicle_type', 'vehicle_no','vehicle_name','gps_no'])->toArray();
        $this->set("fleet_details", $fleet_details);

        $route_details = $routesTable->find("all")->select(['id', 'name', 'number'])->toArray();
        $this->set("route_details", $route_details);

        $driver_details = $driversTable->find("all")->select(['id', 'name', 'license_number','license_expire'=>'date(license_expiry)'])->toArray();
        $this->set("driver_details", $driver_details);
		
		$escort_details = $staffsTable->find("all")
                                             ->where(['users.user_type_id'=>4])
                                             ->select(['escort_id'=>'users.id',
                                                       'escort_name'=> 'users.name',
                                                       'mobile'=>'users.mobile'
                                                      ])
                              
                                             ->join([
                                                        'table' => 'user_details',
                                                        'type' => 'LEFT',
                                                        'conditions' => 'users.id = user_details.user_id'])
                                            ->toArray();

		$this->set("escort_details",$escort_details);


        $this->set('message',$message);
        $this->set('status',$status);

    }


    public function reports(){
        


        // if ($this->request->is('post')) {

            // $passengerTable = TableRegistry::get('passengers');

            // if($this->request->data['report_type'] == 1){

            

                // $passenger_vehicle_list = $passengerTable->find("all")
                                             // ->select(['route_name'=>'routes.name', 
                                                       // 'route_number'=>'routes.number',
                                                       // 'student_name'=> "concat(students.first_name,' ',students.last_name)",
                                                       // 'roll_no'=>'class_students.roll_no',
                                                       // 'drop_point'=>'drop_address',
                                                       // 'drop_timing'=>'fleet_routes.session',
                                                       // 'name_vehicle'=>'fleets.vehicle_name'])
                                                // ->join([
                                                            // 'table' => 'fleet_routes',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'passengers.fleet_route_id = fleet_routes.id',

                                                                     // ])
                                                // ->join([
                                                            // 'table' => 'routes',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'fleet_routes.route_id = routes.id'])
                                                // ->join([
                                                            // 'table' => 'fleets',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'fleet_routes.fleet_id = fleets.id'])
                                                // ->join([
                                                            // 'table' => 'students',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'students.id = passengers.student_id'])
                                                // ->join([
                                                            // 'table' => 'class_students',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'students.id = class_students.student_id'])
                                                // ->join([
                                                            // 'table' => 'classes',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'class_students.class_id = classes.id'])
                                                // ->order(['name_vehicle' => 'DESC'])
                                                // ->toArray();  

                // $this->set('passenger_vehicle_list',$passenger_vehicle_list);        


            // }
            // elseif($this->request->data['report_type'] == 2){


                // $passenger_route_list = $passengerTable->find("all")
                                             // ->select(['route_name'=>'routes.name', 
                                                       // 'route_number'=>'routes.number',
                                                       // 'student_name'=> "concat(students.first_name,' ',students.last_name)",
                                                       // 'roll_no'=>'class_students.roll_no',
                                                       // 'drop_point'=>'drop_address',
                                                       // 'drop_timing'=>'fleet_routes.session',
                                                       // 'name_vehicle'=>'fleets.vehicle_name'])
                                                // ->join([
                                                            // 'table' => 'fleet_routes',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'passengers.fleet_route_id = fleet_routes.id',

                                                                     // ])
                                                // ->join([
                                                            // 'table' => 'routes',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'fleet_routes.route_id = routes.id'])
                                                // ->join([
                                                            // 'table' => 'fleets',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'fleet_routes.fleet_id = fleets.id'])
                                                // ->join([
                                                            // 'table' => 'students',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'students.id = passengers.student_id'])
                                                // ->join([
                                                            // 'table' => 'class_students',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'students.id = class_students.student_id'])
                                                // ->join([
                                                            // 'table' => 'classes',
                                                            // 'type' => 'LEFT',
                                                            // 'conditions' => 'class_students.class_id = classes.id'])
                                                // ->order(['route_name' => 'DESC'])
                                                // ->toArray(); 

                // $this->set('passenger_route_list',$passenger_route_list);        

                
            // }


        // }
//------------------------------------------------------------------------------------------------------------------------------------------------------
		$fleet_routesTable = TableRegistry::get('fleet_routes'); 
		
		$routes_list = $fleet_routesTable->find("all")
										->select([
												  'id' => 'fleet_routes.id',
												  'routes_id' => 'routes.id',
												  
												  'name' => "concat(routes.name, '|', fleet_routes.session)"])
										 ->join ([
													'table' => 'routes',
													'type' => 'LEFT',
													'conditions' => 'fleet_routes.route_id = routes.id' ])
										->toArray();
		$this->set("routes_list", $routes_list);
		
		if($this->request->is('post')) 
		{
			$passengersTable = TableRegistry::get('passengers');
			$fleet_routesTable = TableRegistry::get('fleet_routes');
			$route_id = $this->request->data['route_id'];
			
			$query = $fleet_routesTable->query();

 	 		$data = $query->find("all") ->where(['fleet_routes.id' => $route_id])
									    ->select(['vehicle_name' => 'fleets.vehicle_name',
												  'escort_name' => 'users.name',
												  'student_name' => "concat(students.first_name,' ',students.last_name)",
												  'classsection' => "concat(classes.class,'-',classes.section)"])
									    ->join ([
													'table' => 'passengers',
													'type' => 'LEFT',
													'conditions' => 'fleet_routes.id = passengers.fleet_route_id' ])
									    ->join([
													'table' => 'users',
													'type' => 'LEFT',
													'conditions' => 'fleet_routes.user_id = users.id'])
										->join ([
													'table' => 'students',
													'type' => 'LEFT',
													'conditions' => 'passengers.student_id = students.id'])
										->join ([ 
													'table' => 'fleets',
													'type' => 'LEFT',
													'conditions' => 'fleet_routes.fleet_id = fleets.id'])
										->join([
													'table' => 'class_students',
													'type' => 'LEFT',
													'conditions' => 'students.id = class_students.student_id'])
										->join([
													'table' => 'classes',
													'type' => 'LEFT',
													'conditions' => 'class_students.class_id = classes.id'])
										->toArray();
			
		}
	$this->set("data", $data);
		
		
///-----------------------------------------------------------------------------------------------------------------------------------------------------
        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;


        }

        $this->set('message',$message);
        $this->set('status',$status);

    }
	
	//vendor function 
	
	public function vendor() 
	{
		$vendorsTable = TableRegistry::get('fleet_vendors');
		
		if($this->request->is('post')) 
		{
			$bank_details_json['account_number']    =   $this->request->data['account_number'];
			$bank_details_json['bank_name']    =   $this->request->data['bank_name'];
			$bank_details_json['ifsc'] = $this->request->data['ifsc'];
			
			
				
			$vendors = $vendorsTable-> newEntity();
			
			$vendors->vendor_name = $this->request->data['vendor_name'];
			$vendors->contact_person = $this->request->data['contact_person'];
			$vendors->phone = $this->request->data['phone'];
			$vendors->email = $this->request->data['email'];
			$vendors->address = $this->request->data['address'];
			$vendors->pan = $this->request->data['pan'];
			$vendors->bank_details_json = json_encode($bank_details_json);
			
			if ($_FILES['photograph']['size'] > 0) {



				$today              = strtotime("now");


				
			    $name=$_FILES['photograph']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); 
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/vendors/photograph/".$today.".".$ext ;
			  
			    $tmp=$_FILES['photograph']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
				
			$vendors->photograph = $target_path;
			}
			if ($_FILES['ownership']['size'] > 0) {



				$today              = strtotime("now");


				
			    $name=$_FILES['ownership']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); 
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/vendors/ownership/".$today.".".$ext ;
			  
			    $tmp=$_FILES['ownership']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
				
			$vendors->ownership = $target_path;
			}
				
				if($vendorsTable->save($vendors))
				{
						
						$message = 'Vendor Created Successfully';



				}   else
					{

						$message = 'Unable to create vendor';
								
					}
		}   else
			{
					$message = 'Unable to create vendor';
			}
			
		
		$vendors_list = $vendorsTable->find("all")->toArray();
		
		$this->set("vendors_list", $vendors_list);
		
		
			
			    
		
	}
	
	public function editvendor($id = null) 
	{
		$array[0] = $id;
		
		$vendorsTable = TableRegistry::get('fleet_vendors');
		
		$vendors_list = $vendorsTable->find("all")->where(['id'=>$id])->toArray();
		$this->set("vendors_list", $vendors_list);
		
		$bank_details_json = json_decode($vendors_list[0]['bank_details_json'], true);
		$this->set("bank_details_json", $bank_details_json);
		
		if($this->request->is('post')) 
		{
			$bank_details_json['account_number']    =   $this->request->data['account_number'];
			$bank_details_json['bank_name']    =   $this->request->data['bank_name'];
			$bank_details_json['ifsc'] = $this->request->data['ifsc'];
			
			
				
			$vendors = $vendorsTable-> get($id);
			
			$vendors->vendor_name = $this->request->data['vendor_name'];
			$vendors->contact_person = $this->request->data['contact_person'];
			$vendors->phone = $this->request->data['phone'];
			$vendors->email = $this->request->data['email'];
			$vendors->address = $this->request->data['address'];
			$vendors->pan = $this->request->data['pan'];
			$vendors->bank_details_json = json_encode($bank_details_json);
			
			if ($_FILES['photograph']['size'] > 0) {



				$today              = strtotime("now");


				
			    $name=$_FILES['photograph']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); 
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/vendors/photograph/".$today.".".$ext ;
			  
			    $tmp=$_FILES['photograph']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
				
			$vendors->photograph = $target_path;
			}
			if ($_FILES['ownership']['size'] > 0) {



				$today              = strtotime("now");


				
			    $name=$_FILES['ownership']['name'];
			    $file=explode('.', $name);
			    $ext = end($file); 
			    $target_path = $today.".".$ext ;
			    $target_path1 = WWW_ROOT . "uploads/vendors/ownership/".$today.".".$ext ;
			  
			    $tmp=$_FILES['ownership']['tmp_name'];
			    move_uploaded_file($tmp, $target_path1);
				
			$vendors->ownership = $target_path;
			}
				
				if($vendorsTable->save($vendors))
				{
						
						$message = 'Vendor Updated Successfully';

						$this->redirect(array("action" => "vendor"));

				}   else
					{

						$message = 'Unable to update vendor';
								
					}
		}   else
			{
					$message = 'Unable to update vendor';
			}
		
	}

    public function fleettracker(){


    }
}