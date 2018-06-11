<?php 

namespace Database\Model;   

class Shoe {
	
	protected  $type, $size, $color, $quantity;  
	
	
	public function  setTyppe ($type)  {
		
		$this->type=$type; 
		
	}
	
	public function  getTyppe ()  {
		
		return $this->type;   
		
		
	}
	
	public function  setSize ($size)  {
		
		$this->size=$size; 
		
	}
	
	public function  getSize ()  {
		
		return $this->size;   
		
		
	}
	
	public function  setColor ($color)  {
		
		$this->color=$color; 
		
	}
	
	public function  getColor ()  {
		
		return $this->color;   
		
		
	}
	
	public function  setQuantity ($quantity)  {
		
		$this->quantity=$quantity; 
		
	}
	
	public function  getQuantity ()  {
		
		return $this->quantity;   
		
		
	}
	
	
	
	
	
}