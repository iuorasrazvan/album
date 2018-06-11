<?php

namespace Album\Model; 

use Album\Model\User; 



class SubUser extends User   {
	
	  public function __construct () {
		  parent::__construct (); 
	  }
	  
	  
	  public function subUserEvent ($crit1, $crit2)   {
			
			$params=compact ('crit1', 'crit2');  
		    
		   
			$this->events->trigger (__FUNCTION__ .'1',  $this, $params);  
			
			
			$this->events->trigger (__FUNCTION__ .'2',  $this, $params);  
			
	}
	
	
}