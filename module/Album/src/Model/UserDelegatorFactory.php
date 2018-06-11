<?php 

	namespace Album\Model; 
	
	use Interop\Container\ContainerInterface;
	use Zend\ServiceManager\Factory\DelegatorFactoryInterface;
	use Zend\EventManager\EventManager;  
	use Album\Model\UserServiceDelegator1;  
	
	class UserDelegatorFactory implements DelegatorFactoryInterface {
		
		
		public function __invoke (ContainerInterface $container, $requestedName, $callback, $options=null)  {
			
			$userService1=call_user_func ($callback);  
	      
			
			$eventManager=new EventManager();

			$eventManager->attach ('us1', function ($e){

				echo 'Params: '; 

				
			});  
			
			$usd1=new UserServiceDelegator1 ($eventManager,new $userService1);  
			
			return $usd1;  
			
			
		}
		
		
		
		
	}