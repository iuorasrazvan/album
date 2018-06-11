<?php 

namespace Acl\Form;  

use Zend\Form\Factory;  

class AddForm  {
	
	public function __construct  () {
		
		$factory=new Factory ();  
		$driverForm=factory::createForm([
		
			'hydrator' => ArraySerializable::class,
			'elements' => [
				[
					'spec' => [
						'name' => 'name',
						'options' => [
							'label' => 'Driver name',
						],
						'type'  => 'Text',
					],
				],
				[
					'spec' => [
						'type' => Element\Number::class,
						'name' => 'email',
						'options' => [
							'label' => 'Driver\'s age',
						]
					],
				],
				[
					'spec' => [
						'name' => 'category',
						'options' => [
							'label' => 'Driving category',
						],
						'type'  => 'Text',
					],
				],
				
				 [
					'spec' => [
						'type' => Element\Captcha::class,
						'name' => 'captcha',
						'options' => [
							'label' => 'Please verify you are human.',
							'captcha' => [
								'class' => 'Dumb',
							],
						],
					],
				],
				[
					'spec' => [
						'type' => Element\Csrf::class,
						'name' => 'security',
					],
				],
				
				
				[
					'spec' => [
						'name' => 'send',
						'type'  => 'Submit',
						'attributes' => [
							'value' => 'Submit',
						],
					],
				],
			],
			
			'input_filter'=>[
				'filters'=>[
					[
						'name',
						[
							'type'=>'StringToLower'
						
						]
					
					],
					
					[
						'age',
						[
							'name'=>'Integer'
						
						]
					
					]
				
				
				],
				
				
				'validators'=>[
					[
						'name'
						[
							'type'=>'StringLength';
							'options'=>[
								'min'=>3,
								'max'=>50, 
							
							]
						
						]
					
					
					
					]
				
				
				]
			
			
			
			
			]
		
		
		]);  
		
		return $driverForm ;   
	}
	
	
	
}
/*



*/  