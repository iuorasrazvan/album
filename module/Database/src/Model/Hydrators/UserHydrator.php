<?php

	namespace Database\Model\Hydrators;
	
	use Zend\Hydrator\HydratorInterface;
	
	use Database\Model\BlogPost;   
	
	class UserHydrator implements HydratorInterface  {
		
		public function hydrate ($data, $object) {
			
			if (!$object instanceof BlogPost)  {
				
				return $object;
			}
			
			else {
				if (isset($data['user'])) {
					$object->user=$data['user'];
				}
				return $object;  
				
			}
			
		}
		
		public function extract ($object)  {
			
			if (!$object instanceof BlogPost)  {
				
				return array (); 
			}
			
			else {
				$data['user']=$object->user;  
				return $data;  
				
				
			}
			
			
			
		}
		
		
		
	}