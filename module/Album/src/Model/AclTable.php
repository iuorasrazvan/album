<?php 

namespace Album\Model;  
use Zend\Db\Sql\Sql;  

use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Permissions\Acl\Acl;  
use Zend\Permissions\Acl\Role\GenericRole as Role; 
use Zend\Permissions\Acl\Resource\GenericResource as Resource;   

use Zend\Permissions\Acl\Assertion\OwnershipAssertion;
class AclTable  {
	
	private $dba;  

	private $acl; 
	public function __construct ($dba)  {
		
		$this->dba=$dba;
		
	}
	
	public function getAcl ()  {
		if ($acl=$this->setAcl()) {
			 
			return $acl;  

		}
		
		$acl=new Acl (); 
		$acl->addRole ('guest');
		$acl->addResource('album');  
		$sql = new Sql ($this->dba);
		$insert = $sql->insert ();
		$insert->into ('acltable')->columns(['id','acl'])->values (['id'=>'','acl'=>serialize($acl)]);  
		
		$stmt=$sql->prepareStatementForSqlObject ($insert); 
		
		$stmt->execute();  
		
		return $acl;  
	
			

	}
	
	
	
	
	public function setAcl ()  {
		
		$sql = new Sql ($this->dba);
		$select=$sql->select(); 
		$select->from('acltable')->columns(['acl']);
		
		$stmt=$sql->prepareStatementForSqlObject ($select); 
		
		$result=$stmt->execute();
		if ($result instanceof ResultInterface && $result->isQueryResult() )  {
			$resultSet =new ResultSet ();  
			$resultSet->initialize ($result);
			
			if ($result->count()>0)  {
				
				$acl=$resultSet->current()->acl;
				
				$acl = unserialize ($acl);  
				
				return $acl; 
				
			}
		}
		
		
		
	}
	
	public function addUserRole ($user, $acl)  {  
	
	
	
		$acl->addRole ($user->id_user,'guest'); 
		
		
		$this->updateAcl ($acl);  
				
		
		
	}
	
	public function addAlbumResource ($id_user,$album, $acl)  {  
	    
	
		$acl->addResource ($album->id); 
		
		$acl->allow($id_user, $album->id, 'delete', new OwnershipAssertion());  
		
		
		$this->updateAcl ($acl);  
				
				
		
	}
	
	
	public function updateAcl ($acl)  {
		
		$sql=new Sql ($this->dba);
		$update=$sql->update(); 
		
		$update->table('acltable')->set(['acl'=>serialize($acl)]);
		
		$stmt=$sql->prepareStatementForSqlObject($update);
		
		$stmt->execute();  
		
	      
		
		
	}
	
	
	
}