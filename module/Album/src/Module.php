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




class Module implements ConfigProviderInterface
{
	private $sm;
	
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
	
	public function onBootstrap ($e)  {
		$app =$e->getApplication ();
		$eventManager=$app->getEventManager ();
		
		$router = $e->getRouter();  
		$container =new Container ('login');
		$userLogin=$container->userLogin;  
		if (isset($userLogin) && !empty ($userLogin))  {
		    
			$router->addRoutes([
			
				'album' => [
					'type'    => Segment::class,
					'options' => [
						'route' => '/album[/:action[/:id]]',
						'constraints' => [
							'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
							'id'     => '[0-9]+',
						],
						'defaults' => [
							'controller' => Controller\AlbumController::class,
							'action'     => 'index',
						],
					],
					
				],
			]); 
		}
		
		else {
			
			
			
			$router->addRoutes ([
			
				'album' => [
					'type'    => Segment::class,
					'options' => [
						'route' => '/album[/:action[/:id]]',
						'constraints' => [
							'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
							'id'     => '[0-9]+',
						],
						'defaults' => [
							'controller' => Controller\AlbumController::class,
							'action'     => 'loginMessage',
						],
					],
					
				],
			]); 
			
			
			
		
		}
		
	
	}
		
	public function onRoute ($e) {  
		
			
		
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
		
				Model\UserService1::class=>Model\UserService::class,
				Model\UserService2::class=>Model\UserService::class,
				
			
				
			],
			
			
			
			
			'abstract_factories' => [
				ConfigAbstractFactory::class,
			],
			
			
		
		];
				
          
        
    }
	
	
	 public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\AlbumController::class => function($container) {
                    return new Controller\AlbumController(
                        $container->get(Model\AlbumTable::class)
                    );
                },
				
				Controller\UserController::class =>InvokableFactory::class,
				
				Controller\GuestController::class => function ($container, $requestedName) {
					
					
					return new $requestedName($container); 
				}

				 
            ],
			
			'aliases'=> [
			
				'user'=>Controller\UserController::class,
				'guest'=>Controller\GuestController::class, 
				'album'=>Controller\AlbumController::class, 

			
			]
        ];
    }
}