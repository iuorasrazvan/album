<?php

	namespace Database\Model\Hydrators;
	
	use Zend\Hydrator\HydratorInterface;
	
	use Database\Model\BlogPost;   
	
	class AgeHydrator implements HydratorInterface  {
		
		public function hydrate ($data, $object) {
			
			if (!$object instanceof BlogPost)  {
				
				return $object;
			}
			
			else {
				if (isset ($data['age'])) {
					$object->age=$data['age'];  
				}
				return $object;  
					
			}
			
		}
		
		public function extract ($object)  {
			
			if (!$object instanceof BlogPost)  {
				
				return array ();   
			}
			
			else {
				$data['age']=$object->age;  
				return $data;  
				
				
			}
			
			
			
		}
		
		
		
	}