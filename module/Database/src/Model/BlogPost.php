<?php 

namespace Database\Model;   

use Zend\Permissions\Acl\ProprietaryInterface;
use Zend\Permissions\Acl\Resource\ResourceInterface;  


class BlogPost implements ResourceInterface  {
	
	public $author=null;  
	
	protected $age; 
	
	protected $weight;   
	
	
	
	
	public function __construct ($data)   {
		
		foreach ($data as $key=>$value)  {
			
			$this->$key=$value;  
		}
	}
	
	public function getWeight ()  {
		
		return $this->weight; 
	}
	
	
	
	
	public function getResourceId ()  {
		return 'BlogPost';  
		
		
	}
	
	public function getUsername ()  {
		
		if (isset($this->author->username))  {
			
			return true;  
		}
	}
	
	
	
	
	
	
	
}