<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session\DatabaseSession;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;
use Cake\Routing\Router;

class CanteensController extends AppController
{
	public function index()
	{
		
		
		
		$canteensTable = TableRegistry::get('canteens');
		if($this->request->is('post'))
		{
			
			
			$month = $this->request->data['month'];
			$url = BASE_URL."canteens/uploadmenu/".$month;
			$this->redirect($url);

			
		}
	}
	public function uploadmenu($month)
	{
		$array[0] = $month;
		$Month = date('F', mktime(0, 0, 0, $month, 10));
		
		$year = date('Y');
		$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$this->set("number", $number);
		$this->set("Month", $Month);
		$canteensTable = TableRegistry::get('canteens');
		if($this->request->is('post'))
		{

			$tareekh = $this->request->data['date'];
			$breakfast = $this->request->data['breakfast'];
			$lunch = $this->request->data['lunch'];
			$week = $this->request->data['week'];
			
			
			foreach ($tareekh as $key => $value)
			{
				$date = $year.'/'.$month.'/'. $this->request->data['date'][$key];
				
				$newmenu = $canteensTable->newEntity();
				
				$newmenu->breakfast = $breakfast[$key];
				$newmenu->lunch =	$lunch[$key];
				$newmenu->week_number = $week[$key];
				$newmenu->date= $date;
				$check = $newmenu->breakfast;
				if (!empty ($check)) 
				{
					if($canteensTable->save($newmenu))
					{
						
						$returnArray = array(
							"status"	=> "200",
							"message"	=> "Menu uploaded successfully",
							"details"	=> array()
							);



					}
					else
					{

						$returnArray = array(
							"status"	=> "400",
							"message"	=> "Unable to upload menu",
							"details"	=> array()	
							);
					}
						$this->set('message', $returnArray);
				
				}
				
			}
			
		}
	}
	
	
	// public function index()
	// {
        // $canteensTable = TableRegistry::get('canteens');
		
		// if($this->request->is('post'))
		// {
			// $newmenu = $canteensTable->newEntity();
			
			// $newmenu->date_from = date('Y-m-d',strtotime($this->request->data['from']));
			// $newmenu->date_until = date('Y-m-d',strtotime($this->request->data['until']));
			
			// if ($_FILES['photograph']['size'] > 0) {



				// $today              = strtotime("now");


				
			    // $name=$_FILES['photograph']['name'];
			    // $file=explode('.', $name);
			    // $ext = end($file); 
			    // $target_path = $today.".".$ext ;
			    // $target_path1 = WWW_ROOT . "uploads/canteens/menu/".$today.".".$ext ;
			  
			    // $tmp=$_FILES['photograph']['tmp_name'];
			    // move_uploaded_file($tmp, $target_path1);
				
			// $newmenu->photograph = $target_path;
			// }
							
			// if($canteensTable->save($newmenu))
				// {
						
						// $returnArray = array(
							// "status"	=> "200",
							// "message"	=> "Menu uploaded successfully",
							// "details"	=> array()
							// );



				// }   else
					// {

						// $returnArray = array(
							// "status"	=> "400",
							// "message"	=> "Unable to upload menu",
							// "details"	=> array()	
							// );
					// }
					// $this->set('message', $returnArray);
		// }  
	
			
			
	
    // }

    public function menulist()
	{
		if($this->request->is('post'))
		{
			$canteensTable = TableRegistry::get('canteens');
	//	$month = date('m');	 (for using current month, unquote this)
		$month = $this->request->data['month']; 
		$menu_list = $canteensTable->find("all")
								   ->where(['month(date)' => $month])
								  // ->orWhere (['month(date_until)' => $month])
								   ->select(['date','breakfast','lunch','id', 'week_number'])
								   ->toArray();
		$this->set("menu_list",$menu_list);
		}

    }

    public function editmenu($id = null){
		$array[0] = $id;
		
		$canteensTable = TableRegistry::get('canteens');
		$menulist = $canteensTable->find("all")
									->where(['id' => $id])
									->select(['date','breakfast','lunch', 'week_number'])
									->first();
		$this->set("menulist", $menulist);
		
		if($this->request->is('post')){
			
			$editmenu = $canteensTable->get($id); //defining the id for the row to be updated
			
			$editmenu->breakfast = $this->request->data['breakfast'];
			$editmenu->lunch = $this->request->data['lunch'];
			$editmenu->week_number = $this->request->data['week_number'];
			
			if($canteensTable->save($editmenu)) { 
				
				$this->redirect(array("action" => "menulist"));
			}
		}
    }
}