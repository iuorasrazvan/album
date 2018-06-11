<?php 

namespace Album\Model;  
use Zend\ServiceManager\Factory\DelegatorFactoryInterface; 

class BuzzerDelegatorFactory implements DelegatorFactoryInterface  {
	
	public function __invoke ($container, $requestedName, $callback, array $options=null)  {
		
		$realBuzzer=call_user_func($callback);  
		
		$em=new \Zend\EventManager\EventManager ();
		
		$em->attach ('buzz', function () { echo 'hello mr, pls smille'; });  
		
		return new BuzzerDelegator ($realBuzzer, $em);  
		
	}
		
		
		
}