<?php 

namespace Database;  
use Zend\Db\Adapter\Adapter; 

use Zend\Mvc\ModuleRouteListener;	
use Zend\Session\SessionManager; 
use Zend\Session\Container;  

use Zend\ModuleManager\ModuleManager; 
use Zend\Router\RouteMatch;  
use Zend\Mvc\ResponseSender\SendResponseEvent;

use Zend\Config\Config ;  
use Zend\Session; 

use Zend\View\Renderer\PhpRenderer;

use Zend\View\Resolver\TemplateMapResolver;

use Zend\View\Resolver\AggregateResolver;  

use Zend\View\Resolver\RelativeFallbackResolver ;   

use Zend\Session\Config\SessionConfig; 


use Zend\ServiceManager\Factory\InvokableFactory;  

use Zend\EventManager\EventManager;  

use Zend\View\Resolver;  

use Zend\Db\Adapter\AdapterInterface;  

use Zend\Db\ResultSet\ResultSet;  

use Zend\Db\TableGateway\TableGateway;  ;

use Zend\View\Helper\Doctype;

use Database\Model\Table\TrucksTableQueries;  

use Database\Model\Table\DriversTable;   

use Database\Model\View\Helper\Lowercase;  

use Database\Model\View\Helper\LowercaseFactory;  



class Module  {
	
	
	
	public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
	
	


	public function onBootstrap ($e)  {
		
		$app = $e -> getApplication ();
		
		$eventManager=$app ->getEventManager ();
	
		
		$moduleRouteListener =new ModuleRouteListener ();
		
		$moduleRouteListener->attach ($eventManager);

		$this -> bootstrapSession ($e); 

		
		
		
		
	   

		
	}	
	
	
	
	
	
	
	
	public function bootstrapSession ($e)   {
		
		$serviceManager=$e->getApplication()->getServiceManager ();  
		
		$session =$serviceManager->get(SessionManager::class);
		
		
		
		$session->start();  
		
		$container = new Container('initialized');

        if (isset($container->init)) {
            return;
        }
		
		$request  = $serviceManager->get('Request');
		
		$session->regenerateId (true);  
		
		$container->init          = 1;
        $container->remoteAddr    = $request->getServer()->get('REMOTE_ADDR');
        $container->httpUserAgent = $request->getServer()->get('HTTP_USER_AGENT');
		
		$config = $serviceManager->get('config'); 
		$validators = $config['session_manager']['validators'];  
		$chain=$session->getValidatorChain ();  
		
		foreach ($validators as $validator)  {
			
			switch ($validator)  {
				
				case Session\Validator\RemoteAddr::class :
					$validator = new $validator($container->remoteAddr);
					break;

					
			
				
				case Session\Validator\HttpUserAgent::class : 
					$validator = new $validator ($container->httpUserAgent); 
					break;   
			
				
				default :
					
                    $validator = new $validator();
				
				
				
			}
			
			 $chain->attach('session.validate', array($validator, 'isValid'));
		}
		
		
		
		
		
	
    }
				
		
			
		
	
	
	
	

		
	public function getServiceConfig ()  {
		
		return [
		
			'factories' => [
			//	\Zend\Session\Config\ConfigInterface::class => \Zend\Session\Service\SessionConfigFactory::class,
				
				SessionManager::class=> function ($container, $requestedClass)  {
					
				
					$config=$container->get('config');  
					
					$session =$config['session_manager'];  
					
					if (!isset($session['config']))    {
						
						$sessionManager=new SessionManager;
						Container::setDefaultManager($session);
						
						return $sessionManager;  
					}


					if (isset($sesson['config']))  {
						
						$class= isset($session['config']['class']) ? $session['config']['class']: SessionConfig::class;  
						
						
						$options = isset($session['config']['options'])
                            ?  $session['config']['options']
                            : [];

                        $sessionConfig = new $class();
                        $sessionConfig->setOptions($options);
						
					}
					
					if (isset($session['storage']))   {
						$class =$session['storage'];
						$storage=new $class;  
						
						
					}
					
					
					
					$sessionManager= new SessionManager ($sessionConfig, $storage);  
					Container::setDefaultManager($sessionManager);
                    return  $sessionManager; 
					
				},  
				
				TrucksTableGateway::class=>function ($container)  {
				
					
					
					$dbAdapter = $container->get(AdapterInterface::class);
					
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new DriversTable());
                    return new TableGateway('drivers', $dbAdapter, null, $resultSetPrototype);
					
					
				},
				
				
				TrucksTableQueries::class => function ($container, $requestedName)  {
					
					$trucksTableGateway= $container->get (TrucksTableGateway::class);  
					
					return new $requestedName ($trucksTableGateway);  
				}, 
				
				
				Model\MyPluginManager::class=>function ($container, $requestedName)  {
					return new $requestedName (
						$container, [
							'factories'=> [
								Model\MyService::class=>InvokableFactory::class
							
							
							
							
						
							],
							
							'aliases'=>[
							
								'myService'=>Model\MyService::class, 
							]
					
					
					]);  
					
					
				},  
				
				
			
			
			], 
			
			
		]; 
  
	}	
		
		

	
	
}