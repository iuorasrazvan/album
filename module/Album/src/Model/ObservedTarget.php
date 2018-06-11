<?php 

namespace Album\Model;  

use Zend\EventManager\FilterChain;  

class ObservedTarget  {
	
	private $filters=[]; 
	public function attachFilter ($method, callable $call)  {
		if (! method_exists ($this, $method))  {
			throw new \Exception ('Invalid filter event');
		}
		
		$this->getFilters($method)->attach ($call);
		
	}
	
	
	
	
	
	
	public function execute ($message)   {
		$args=compact('message'); 
		return $this->getFilters(__FUNCTION__)->run ($this, $args);  
		
	}
	
	
	public function getFilters($method)   {
		if (!isset ($this->filters[$method]))   {
			
			$this->filters[$method]=new FilterChain ();
		}
		
		return $this->filters[$method];   
		
		
	}
	
	
	
	
}