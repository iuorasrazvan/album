<?php 

	namespace Database\Model\View\Helper;  
	
	use Zend\View\Helper\AbstractHelper;


	class Lowercase extends AbstractHelper {
		
		public $count=0;  
	

		public function __invoke ($string) {
			
			$this->count++;  
				
			$output = sprintf("I have seen 'The Jerk' %d time(s).", $this->count);
			return htmlspecialchars($output, ENT_QUOTES, 'UTF-8'); 
			
			 
		}
		

	
		
	}