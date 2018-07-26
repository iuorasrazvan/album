<?php

	namespace Database\Model\Hydrators;
	
	use Zend\Hydrator\HydratorInterface;
	
	use Database\Model\BlogPost;   
	
	class WeightHydrator implements HydratorInterface  {
		
		public function hydrate ($data, $object) {
			
			if (!$object instanceof BlogPost)  {
				
				return $object;
			}
			
			else {
				if (isset($data['weight']))  {
					
					$object->weight=$data['weight'];  
				}
				return $object; 
				
			}
			
		}
		
		public function extract ($object)  {
			
			if (!$object instanceof BlogPost)  {
				
				return array ();  
			}
			
			else {
				$data['weight']=$object->weight;  
				return $data;  
				
				
			}
			
			
			
		}
		
		
		
	}