<?php 

namespace Login\Model\Auth;  

class AuthServiceFactory {
	
	
	
	public function __invoke ($container, $requestedName)  {
		
		 $auth=new $requestedName;
		 
		
		 
		 return $auth;  
		
	
	}
	
	
}