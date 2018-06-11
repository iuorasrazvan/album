<?php 

namespace Login\Form\Product;  
use Zend\Hydrator\ClassMethods;  
use Zend\Form\Form;  

use Zend\InputFilter\InputFilter;  




class ProductForm extends Form {
	
	public function __construct ()   {
		
		parent::__construct ('productForm');  
		
		$this->setAttribute('method', 'post');  
		
		
        $this->setHydrator(new ClassMethods(false));
        $this->setInputFilter(new InputFilter());
		
		$this->add([
			'type'=>ProductFieldset::class, 
			'options' => [
                'use_as_base_fieldset' => true,
            ],
		
		
		]);  
		
			
		 $this->add([
            'name' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'value' => 'Send',
            ],
        ]);
		
	
		
	 
		
	}
	
	
}