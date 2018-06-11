<?php 

namespace Login\Model\User;  

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Where;  
use Zend\Db\Result\ResultInterface;  
use Zend\Db\ResultSet\ResultSet;  


class UserRegisterTable {
	
	protected $table; 
	
	public function __construct (TableGatewayInterface $table)  {
		
		$this->table=$table;  
		
	}
	
	
	public function insert ($data)   {
		
		$this->table->insert($data);  
		
	}
	
	public function checkDuplicate ($username)  {
		
		$where=new Where ();  
		
		
		
		$where->equalTo('username',$username,$where::TYPE_IDENTIFIER, $where::TYPE_VALUE);  
		
	    $resultSet=$this->table->select ($where) ; 
		

		
		$count=$resultSet->count ();  
		
	    if ($count>0)  {
			
			return $username. ' already exists'; 
		}
		
		else return null; 
		
		
	}
	
	public function select_random_bytes  ($username)  {
		
		$resultSet=$this->table->select([
			'username'=>$username
		]);
		
		
		if (($resultSet->count())>0) { 
		
			$result= $resultSet->current()->random_bytes;  
		}
		
		else {
			
			$result=null;  
		}
		
		return $result; 
		
		
	}
	
	
	
	
	
	
}