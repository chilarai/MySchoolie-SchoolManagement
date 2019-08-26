<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Network\Session\DatabaseSession;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\Log\Log;
use Cake\Routing\Router;
use Cake\Network\Http\Client;

class LibrariesController extends AppController
{

	public function index(){

		$booksTable = TableRegistry::get('books');

		$books = $booksTable->find("all")
							->select(['id', 
									   'genre'=>'book_categories.name',
									   'book_name'=>'books.name', 
									   'description',
									   'author',
									   'available_quantity',
									   'quantity',
									   'added_on'=>'DATE(books.created_date)'])
				 	 		->join([
							        'table' => 'book_categories',
							        'type' => 'LEFT',
							        'conditions' => 'book_categories.id = books.category_id'])
							->toArray();


        $this->set("books", $books);
        
    }






    public function addcategory(){

		$bookcategoryTable = TableRegistry::get('book_categories');

		$book_categories = $bookcategoryTable->find("all")->select(['id', 'name', 'code'])->toArray();


        $this->set("book_categories", $book_categories);



       	if ($this->request->is('post')) {

			$addcat = $bookcategoryTable->newEntity();

			$addcat->name = $this->request->data['category_name'];
			$addcat->code = $this->request->data['category_code'];
			$addcat->description = $this->request->data['description'];

			$check_categories = $bookcategoryTable->find("all")->where(['name'=>$addcat->name])->select(['id', 'name', 'code'])->toArray();

			if(empty($check_categories))
				$bookcategoryTable->save($addcat);

			if($addcat->isNew()){

				$message = 'Book Category Already Exists';
                $status  = 400;

			}else{



				$message = 'Category Inserted Succesfully';
				$status  = 200;

			}
 		}

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }


        $this->set('status',$status);
        $this->set('message',$message);

    }

    public function addbook(){


		$bookcategoryTable = TableRegistry::get('book_categories');

		$book_categories = $bookcategoryTable->find("all")->select(['id', 'name', 'code'])->toArray();


        $this->set("book_categories", $book_categories);

		if ($this->request->is('post')) {

			$booksTable = TableRegistry::get('books');

			$addbook = $booksTable->newEntity();

			$addbook->name = $this->request->data['name'];
			$addbook->category_id = $this->request->data['category_id'];
			$addbook->quantity = $this->request->data['quantity'];
			$addbook->available_quantity = $this->request->data['quantity'];
			$addbook->author = $this->request->data['author'];
			$addbook->price = $this->request->data['price'];
			// $addbook->publish_date = date("Y-m-d",strtotime($this->request->data['publish_date']));
			$addbook->isbn_code = $this->request->data['isbn_code'];
			$addbook->book_code = $this->request->data['book_code'];
			$addbook->publication = $this->request->data['publication'];
			$addbook->description = $this->request->data['description'];

			$booksTable->save($addbook);

			if($addbook->isNew()){

				$message = 'Book Could not be saved';
                $status  = 400;

			}else{



				$message = 'Book added Succesfully';
				$status  = 200;

			}
        }

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
		}
            
        $this->set('status',$status);
        $this->set('message',$message);	
    }
