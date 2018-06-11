<?php 

namespace Album\Model; 



class UserService {
	

	
	
	public function __invoke  ($container, $requestedName ) {
		
			return new $requestedName;  
	
	
		
		
	}
	
	
	
	

	
	
	
	
	
	
}
		