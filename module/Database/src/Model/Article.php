<?php 

namespace Database\Model;  


class Article  extends AssertUserRoleMatches {
	protected $id;

	protected $userId;  	
	public function __construct ($id, $userId) {
		
		
		$this->id=$id;

		$this->userId=$userId;  
	}
	
	
	public function getUserId ()  {
		
		return $this->userId;   
	}

	
	
	
	
}