<?php 

namespace Login\Form\Location\Elements; 


use Zend\Filter;
use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;


class Continent extends Element implements InputProviderInterface {
	
	 protected $attributes = [
        'type' => 'text',
		'name'=>'continent'
    ];

   
    
    public function getInputSpecification()
    {
		return [
				'required' => true,
			
				'filters' => [
					['name' => Filter\StringTrim::class],
					['name' => Filter\StringToLower::class],
				],
				'validators' => [
					[
						'name'=>'stringlength', 
						'options'=> [
							'min'=>4,
						]
						
					
					]
				],
		];  
		
		
       
    }
	
	
	
	
}