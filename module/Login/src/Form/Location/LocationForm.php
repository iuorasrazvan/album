<?php 

namespace Login\Form\Location;

use Zend\Form\Element;  

use Zend\Form\Form;  

use Zend\InputFilter\Input; 

use Zend\InputFilter\InputFilter;  

use Zend\Filter\StringToUpper;   

use Zend\Filter\StringTrim;   

use Zend\Validator\StringLength; 

use Zend\Form\Fieldset; 

use Zend\Form\Factory;  

use Zend\Hydrator\ArraySerializable;  




 


class LocationForm   {
	
	private $form;  

	public function __construct  ()  {
		
	 
		
		$factory= new Factory ();


		
		$form=$factory->createForm ([
			'hydrator'=>ArraySerializable::class,
			
			'fieldsets'=>[
				[
					'spec'=>[
					
						'name'=>'CityField', 
	
				
						'elements'=>[
							[
								'spec'=>[
									'name'=>'city', 
									'options'=>[
										'label'=>'City name', 
									], 
									
									'type'=>'text'
									
								
								]
							
							],
							
							
				
													
				
							[
								'spec'=>[
									'name'=>'send',
								
								
									'attributes'=>[
							
										'value'=>'Send',
										'type'=>'Submit', 
									]
								]
							], 
							
						   
					
						]
				
					]
			
			
				],
			],
		

			
					
		
		]);  
		
		
	
		
		$cityInput=new Input ('city');
		
		$cityInput->getValidatorChain()->attach (new StringLength(['min'=>5]));   
		
		
		$cityFilter=new InputFilter (); 

		$cityFilter->add($cityInput);  
		
		$cityFieldFilter=new InputFilter();
		
		$cityFieldFilter->add($cityFilter,'CityField');  
		
		$country=new Elements\Country;
		
		$country->setLabel('Country');  
		
		$continent=new Elements\Continent;
		
		$continent->setLabel('Continent');
		
		$countryFieldset =new Fieldset('CountryFieldset') ;
		
		$countryFieldset->setLabel ('Country details');  
		
		$countryFieldset->add($country);
		
		$countryFieldset->add($continent);  
		
	
       $form->add ($countryFieldset);  
         

		
		$form->setInputFilter($cityFieldFilter);
		

		
		$this->form=$form;  
		
		
		
	
	}
	
	public function getForm ()  {
		return $this->form;
	}
	
	
	
	
	
}  