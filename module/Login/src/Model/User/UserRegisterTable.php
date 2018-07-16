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
	
	
	public function insertUser ($user)   {
		
		$data['id_user']='';
		$data['username']=$user->username;
		$data['password']= password_hash ($user->password, PASSWORD_DEFAULT);  
		$data['random_bytes']=random_bytes(32);
						
		$data['password_salt']=md5($user->password.$data['random_bytes']);
		
					
		$data['name']=$user->name;
	
		
		
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
	
	public function getUser ($id)  {
		
		$resultSet=$this->table->select(['id_user'=>$id]);
		$user=$resultSet->current ();
		return $user; 
	}
	
	public function getIdUser ($username)  {
		
		$resultSet=$this->table->select(['username'=>$username]);
		$id_user=$resultSet->current()->id_user;  
		
		return $id_user;
	
	}
	
	
	
	
	
	
}