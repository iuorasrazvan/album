<?php 

namespace Database\Model;    


class BlogPost  {
	
	public $user;  
	
	public $age; 
	
	public $weight;   	
	
	public $id;
	
	public function setId ($id)  {
		
		$this->id=$id;
	}
	
	public function getId ()  {
		
		return $this->id;  
	}
	
	public function setUser  ($user)  {
		
		$this->user= $user;  
	}
	
	public function getUser ()  {
		
		return $this->user;
	}
	
	
	
	
	public function setAge ($age)  {
		$this->age= $age;    
		
		
	}
	
	public function getAge ()  {
		return $this->age;  
	}
	
	public function setWeight ($weight)  {
		
		$this->weight= $weight;  
	}
	
	
	public function getWeight ()  {
		
		return $this->weight;   
	}
	
	
	
	
	
	
}