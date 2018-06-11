<?php 

	namespace Album\Model;  
	use Zend\ServiceManager\Factory\FactoryInterface;  
	
	class Service1 implements FactoryInterface  {
		
		public function __invoke ($container, $requestedName, array $options=null )  {
			 
			
			return new $requestedName; ;  
			
		}
		
		
		public function __construct ()  {
			
			
			return  __CLASS__ ;  
		}
		
		
		public function echo_s1  () {
			
			echo __FUNCTION__ ;  
		}
		
	}