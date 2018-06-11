<?php 

namespace Login\Form\Register; 

use Zend\Form\Form;  

use Zend\Form\Element;  

use Zend\InputFilter\InputFilter;  
use Zend\Filter\StripTags; 
use Zend\Filter\StringTrim;  
use Zend\Validator\StringLength; 

class RegisterForm extends Form   {
	
	
	private $inputFilter;  
		
	public function __construct ()   {
		
		parent::__construct ('register');  

		 $this->add([
			'name' => 'username',
			'options' => [
				'label' => 'Your usernaname',
			],
			'type'  => 'Text',
		]);
	
		$this->add([
			'name' => 'password',
			'options' => [
				'label' => 'Your Password',
			],
			'type'  => 'password',
		]);
		
		$this->add([
	
			'name' => 'name',
			'options' => [
				'label' => 'name',
			],
		]);
		
		
		
			
		$this->add([
			'type' =>'submit',
			'name' => 'send',
			'attributes' => [
				'value' => 'Submit',
			],
		]);
		
		
		$this->addInputFilters ();
	
	
	}

	public function addInputFilters ()  {
			
			$this->getInputFilter()->add ([
				'name'=>'username', 
				
				'reguired'=>true,  
			
				'filters' => [
					['name' => StripTags::class],
					['name' => StringTrim::class],
				],
				'validators' => [
					[
						'name' => StringLength::class,
						'options' => [
							'encoding' => 'UTF-8',
							'min' => 5,
							'max' => 10,
						],
					],
				],
			
			]);  
			
			
			$this->getInputFilter()->add ([
				'name'=>'password', 
				
				'reguired'=>true,  
			
				'filters' => [
					['name' => StripTags::class],
					['name' => StringTrim::class],
				],
				'validators' => [
					[
						'name' => StringLength::class,
						'options' => [
							'encoding' => 'UTF-8',
							'min' => 5,
							'max' => 10,
						],
					],
				],
			
			]);  
			
			
		
			
			$this->getInputFilter()->add ([
				'name'=>'name', 
				
				'reguired'=>true,  
			
				'filters' => [
					['name' => StripTags::class],
					['name' => StringTrim::class],
				],
				'validators' => [
					[
						'name' => StringLength::class,
						'options' => [
							'encoding' => 'UTF-8',
							'min' => 5,
							'max' => 10,
						],
					],
				],
			
			]);  
			
			
			
			
			
			
			
			
			

			
			
			
			
		}
		
	
		
		
		public function getInputFilter () {
			
			if ($this->inputFilter) return $this->inputFilter;
			
			$this->inputFilter=new InputFilter ();
			
			
			return $this->inputFilter;  
			
			
			
		}
				
		
		
		
	}