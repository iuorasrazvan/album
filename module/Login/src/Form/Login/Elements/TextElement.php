<?php 

namespace Login\Form\Login\Elements;  

use Zend\Form\Element; 


class TextElement extends Element  {
	
	public function __construct ()  {
		
		parent::__construct ('text1');
		
		$this->setAttributes ([
			'type'=>'text',
			'maxlenght'=>12,
		
		]);
		
		$this->setOptions ([
			'label'=>'Text element', 
		
		]);  
		
	}
	
	
}