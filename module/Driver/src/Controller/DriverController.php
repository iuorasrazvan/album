<?php   

namespace Driver\Controller; 

use Zend\Mvc\Controller\AbstractActionController;  

use Driver\Model\Driver\DriverTable ;  

use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;

use Driver\Form\DriverForm ;  

use Driver\Form\AddForm;  

use Driver\Model\Driver\Driver;  




class DriverController extends AbstractActionController  {
	
	protected $driverTable;  
	
	public function __construct ($driverTable)   {
		
		$this->driverTable=$driverTable;  
		
	}
	
	
	public function indexAction  ()   {
		
		
	    $drivers= $this->driverTable->selectDrivers ();  
		
		if ($drivers instanceof \Zend\Db\ResultSet\HydratingResultSet) {
			
			return ['drivers'=>$drivers];   
		}
		

		
	
	}
	
	public function editAction ()  {
		
		
	    
		$id=$this->params()->fromRoute('id');  
		try {
			$resultSet=$this->driverTable->getDriver($id);
		}
		
		catch (\Exception $e) {
			echo $e->getMessages();  
			
			
			
		}
		
		$driverForm=(new AddForm())->getDriverForm();  
		
	    $driver=$resultSet->current ();
		
		$driverForm->bind($driver);  
		
		$request=$this->getRequest ();  
		
		if (!$request->isPost())  {
			
			
			return ['driverForm'=>$driverForm,'driverObj'=>$driver];  
		}
		
		$data=$request->getPost();
		
		$driverForm->setData($data);  
		
		if (!$driverForm->isValid($data))   {
			
		
			return ['driverForm'=>$driverForm, 'driverObj'=>$driver];   
		}
		
	
		
		$this->driverTable->saveDriver($driver);  
		
		$this->redirect()->toRoute ('driver',['action'=>'index']);  

			
	}
	
	
	public function addAction ()  {
		
			
		$addDriverForm=(new AddForm())->getDriverForm(); 
		
		$driver=new Driver () ;  
		
		$addDriverForm->bind($driver);  
		
		$request=$this->getRequest ();  
		
		if (! $request->isPost())  {
			
			return ['addDriverForm'=>$addDriverForm ];  
			
		}
		
		
		$data=$request->getPost();  
		
		$addDriverForm->setData($data); 
			
		if (!$addDriverForm->isValid ($data))  {
			
			
		 	return ['addDriverForm'=>$addDriverForm ]; 	
			
			 
		}
		
		$this->driverTable->saveDriver ($driver);
		
		
	    $this->redirect()->toRoute('driver', ['action'=>'index']); 
		
		
	}
	
	public function deleteAction () {
		
		$id=$this->params()->fromRoute('id');  
		$driver=$this->driverTable->getDriver($id)->current();
		
		$request=$this->getRequest ();
		if (!$request->isPost())  {
			return array ('driver'=>$driver);  
			
		}
		
		$data=$request->getPost();  
		if ($data['choose']=='no')  {
			
			$this->redirect()->toRoute('driver',['action'=>'index']);  
		}
		
		else {
			
			$this->driverTable->deleteDriver($id); 
			$this->redirect()->toRoute('driver',['action'=>'index']);  
			
			
		}
		
		
	}
	
	
	
	
}