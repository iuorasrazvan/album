<?php 

namespace Album\Model; 

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


use Album\Model\UserService2;  


class UserService3 {
	
	protected $us1;  
	protected $us2;  
	
	
	
	public function __construct ($us1, $us2, $arg=null)  {
		
		$this->us1=$us1;  
		$this->us2=$us2;
	}
	
	public function getUs1 ()  {
		
		return $this->us1;   
	}
	
	public function getUs2 () {
		
		return $this->us2;  
	}
	

	
	
	
}
		