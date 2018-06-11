<?php 


namespace Login\Model\User; 

class UserLogin   {
	
	public $username;
	public $password;

	
	
	public function exchangeArray(array $data)
    {
		$this->username=isset($data['username'])? $data['username'] : null;
		$this->password=isset($data['password'])? $data['password'] :null; 
	
		
		
		

	
	}	
	
	
	
	public function getArrayCopy ()  {
		
		return array($this->username, $this->password ); 
	}
	
	
	
}