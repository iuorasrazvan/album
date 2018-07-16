<?php 

namespace Driver\Model\Driver;

class Driver  {
	
	public $id_driver;
	public $name;
	public $age;
	public $category; 
	
	protected $inputFilter;  
	

	
	public function getArrayCopy ()  {
		
		return [$this->id_driver, $this->name, $this->age, $this->category];  
	}
	
	
	 public function exchangeArray(array $data)
	 
    {
        $this->id_driver     = !empty($data['id_driver']) ? $data['id_driver'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->age  = !empty($data['age']) ? $data['age'] : null;
		$this->category  = !empty($data['category']) ? $data['category'] : null;
		
		
    }
	
	
	
	
}