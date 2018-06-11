<?php 

namespace Login\Model\Product;


class Brand   {
	
	
	public $name;
	public $url;  
	
	
	public function setName ($name)  {
		$this->name=$name;
		return $this; 
	}
	
	public function getName ()  {
		
		return $this->name;  
	}
	
	
	public function setUrl ($url)  {
		$this->url=$url;
		return $this;
	}
	
	public function getUrl () {
		
		return $this->url;  
	}
}