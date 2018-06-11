<?php 

	namespace Login\Form\Login;
	use Zend\InputFilter\InputFilter;  
	
	class UsernameFilter extends InputFilter  {
		
		public function __construct ()  {
			

			
			$this->add ([ 
			
			
				'username', 
				
				'filters'=>[
					[
						'name'=>'stringtolower',
					
					
					]
				
				
				], 
				'validators'=>[
					[
						'name'=>'stringlength', 
						'options'=>[
							'min'=>5, 
						]
					],
					
			
				]	
			
			
			]);  
		}
	
		
		
	}