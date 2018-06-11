<?php 


	namespace  Album\Model; 
	
	use Interop\Container\ContainerInterface;
	
	use Zend\ServiceManager\FactoryInterface; 
	
	use Zend\ServiceManager\ServiceLocatorInterface; 

	
	use Album\Model\StringLenghtValidator; 
	
	class UserFactory implements FactoryInterface {
		
		
				
		public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
			{
				if ($requestedName=='Album\Model\UserService2')  {
					
					$dep=$container->get('Album\Model\UserService1');
				
				    echo $options;
					return new $requestedName($dep,$options);
				
				}
				
				elseif ($requestedName=='Album\Model\UserService1') {
					
				
					return new $requestedName ($options); 
					
				}
			}
			
			
		public function createService (ServiceLocatorInterface $locator)  {}
					
					
	}
				
				
			
				
				
				
		