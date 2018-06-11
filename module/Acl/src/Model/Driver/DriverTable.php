<?php 

namespace Acl\Model\Driver;  


class DriverTable {
	
	protected $table;  
	
	public function __construct ($table)  {
		
		$this->table=$table;  
		
		
	}
	
	
	public function select  ()  {
		
		return $this->table->select();   
	}
	
	
	
}