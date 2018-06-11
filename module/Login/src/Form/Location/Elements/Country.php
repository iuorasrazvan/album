<?php 


namespace Login\Form\Location\Elements; 

use Zend\Filter;
use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;


class Country extends Element implements InputProviderInterface
{
    
    protected $attributes = [
        'type' => 'text',
		'name'=>'country'
		
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