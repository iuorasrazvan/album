<?php 

	namespace Login\Model\Auth;
	
	use Zend\Db\Adapter\AdapterInterface;  
	
	use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter; 
	
	
	
	
	class AuthServiceFactory  {
		
		public function __invoke  ( $container, $requestedName )  {
			
			$callback = function ($hash, $password)  {
                return password_verify($password, $hash);  
            }; 
			
			
            $dbAdapter=$container->get(AdapterInterface::class);  
            $dbAuthAdapter =  new CallbackCheckAdapter  (
              $dbAdapter, 
                'users', 
              'username',
              'password',
               $callback
            );
		

		
		
		
			
			
            return new $requestedName (null, $dbAuthAdapter);
			
			
		}
		
		
		
	}