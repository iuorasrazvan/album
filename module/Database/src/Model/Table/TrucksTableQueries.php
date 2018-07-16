<?php 

namespace Database\Model\Table;

use Zend\Db\ResultSet\HydratingResultSet; 

class TrucksTableQueries  {
	
	protected $table ;
	
	
	public function __construct ($table)  {
		
		$this->table=$table;  
	}
	
	
	public function select ()  {
		
		$resultSet = $this->table->select ();
		
		return $resultSet;   
		
		
	}
	
	
	
}