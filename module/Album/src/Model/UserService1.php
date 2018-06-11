<?php 

namespace Album\Model; 



class UserService1 {
	
	private $opt;  
	
	public function __construct ($opt=null)  {
		
		$this->opt=$opt; 
	}

	public function validate ($str) {
		
		if (strlen($str)>$this->opt['min'])  {
			
			echo 'The length is valid';
		}
		
		else echo 'The length is too small';  
	
		
		
	}
	
	
	public function us1 ()  {
		
		echo 'us1';  
	}
	
	
	
	

	
	
	
	
	
	
}
		