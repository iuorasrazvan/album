<?php 

	namespace Album\Model; 
	
	use Zend\ServiceManager\AbstractPluginManager; 
	
	use Zend\ServiceManager\Exception\InvalidServiceException; 
	
	use ValidatorInterface;  
	

	class ValidatorPluginManager extends AbstractPluginManager {
		
		public function __invoke ($container, $requestedName)  {
			
			return new $requestedName($container); 
		}
		
		public function validate($instance)
		{
			if ($instance instanceof Fii || $instance instanceof Bar) {
				return;
			}

			throw new InvalidServiceException('This is not a valid service!');
		}

				
		
		
	}