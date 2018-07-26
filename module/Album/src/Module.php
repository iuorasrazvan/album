<?php 

namespace Album;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


use Zend\ServiceManager\Factory\InvokableFactory;  

use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;

use Zend\ModuleManager\ModuleManager;  

use Zend\Session\Container;

use Zend\Router\Http\Segment;    

use Zend\Mvc\MvcEvent;  


use Zend\Http\Response;  

use Zend\Http\Request; 

use Zend\Authentication\Storage\Session;  



class Module implements ConfigProviderInterface
{
	private $sm;
	
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
	
	public function onBootstrap (MvcEvent $e)  {
		$app =$e->getApplication ();
		$eventManager=$app->getEventManager ();
		
		
		
	
	}


	
	
	
	
	
	
	 public function getServiceConfig()   {
		 
		 
		 
		 
        return [
            'factories' => [
                Model\AlbumTable::class => function($container) {
				
                    $tableGateway = $container->get(Model\AlbumTableGateway::class);
                    return new Model\AlbumTable($tableGateway);
                },
                Model\AlbumTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
					
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Album());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                },
				
				Model\AclTable::class =>function ($container, $requestedName)  {
					$dbAdapter=$container->get(AdapterInterface::class);  
					return new $requestedName($dbAdapter);  
					
					
				}, 
				
			
				
			
		
				Model\UserService1::class=>Model\UserService::class,
				Model\UserService2::class=>Model\UserService::class,
			
				
				Model\Album::class=>InvokableFactory::class, 
				
			],
			
			
		
			
			'abstract_factories' => [
				ConfigAbstractFactory::class,
			],
			
			'aliases'=> [
				'albumTable'=>Model\AlbumTable::class, 
				'album'=>Model\Album::class,
				'aclTable'=>Model\AclTable::class, 
				
			
			]
			
			
		
		];
				
          
        
    }
	
	
	 public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\AlbumController::class => function($container, $requestedName) {
					
					$albumTable=$container->get ('albumTable');  
			
					$userRegister=$container->get('userRegister');
					$aclTable=$container->get('aclTable');
					$userRegisterTable=$container->get('userRegisterTable');
				
					
					return new $requestedName($albumTable, $userRegister, $aclTable,$userRegisterTable,  $container); 
                    
                },
				
				Controller\UserController::class =>InvokableFactory::class,
				
				Controller\GuestController::class => function ($container, $requestedName) {
					
				}

				 
            ],
			
			'aliases'=> [
			
				'user'=>Controller\UserController::class,
				'guest'=>Controller\GuestController::class, 
				'albumController'=>Controller\AlbumController::class, 
				
			

			
			]
        ];
    }
}