<?php 

	namespace Album\Model;  
	class Service2   {
		
		public function __invoke ($container, $requestedName)  {
			
			return new $requestedName($container);  
			
		}
		
		
		public function __construct ()  {
			
			
			return  __CLASS__ ;  
		}
		
		
		static function static_func2 ()  {
			
			return 'tralala';  
		}
		
	}