<?php 

namespace Login\Model\Product;


class Product {
	
	public $name;
	public $price;  
	public $brand;
	public $categories;  
	
	
	public function setName  ($name)  {
		
		$this->name=$name;
		return $this; 
	}
	
	public function getName ()  {
		
		return $this->name; 
	}
	
	public function setPrice ($price) {
		$this->price=$price;
		return $this;
	}
	public function getPrice ()  {
		
		return $this->price;  
	}
	
	public function setBrand (Brand $brand)  {
		$this->brand=$brand;
		return $this;  
	}
	
	public function getBrand () {
		
		return $this->brand;  
	}
	
	public function setCategories (array $cats)  {
		
		$this->categories=$cats;  
		return $this;  
	}
	
	public function getCategories ()  {
		
		return $this->categories; 
	}
	
	
	
	
	
	
	
	
	
	
	
	
}