<?php 

namespace Login\Model\Collection ;

use Zend\Form\Element; 

class NoteObject  extends Element  {
	
	public function __construct ()  {
		
	    $this->setName('note');  
		
		$this->setOptions([
			'label'=>'note', 
		
		
		]);
		
		$this->setAttributes ([
			'maxlength'=>5, 
			'type'=>'text',
		]); 
		
		
	}
	
	
	
	
}