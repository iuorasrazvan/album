<?php 

	namespace Album\Model;
	
	use Album\Model\Handler; 
	
	class Logger {
		
		protected $handler;
		
		public function __construct ( Handler $handler)   {
			
			$this->handler=$handler;  
			
			
		}
		
		
	}