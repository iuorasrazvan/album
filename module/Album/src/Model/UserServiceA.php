<?php 

namespace Album\Model; 

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;



class UserServiceA  {
	

	protected $config;  
	
	public function __construct (array $config) {
		$this->config=$config;  
		
	}
	
	public function getConfig () {
		return $this->config; 
		
	}
	
	
	
	
}
		