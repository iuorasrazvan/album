<?php

	namespace Album\Model; 
	
	class UserServiceDelegator1  {
		protected $eventManager;
		protected $userService1;
		protected $options;
		
		public function __construct ($eventManager, $userService1)  {
			
			$this->eventManager=$eventManager;
			$this->userService1=$userService1;
		
		}
		
		
		public function us1 () {
			
			$this->eventManager->trigger(__FUNCTION__, $this);
			
			return $this->userService1->us1();
		}
		
		
	}