<?php 

namespace Login\Model\User; 

use Zend\Permissions\Acl\Role\GenericRole as Role;  
use Zend\Permissions\Acl\ProprietaryInterface;  	
use Zend\Session\Container;  

class UserRegister extends Role implements ProprietaryInterface  {
	
	public $id_user;	
	public $username;
	public $password;
	public $random_bytes;
	public $password_salt;  
	public $name;   

	
	public function __construct ()  {
		
		parent::__construct ('guest');  
	}

	
	public function getOwnerId ()  {
	
		return $this->id_user;  
	}
	

	
	
	public function getArrayCopy () {
		
		return array ($this->id_user, $this->username, $this->password, $this->random_bytes, $this->password_salt,  $this->name);   
		
		
	}
	
	public function exchangeArray ($data) {
		
	
		$this->id_user=isset($data['id_user'])? $data['id_user'] : null;
		$this->username=isset($data['username'])? $data['username'] : null;
		$this->password=isset($data['password'])? $data['password'] :null; 
		$this->random_bytes=isset($data['random_bytes']) ? $data['random_bytes'] :null ; 
		$this->password_salt=isset($data['password_salt']) ? $data['password_salt'] :null ;
		$this->name=isset($data['name']) ? $data['name'] :null ;
		
		
		
		
	}
	
        
	
}