<?php 

	namespace Login\Form\Contact;
	


	use Zend\Form\Form;
	use Zend\Form\Element; 


	
	use Zend\InputFilter\Input;
	use Zend\InputFilter\InputFilter;
	use Zend\InputFilter\InputFilterInterface; 
	use Zend\InputFilter\InputFilterAwareInterface;  
	
	use Zend\Filter\StringTrim;
	use Zend\Filter\StripTags;
	use Zend\Filter\StringToUpper;
	
	use Zend\Validator\Regex;
	use Zend\Validator\StringLength;
	
	use Login\Model\Collection\CollectionObject;  
	use Login\Model\Collection\NoteObject;  

	 
	
	class  ContactForm extends Form implements InputFilterAwareInterface   {
		private $inputFilter;  
		
		public function __construct ()   {
			
			parent::__construct ('contact');  

			 $this->add([
            'name' => 'name',
            'options' => [
                'label' => 'Your name',
            ],
            'type'  => 'Text',
			]);
		
			$this->add([
				'name' => 'subject',
				'options' => [
					'label' => 'Subject',
				],
				'type'  => 'Text',
			]);
			$this->add([
				'type' => Element\Text::class,
				'name' => 'message',
				'options' => [
					'label' => 'Message',
				],
			]);
			
			$this->add([
				'type' => Element\Csrf::class,
				'name' => 'csrf',
				'options' => [
					'label' => 'Message',
				],
			]);
			
			
			$this->add([
				'name'=>'studyEl', 
				'type'=>Element::class, 
				'options'=>[
				
					'label'=>'Text', 
					'format' => 'H:i:s',
				
				],
				
				'attributes' => [
					'type'=>'time', 
					
				],
										
										
			
			
			]); 
			
			
	
					
			
		
				
			$this->add([
				'type'=>'Submit', 
				'name'=>'send', 
				'attributes'=> [
					'value'=>'Submit', 
					
				],
				
							
			
			]);
				
				

			
			$this->addFilters ();  
		
		
			
		}
		
	
		public function addFilters ()  {
			
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
			
			
			$this->getInputFilter()->add ([
				'name'=>'subject', 
				
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
				'name'=>'message', 
				
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
				'name'=>'studyEl', 
				
				'required'=>false
				
			
			]);  
			
			
			
			
			
			
			

			
			
			
			
		}
		
	
		
		
		public function getInputFilter () {
			
			if ($this->inputFilter) return $this->inputFilter;
			
			$this->inputFilter=new InputFilter ();
			
			
			return $this->inputFilter;  
			
			
			
		}
				
		
		
		
	}
		
				


	

	
