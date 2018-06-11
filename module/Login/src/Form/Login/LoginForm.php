<?php 

namespace Login\Form\Login; 

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Form\Fieldset;

use Zend\InputFilter\Input; 
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface; 
use Zend\InputFilter\InputFilterAwareInterface;  


use Zend\Form\Factory as FormFactory;

use Zend\InputFilter\Factory as FilterFactory;  

use Zend\Hydrator\ArraySerializable;

use Zend\Validator\StringLength; 

use Zend\Captcha;  

use Login\Model\User;  




class LoginForm     {
	
	private $form;  
	
	
	public function __construct ()  {
		
	  
		
		$userFilter=(new UserFilter ())->getInputFilter();  
		
		$factory=new FormFactory ();
		
		$form=$factory->createForm([
		
			'hydrator'=>ArraySerializable::class, 
			
			'input_filter'=>$userFilter,  
			
			'elements'=>[
				[
					'spec'=>[
					
						'name'=>'username',
						'type'=>'Text',
						'options'=>[
							'label'=>'Name: ', 
						
						]
					
					
					],
				], 
				
				[
					
					'spec'=>[
					
						'name'=>'password',
						'type'=>'password',
						'options'=>[
							'label'=>'Password: ', 
						
						]
					
					
					],
				],
				
			
				
	
			
				
				[
					
					'spec'=>[
					
						'name'=>'send',
						'attributes'=>[
							'value'=>'Send',
						], 
						'type'=>'Submit'
					
					
					]
				
				
				],
				
		
			],
			
		
			
		
		]);  
		
	
		
		

		

	

		$this->form=$form;  
		
	}
	
	public function getForm ()  {
		
		return $this->form;  
	}
	
	
	

}