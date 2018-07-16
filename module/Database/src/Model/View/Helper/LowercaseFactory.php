<?php 

namespace Database\Model\View\Helper;  

class LowercaseFactory {  

	public function __invoke ($container, $requestedName)  {
		
		$viewPluginManager = $container->get('ViewHelperManager');  
		
		$escaper = $viewPluginManager->get('escapeHtml');  
		
		return new  $requestedName ($escaper);   
		
	
		
	}  
	
	
}