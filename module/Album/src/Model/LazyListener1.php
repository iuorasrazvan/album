<?php
	namespace Album\Model; 
	
	use Zend\ServiceManager\Factory\FactoryInterface;
	
	class LazyListener1   {
		
		public function __invoke ($container,$requestedName)  {
			
			
			return new $requestedName; 
		}
		
	
		
		public function onLazyListener1  ($e)  {
			
			echo 'calling on LazyListener'; 
			print_r($e->getParams () ); 
			
		}
		
		
	}