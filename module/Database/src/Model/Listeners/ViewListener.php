<?php 

namespace Database\Model\Listeners;  
use Zend\EventManager\EventManager;  

class ViewListener  {
	
	public function attach ($eventManager)  {
		
		$eventManager->attach('route', array ($this, 'Listener1'));   
		
		
		
	}
	
	
	public function Listener1 ($e)  {
		
		
		
		
	}
	
	
	
}