<?php 

namespace Driver\Form;  

use Zend\Form\Factory;  

use Zend\Hydrator\ArraySerializable;  

use Zend\Form\Element;  

class AddForm  {
	
	private $driverForm;  
	public function getDriverForm ()  {
		
		return $this->driverForm;  
	}
	
	public function __construct  () {
		
		$factory=new Factory ();  
		$driverForm=$factory->createForm([
		
			'hydrator' => ArraySerializable::class,
			'elements' => [
			
			
				[
					'spec' => [
						'name'=>'id_driver',
					
						'type'  => 'hidden',
					],
				],
				
				[
					'spec' => [
						'name'=>'name',
						'options' => [
							'label' => 'Driver name',
						],
						'type'  => 'Text',
					],
				],
				[
					'spec' => [
						'type' =>Element\Number::class,
						'name'=>'age',
						'options' => [
							'label' => 'Driver\'s age',
						], 
						
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
				/*
				
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
				
				*/
				[
					'spec' => [
						'type' => Element\Csrf::class,
						'name' => 'csrf',
					],
				],
				
				
				[
					'spec' => [
						'name' => 'submit',
						'type'  => 'Submit',
						'attributes' => [
							'value' => 'Submit',
						],
					],
				],
			],
			
			'input_filter'=>[
			
				'name'=>[
					'required'=>true, 
					'filters'=>[
						[
							'name'=>'stringtrim'
						
						]
					
					
					
					],
					
					
					'validators'=>[
						[
							'name'=>'stringlength', 
							
							'options'=>[
								'min'=>5,
								'max'=>30, 
							
							
							]
						
						]
					
					]
				
				],
				
				
				'age'=>[
					'required'=>true, 
					
					
					
					
				
				],
				
				'category'=>[
					'required'=>true, 
					
					
					
					'validators'=>[
						[
							'name'=>'stringlength', 
							
							'options'=>[
								'min'=>1,
								'max'=>1, 
							
							
							]
						
						]
					
					]
				
				]
			
		
			]
			
			
		
		]);  
		
		$this->driverForm=$driverForm ;   
	}
	
	
	
}
/*



*/  