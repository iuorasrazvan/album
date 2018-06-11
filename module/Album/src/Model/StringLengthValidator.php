<?php 

	namespace Album\Model;  

	class StringLengthValidator {
		protected $str; 
		
		public function __construct ($str) {
			
			
			$this->str=$str; 
		}
		
		public function validateString ()  {
			
			if (strlen ($this->str[0])<=10) return 'Valid';
			
			else return 'invalid'; 
			
		}
		
	}