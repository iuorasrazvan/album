<?php 

	namespace Album\Model;  
	use Zend\ServiceManager\Factory\FactoryInterface; 
	class AlbumFactory implements FactoryInterface  {
		
		public function __invoke ($container, $requestedName)  {
			
			
			echo (new $requestedName())->title;  
			
			echo $acl=$container-get('Zend\Permissions\Acl');  
			
			
			return new $requestedName;  
		}
		
		
	}