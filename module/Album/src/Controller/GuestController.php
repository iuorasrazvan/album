<?php 

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Zend\EventManager\EventManager;

use Zend\EventManager\EventManagerAwareInterface;

use Zend\EventManager\EventManagerInterface;

use Zend\EventManager\SharedEventManager;

use Album\Model\Guest; 

use Album\Model\SubGuest; 

use Album\Model\ValidatorPluginManager; 

use Zend\ServiceManager\ServiceManager;  

use Zend\ServiceManager\Factory\InvokableFactory; 

use Zend\ServiceManager\Factory\LazyServiceFactory;   

use Album\Model\UserService1;

use Album\Model\UserService2; 

use Album\Model\UserService3; 

use Album\Model\UserService4;  

use Album\Model\UserService; 

use Interop\Container\ContainerInterface; 

use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;  

use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Zend\Http\Request;  

use Zend\Http\Response;  


class GuestController extends AbstractActionController 
 {
	private $sm;   
	
	public function __construct ($sm) {
		
		$this->sm=$sm;  
	}
	
	
	public function indexAction ()  {
		
		
		$guest=new Guest (); 
		
		$eventManager=$guest->getEventManager();
		
		$guest->attach ($eventManager); 
		
		$subGuest=new SubGuest ();
		
		$eventManager=$subGuest->getEventManager();
		
		$subGuest->attach($eventManager); 
		
	    $subGuest->doIt('criteria1', 'criteria2'); 
				
	
	
		
	    $response=Response::fromString (<<<bot
HTTP/1.1 200 ok HTTP/1.1
Content-type:application/x-www-form-urlencoded

username=miau		
		
		
		
		
		
bot
		
		);
		
		
		
	
		

		

		
		
     
		
		
		
			
	}
	
	
	
	
	
	
	
	
	
	
	
	
}