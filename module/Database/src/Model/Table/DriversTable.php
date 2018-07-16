<?php 


namespace Database\Model\Table; 


class DriversTable   {
	public $id_driver; 
	public $name;
	public $age;  
	public $category;  
	
	
	public function exchangeArray ($data)  {
		
		$this->id     = !empty($data['id_driver']) ? $data['id_driver'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->age  = !empty($data['age']) ? $data['age'] : null;
		$this->category  = !empty($data['category']) ? $data['category'] : null;
	}
	
	
	public function getArrayCopy ()  {
		
		return [$this->id_driver, $this->name, $this->age, $this->category];  
	}
	
	

	
	
	
	
	
	
	
	
	
	
}