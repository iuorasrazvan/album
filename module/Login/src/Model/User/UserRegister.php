<?php 

namespace Login\Model\User; 


class UserRegister {
	
	public $username;
	public $password;
	public $random_bytes;
	public $password_salt;  
	public $name;   
	
	
	public function getArrayCopy () {
		
		return array ($this->username, $this->password, $this->random_bytes, $this->password_salt,  $this->name);   
		
		
	}
	
	public function exchangeArray ($data) {
		
		$this->username=isset($data['username'])? $data['username'] : null;
		$this->password=isset($data['password'])? $data['password'] :null; 
		$this->random_bytes=isset($data['random_bytes']) ? $data['random_bytes'] :null ; 
		$this->password_salt=isset($data['password_salt']) ? $data['password_salt'] :null ;
		$this->name=isset($data['name']) ? $data['name'] :null ;
		
		
		
	}
	
        
	
}