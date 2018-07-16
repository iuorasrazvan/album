<?php 

namespace Driver;  

use Zend\ServiceManager\Factory\InvokableFactory;  
use Zend\Db\Adapter\AdapterInterface;  
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\Reflection as ReflectionHydrator;
use Driver\Model\Driver\Driver;  
use Zend\Db\TableGateway\TableGateway;  
use Zend\Session\Container;  



class Module {
	
	
	public function getConfig ()  {		
		
		return include __DIR__ .'/../config/module.config.php';  
			
		
	}
	
	public function onBootstrap ($e)  {
		
		$eventManager = $e->getApplication ()->getEventManager ();  
		
		
		
		
		
	}
	
	
	public function getServiceConfig ()  {
		
		
		return [
			'factories'=>[
				'tableGateway'=>function ($container)  {
					$dbAdapter=$container->get(AdapterInterface::class);

					$resultSetPrototype = new HydratingResultSet(new ReflectionHydrator, new Driver);
					return new TableGateway('drivers',$dbAdapter, null, $resultSetPrototype);  
					
				},
				
				
				Model\Driver\DriverTable::class=>function ($container, $requestedName)  {
					
					$tableGateway=$container->get('tableGateway');  
					return new $requestedName ($tableGateway);  
					
					
				}
			
			
			
			]
		
		
		
		
		];  
	}
	
	public function getControllerConfig ()  {
		
		return [
		
			'factories'=>[
				Controller\DriverController::class=>function ($container, $requestedName)  {
					
					$driverTable=$container->get(Model\Driver\DriverTable::class);
					return new $requestedName($driverTable);  
				}
			
			],
			
			'aliases'=>[
				'driver'=>Controller\DriverController::class
			
			]
		
		
		
		];  
		
		
		
	}
	
	
	
	
}