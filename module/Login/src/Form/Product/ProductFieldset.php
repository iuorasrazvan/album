<?php 

namespace Login\Form\Product;

use Login\Model\Product\Product;  

use Zend\InputFilter\InputFilterProviderInterface;  
use Zend\Form\Element; 
use Zend\Form\Fieldset;
use Zend\Form\Form;  

use Zend\InputFilter\InputFilterInterface;   

use Zend\Hydrator\ClassMethods;  



class ProductFieldSet  extends Fieldset implements InputFilterProviderInterface  {
	
	public function __construct ()  {
		
		
		parent::__construct ('product');  
		
		$this->setHydrator(new ClassMethods(false));
		$this->setObject (new Product ());  
		
		
		
		$this->add ([
			'name'=>'name',
			
			'attributes'=>[
				'required'=>'required',
			
			
			],
			'options'=>[
				'label'=>'Name of the product', 
			
			]
		
		
		]);
		
		$this->add ([
			'name'=>'price',
			
			'attributes'=>[
				'required'=>'required',
			
			
			],
			'options'=>[
				'label'=>'Price of the product', 
			
			]
		
		
		]);  
		
		$this->add ([
			'name'=>'brand',
			'type'=>BrandFieldset::class,  
			
			'attributes'=>[
				'required'=>'required',
			
			
			],
			'options'=>[
				'label'=>'Brand of the product', 
			
			]
		
		
		]);  
		
		
		$this->add ([
			'name'=>'categories',
			'type'=>Element\Collection::class,  
			
			'attributes'=>[
				'required'=>'required',
			
			
			],
			'options' => [
                'label' => 'Please choose categories for this product',
                'count' => 2,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => [
                    'type' => CategoryFieldset::class,
                ],
            ],
		
		
		]);  
		
		
		
		
		
		
	}
	
	 public function getInputFilterSpecification()
    {
        return [
            'name' => [
                'required' => true,
				'validators'=> [
					[
						'name'=>'stringlength',
						'options'=> [
							'min'=>5, 
						]
					
					
					]
				
				
				],
				
				'filters'=> [
					[
						'name'=>'stringtoupper', 
					
					]
				
				
				
				]
            ],
            'price' => [
                'required' => true,
                
            ],
        ];
    }
	
	
}