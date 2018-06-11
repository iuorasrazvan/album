<?php 

    namespace Album\Model;

	use Zend\ServiceManager\AbstractPluginManager; 
	
	use Album\Model\ValidatorInterface;  
	
	class PluginManager extends AbstractPluginManager {
		
		protected $instanceOf = ValidatorInterface::class;

		
		
		
	}