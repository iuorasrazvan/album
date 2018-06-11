<?php 

	namespace Album\Model;
	
	use Zend\ServiceManager\Factory\AbstractFactoryInterface; 
	
	use Interop\Container\ContainerInterface;
	
	use Album\Model\UserService1; 
	
	
	class UserAbstractFactory implements AbstractFactoryInterface
	
	{
		public function canCreate(ContainerInterface $container, $requestedName)
		{
			return in_array ($requestedName, array ('Azi','Album\Model\UserService4'));  
		}

		public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
		
		
		{
			
			
			
			return  new $requestedName();
		}
	}
