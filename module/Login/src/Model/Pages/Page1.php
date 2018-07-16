<?php 
	namespace Login\Model\Pages;  
	use Zend\Navigation\Page\AbstractPage; 
	
	class Page1 extends AbstractPage  {
		
	  
		public function getHref () {
			
			$controller=$this->routeMatch->getParam('controller');
			$action =$this->routeMatch->getParam('action'); 
			
			
			echo $controller.'/'.$action;  
		}
		
		
	}