//public function addbook ends and editbook begins

	public function editbook($id = null) {
		
		$array[0]= $id;
		$bookcategoryTable = TableRegistry::get('book_categories');

		$book_categories = $bookcategoryTable->find("all")->select(['id', 'name', 'code'])->toArray();


        $this->set("book_categories", $book_categories);
		
	 
		$booksTable = TableRegistry::get('books');
		$books = $booksTable->find("all")
							->where(['id'=>$id])
							->select(['id', 
									   'name',
									   'category_id',
									   'description',
									   'author',
									   'price',
									   'publish_date',
									   'isbn_code',
									   'book_code',
									   'quantity',
									   'available_quantity',
									   'publication'])
							->first();
													
		$this->set("books", $books);
			
		if($this->request->is('post')){
			
			$booksedit = $booksTable->get($id); 
			
			$booksedit->name = $this->request->data['name'];
			$booksedit->category_id = $this->request->data['category_id'];
			$booksedit->available_quantity = ($this->request->data['quantity'] - $books['quantity'] + $books['available_quantity']);
			$booksedit->quantity = $this->request->data['quantity'];
			$booksedit->author = $this->request->data['author'];
			$booksedit->price = $this->request->data['price'];
			// $booksedit->publish_date = date("Y-m-d",strtotime($this->request->data['publish_date']));
			$booksedit->isbn_code = $this->request->data['isbn_code'];
			$booksedit->book_code = $this->request->data['book_code'];
			$booksedit->publication = $this->request->data['publication'];
			$booksedit->description = $this->request->data['description'];
				
				if($booksedit->available_quantity < 0) {
				  $message= 'error';
				  $status= 400;
				}
				
				elseif($booksTable->save($booksedit)) { 
				
					$this->redirect(array("action" => "index"));
					$message = 'Book Edited Succesfully';
					$status  = 200;
				}
	
		}
	}
	
	//edit function ends here and edit category begins
	public function editcategory($id = null) {
		$array[0]= $id;

		$bookcategoryTable = TableRegistry::get('book_categories');

		$book_categories = $bookcategoryTable->find("all")->where(['id'=>$id])->select(['id', 'name', 'code','description'])->first();

        $this->set("book_categories", $book_categories);
			if ($this->request->is('post')) {

				$editcat = $bookcategoryTable->get($id);

				$editcat->name = $this->request->data['category_name'];
				$editcat->code = $this->request->data['category_code'];
				$editcat->description = $this->request->data['description'];
				
					if($bookcategoryTable->save($editcat)) { 
					
						$this->redirect(array("action" => "index"));
						
					}
			}
	}	
	
	//ends here
    public function issue($book_id){

    	$booksTable = TableRegistry::get('books');

    	$book_quantity_available = $booksTable->find("all")
    										  ->where(['id'=>$book_id])
    										  ->select(['name',
    										  			'quantity',
    										  			'author',
    										  			'description',
    										  			'available_quantity',
    										  			'publish_date',
    										  			'isbn_code'])
    										  ->first(); 

    	

		if ($this->request->is('post')) {			

			if($book_quantity_available['available_quantity'] > 0){

				$issuanceTable = TableRegistry::get('issuances');

				$issue=$issuanceTable->newEntity();

				$issue->book_id=$book_id;
				$issue->borrower_id=$this->request->data['student_id'];
				$issue->borrower_type='student';
				$issue->issued_till_date=strtotime ($this->request->data['issued_till']);
				$issue->issue_date=strtotime ($this->request->data['issue_date']);
				$issue->remarks=$this->request->data['remarks'];


				$issuanceTable->save($issue);

				if($issue->isNew()){

					$message = 'Book Could not be Issued';
	                $status  = 400;

				}else{

					//Updating Available Quantity 

					$available_quantity = ($book_quantity_available['available_quantity'] - 1);

					$booksTable->updateAll(
                      array(
                        'books.available_quantity' => $available_quantity
                      ), 
                      array('books.id' => $book_id));					




					$message = 'Book Issued Succesfully';
					$status  = 200;

				}



			}else{

					$message = 'Book Is Not Available Now. Check back in later';
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

		$this->set('status',$status);
		$this->set('message',$message);
		$this->set('book_detail', $book_quantity_available);
        $this->set('classlist', $classlist_response->json);
        $this->set('studentlist', $studentlist_response->json);
        
    }


public function issuedbook(){

    	$issuancesTable = TableRegistry::get('issuances');

    	$books_issued = $issuancesTable->find("all")
    										  ->where(['issuances.is_active'=>1])
    										  ->select(['issuance_id'=>'issuances.id',
    										  			'issued_till'=>'date(issued_till_date)',
    										  			'issued_from'=>'date(issue_date)',
    										  			'book_name'=>'books.name',
    										  			'author'=>'books.author',
    										  			'isbn_code'=>'books.isbn_code',
    										  			'student_name'=> "concat(students.first_name,' ',students.last_name)",
											 		   	'class'=>"concat(classes.class,' ',classes.section)",
											 		   	'rollno'=>'class_students.roll_no'	])
								 	 		->join([
											        'table' => 'books',
											        'type' => 'LEFT',
											        'conditions' => 'books.id = issuances.book_id'])
								 	 		->join([
											        'table' => 'students',
											        'type' => 'LEFT',
											        'conditions' => 'issuances.borrower_id = students.id'])
											 ->join([
												        'table' => 'class_students',
												        'type' => 'LEFT',
												        'conditions' => 'students.id = class_students.student_id'])
											 ->join([
												        'table' => 'classes',
												        'type' => 'LEFT',
												        'conditions' => 'class_students.class_id = classes.id'])
							 	 			->toArray();


    	

		// if ($this->request->is('post')) {			

		// 	if($book_quantity_available['available_quantity'] > 0){

		// 		$issuanceTable = TableRegistry::get('issuances');

		// 		$issue=$issuanceTable->newEntity();

		// 		$issue->book_id=$book_id;
		// 		$issue->borrower_id=$this->request->data['student_id'];
		// 		$issue->borrower_type='student';
		// 		$issue->issued_till_date=$this->request->data['issued_till'];
		// 		$issue->issue_date=$this->request->data['issue_date'];
		// 		$issue->remarks=$this->request->data['remarks'];


		// 		$issuanceTable->save($issue);

		// 		if($issue->isNew()){

		// 			$message = 'Book Could not be Issued';
	 //                $status  = 400;

		// 		}else{

		// 			//Updating Available Quantity 

		// 			$available_quantity = ($book_quantity_available['available_quantity'] - 1);

		// 			$booksTable->updateAll(
  //                     array(
  //                       'books.available_quantity' => $available_quantity
  //                     ), 
  //                     array('books.id' => $book_id));					




		// 			$message = 'Book Issue Succesfully';
		// 			$status  = 200;

		// 		}



		// 	}else{

		// 			$message = 'Book Is Not Available Now. Check back in later';
	 //                $status  = 400;
		// 	}


		// }
 		

  //       if(empty($message)){
  //           $message = 'Please Enter All the Data';
  //           $status  = 401;
  //       }

		// $http = new Client();
		// $classlist_response = $http->get(CLASS_LIST);
		// $studentlist_response = $http->get(ALL_STUDENT_LIST);

		// $this->set('status',$status);
		// $this->set('message',$message);
		 $this->set('books_issued', $books_issued);
  //       $this->set('classlist', $classlist_response->json);
  //       $this->set('studentlist', $studentlist_response->json);
        
    }


    public function returnbook($issuance_id){

    	$issuancesTable = TableRegistry::get('issuances');

    	$book_issued = $issuancesTable->find("all")
    										  ->where(['issuances.is_active'=>1,'issuances.id'=>$issuance_id])
    										  ->select(['issuance_id'=>'issuances.id',
    										  			'issued_till'=>'date(issued_till_date)',
    										  			'issued_from'=>'date(issue_date)',
    										  			'book_name'=>'books.name',
    										  			'book_id'=>'books.id',
    										  			'book_quantity_available'=>'books.available_quantity',
														'book_quantity'=>'books.quantity',
    										  			'author'=>'books.author',
    										  			'isbn_code'=>'books.isbn_code',
    										  			'student_name'=> "concat(students.first_name,' ',students.last_name)",
											 		   	'class'=>"concat(classes.class,' ',classes.section)",
											 		   	'rollno'=>'class_students.roll_no'	])
								 	 		->join([
											        'table' => 'books',
											        'type' => 'LEFT',
											        'conditions' => 'books.id = issuances.book_id'])
								 	 		->join([
											        'table' => 'students',
											        'type' => 'LEFT',
											        'conditions' => 'issuances.borrower_id = students.id'])
											 ->join([
												        'table' => 'class_students',
												        'type' => 'LEFT',
												        'conditions' => 'students.id = class_students.student_id'])
											 ->join([
												        'table' => 'classes',
												        'type' => 'LEFT',
												        'conditions' => 'class_students.class_id = classes.id'])
							 	 			->first();


    	

		if ($this->request->is('post')) {			

			if(!empty($book_issued)){

				//Deactivating Record 
				$book_issued->is_active=0;

				if(!empty($this->request->data['fee_amount']))
					$fee_amount=$this->request->data['fee_amount'];
				else
					$fee_amount=0;

				if(!empty($this->request->data['fee_type']))
					$fee_type=$this->request->data['fee_type'];
				    
				else
					$fee_type='none';

				if(!empty($this->request->data['return_date']))
					$return_date=strtotime ($this->request->data['return_date']);

				if(!empty($this->request->data['remarks']))
					$remarks=$this->request->data['remarks'];
				else
					$remarks='';

				
				$issuancesTable->updateAll(
                      array(
                        'issuances.is_active' => 0,
                        'issuances.fee_type' => $fee_type,
                        'issuances.fee_amount'	=> $fee_amount,
                        'issuances.return_date' => $return_date,
                        'remarks' => $remarks

                      ), 
                      array('issuances.id' => $issuance_id));



				

			    
				if ($fee_type == 'lost') {
				$booksTable = TableRegistry::get('books');


				$new_quantity = ($book_issued->book_quantity - 1);


				$booksTable->updateAll(
                      array(
                        'books.quantity' => $new_quantity
                      ), 
                      array('books.id' => $book_issued->book_id));
					  
					  $message = 'Book Lost, Record Updated Succesfully';
					  $status  = 200;
				}
				
				else {
					 $booksTable = TableRegistry::get('books');


				$available_quantity = ($book_issued->book_quantity_available + 1);


				$booksTable->updateAll(
                      array(
                        'books.available_quantity' => $available_quantity
                      ), 
                      array('books.id' => $book_issued->book_id));
					  
					  $message = 'Book Returned Succesfully';
					  $status  = 200;
				}



	




					

				



			}else{

					$message = 'No such record found';
	                $status  = 400;
			}


		}
 		

        if(empty($message)){
            $message = 'Please Enter All the Data';
            $status  = 401;
        }


		$this->set('status',$status);
		$this->set('message',$message);
		$this->set('book_issued', $book_issued);
        
    }


    public function reports(){

    	if ($this->request->is('post')) {

	    	$issuancesTable = TableRegistry::get('issuances');

	    	if($this->request->data['month'] == 12)
	    		$condition = 'issuances.issue_date between date_sub(now(),INTERVAL 1 YEAR) and now()';

	    	elseif($this->request->data['month'] == 6)
	    		$condition = 'issuances.issue_date between date_sub(now(),INTERVAL 6 MONTH) and now()';

	    	elseif($this->request->data['month'] == 3)
	    		$condition = 'issuances.issue_date between date_sub(now(),INTERVAL 3 MONTH) and now()';

	    	else
	    		$condition = 'issuances.issue_date between date_sub(now(),INTERVAL 1 MONTH) and now()';



	    	$books_issued = $issuancesTable->find("all")
	    										  ->where([$condition])
	    										  ->select(['issuance_id'=>'issuances.id',
	    										  			'issued_till'=>'date(issued_till_date)',
	    										  			'issued_from'=>'date(issue_date)',
	    										  			'book_name'=>'books.name',
	    										  			'author'=>'books.author',
	    										  			'isbn_code'=>'books.isbn_code',
	    										  			'student_name'=> "concat(students.first_name,' ',students.last_name)",
												 		   	'class'=>"concat(classes.class,' ',classes.section)",
												 		   	'rollno'=>'class_students.roll_no'	])
									 	 		->join([
												        'table' => 'books',
												        'type' => 'LEFT',
												        'conditions' => 'books.id = issuances.book_id'])
									 	 		->join([
												        'table' => 'students',
												        'type' => 'LEFT',
												        'conditions' => 'issuances.borrower_id = students.id'])
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



		 $this->set('books_issued', $books_issued);

        
    }
}