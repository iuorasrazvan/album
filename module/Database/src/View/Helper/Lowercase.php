<?php 

namespace Database\View\Helper;

use Zend\View\Helper\EscapeHtml;

class Lowercase {
	
	protected $escHtml; 
	protected $lower;  
	
	public function __construct (EscapeHtml $escaper)  {
		$this->escHtml = $escaper;  
		
		
	}
	
		
	public function __invoke () {
		return $this;  
		
	}

	public function toLower($str)   {
		
		$escaper=$this->escHtml;
		
		return $escaper (strtolower($str)); 
		

	}
	
	
	
	
	
}