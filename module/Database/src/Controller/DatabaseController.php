<?php 

namespace Database\Controller;  

use Zend\Mvc\Controller\AbstractActionController;  
use Zend\Db\Adapter\Adapter;  
use Zend\Db\ResultSet\AbstractResultSet; 
use Zend\Db\Adapter\Driver\ResultInterface;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\Reflection as ReflectionHydrator;

use Zend\Db\Sql\Sql;   

use Zend\Db\Sql\Update; 
use Zend\Db\ResultSet\ResultSet; 

use Zend\Db\Sql\TableIdentifier; 
use Zend\Db\Sql\Where; 

Use Zend\Db\Sql\Predicate\Predicate; 


use Database\Model\Shoe;  

use Zend\Db\Sql\Ddl;  

use Zend\Db\TableGateway\TableGateway;  

use Zend\Db\RowGateway\RowGateway; 

use Database\Model\Table\TrucksTable;  

use Zend\Db\TableGateway\Feature\MetadataFeature;  

use Zend\Db\TableGateway\Feature\RowGatewayFeature; 

use Zend\Session\Config\StandardConfig;   

use Zend\Session\SessionManager;  
use Zend\Session\Container ; 

use Database\Model\Writer;

use Database\Model\BlogPost;  

use Zend\Permissions\Rbac\Role;  

use Zend\Permissions\Rbac\Rbac;   

use Database\Model\Article;  

use Database\Model\User;  

class DatabaseController extends AbstractActionController    {
	
	
	
	
	public function route1Action ()  {
		
		 echo 'route action1';  
		
			
	}
	
	
	public function route2Action ()  {
		
		$serviceManager= $this->getEvent ()->getApplication()->getServiceManager ();  
		
		$session = $serviceManager->get(SessionManager::class);  
	    $session->destroy();  ; 

		print_r($_SESSION['cucu']);  
		
		
	 
	  
		
	}
	
	
	public function route3Action ()  {
		
		$container =new Container ('nss');  
		
		echo $container->foo; 
	}
	
	
}



