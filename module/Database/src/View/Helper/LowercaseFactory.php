<?php 

	namespace Database\View\Helper;
	
	use Zend\View\Helper\AbstractHelper;
	
	use Zend\View\Helper\EscapeHtml;
	
	use Zend\View\Renderer\RendererInterface;  
	
	
	class LowercaseFactory   {
		
		


		public function __invoke   ($container, $requestedName)  {
			
			$viewHelperManager = $container->get('ViewHelperManager');
		
			
			return new $requestedName ($viewHelperManager->get('escapeHtml'));  
		}
	
		
	}