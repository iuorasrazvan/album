<?php 

namespace Album\Model;
use Zend\EventManager\EventManagerInterface;  

class BuzzerDelegator extends Buzzer   {
	
	private $buzz, $em;  
	
	public function __construct (Buzzer $buzz, EventManagerInterface $em)  {
		
		$this->buzz=$buzz;
		$this->em=$em;
		
	}
	
	public function buzz ()  {
		
		
		$this->em->trigger(__FUNCTION__, $this);
		
		return $this->buzz; 
	}
}