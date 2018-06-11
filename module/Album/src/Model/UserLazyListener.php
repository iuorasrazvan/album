<?php 

	namespace Album\Model;
	
	
	use Zend\ServiceManager\ServiceManager;
	use Zend\ServiceManager\Factory\InvokableFactory;
	use stdClass;
	
	class UserLazyListener extends LazyListener  {
		
		public function __construct ()  {
			
			$serviceManager = new ServiceManager([
				'factories' => [
					stdClass::class => InvokableFactory::class,
				],
			]);
						
		}
		
		
		
		
		
	}