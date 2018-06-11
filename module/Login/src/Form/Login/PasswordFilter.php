<?php  

	namespace Login\Form\Login;
	use Zend\InputFilter\InputFilter;  
	
	class  PasswordFilter extends InputFilter  {
		
		
		public function __construct ()  {
			
		
			
			$this->add ([
				'password',
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