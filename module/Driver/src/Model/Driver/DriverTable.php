<?php 

namespace Driver\Model\Driver;  


class DriverTable {
	
	protected $table;  
	
	public function __construct ($table)  {
		
		$this->table=$table;  
		
		
	}
	
	
	public function selectDrivers  ()  {
	
		
		return $this->table->select();   
	}
	
	
	public function getDriver ($id)  {
		
		return $this->table->select (['id_driver'=>$id]);  
		
		
	}
	
	
	public function insert ($data)  {
		
		return $this->table->insert($data); 
	}
	
	public function saveDriver ($driver) {
		
		$id_driver=$driver->id_driver; 
		$name=$driver->name;
		$age=$driver->age;
		$category=$driver->category;  
		
		if ($id_driver==null)  {
			
			$this->table->insert([
				'id_driver'=>'',
				'name'=>$name,
				'age'=>$age,
				'category'=>$category
			
			]);  
			
		}
		
		else {
			
			
			$this->table->update(['name'=>$name, 'age'=>$age, 'category'=>$category],['id_driver'=>$id_driver]);  
		}
		
		
	}
	
	public function deleteDriver ($id)  {
		
		$this->table->delete(['id_driver'=>$id]); 
		
		
	}
	
	
	
	
	
}