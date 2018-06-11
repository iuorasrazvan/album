<?php 

namespace Album\Model; 
use Interop\Container\ContainerInterface;  


class PluginService  extends \Zend\ServiceManager\AbstractPluginManager  { 

	public function validate ($instance) {
		
		if ($instance instanceof UserService1 || $instance instanceof UserService2)  {
			
			return ;  
		}
		
	}  
	

	
	
	
	
	
	
	
	

	
	
	
	
	
	
}
		