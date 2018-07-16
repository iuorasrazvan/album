<?php 
namespace Database\Model;  

use Zend\ServiceManager\AbstractPluginManager; 

    class MyPluginManager extends AbstractPluginManager {
		
		
		protected $instanceOf=MyService::class;  
		
		
		
		
		
	}