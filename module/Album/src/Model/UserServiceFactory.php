<?php 

namespace Album\Model; 

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Album\Model\UserService1;  
 
use Album\Model\UserService2;  
use Album\Model\UserService3; 


class UserServiceFactory implements FactoryInterface {
	
	
	public function __invoke (ContainerInterface $container, $requestedName, $options=null)   {
		
	
		
		return new $requestedName (); 
		
		
	}
	
	
	
	
	
	
	
}
		