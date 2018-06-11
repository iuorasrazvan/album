<?php   

namespace Acl\Controller; 

use Zend\Mvc\Controller\AbstractActionController;  

use Acl\Model\Driver\DriverTable ;  

use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;

use Acl\Form\DriverForm ;  



class AclController extends AbstractActionController  {
	
	protected $driverTable;  
	
	public function __construct ($driverTable)   {
		
		$this->driverTable=$driverTable;  
		
	}
	
	
	public function indexAction  ()   {
		
		
	    $drivers= $this->driverTable->select ();  
		
		if ($drivers instanceof \Zend\Db\ResultSet\HydratingResultSet) {
			
		
			return ['drivers'=>$drivers];   
		}
		

		
	
	}
	
	public function editAction ()  {
		
		echo $id=$this->params()->fromRoute('id');  
		
		$fo
		
		
		
	}
	
	
	public function addAction ()  {
		
		
		
	}
	
	
	
	
}